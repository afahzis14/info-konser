<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('published_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'category' => 'required|in:Featured,Hot,New,Update,Event,Info,Trending',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'required|date',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'meta_description' => 'nullable|string|max:500',
        ]);
        
        // Process content: convert base64 images to uploaded files
        $content = $this->processContentImages($validated['content']);
        
        // Clean HTML content - remove empty paragraphs
        $content = preg_replace('/<p><br><\/p>/i', '', $content);
        $content = preg_replace('/<p>\s*<\/p>/i', '', $content);
        $content = trim($content);
        
        // Check if content is actually empty after cleaning
        $textContent = strip_tags($content);
        if (empty(trim($textContent))) {
            return back()->withErrors(['content' => 'Konten berita tidak boleh kosong.'])->withInput();
        }
        
        $validated['content'] = $content;

        // Generate slug from title
        $validated['slug'] = News::generateSlug($validated['title']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Set default author if not provided
        if (empty($validated['author'])) {
            $validated['author'] = auth()->user()->name ?? 'Admin';
        }

        $validated['is_published'] = $request->has('is_published');
        $validated['is_featured'] = $request->has('is_featured');

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'category' => 'required|in:Featured,Hot,New,Update,Event,Info,Trending',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'required|date',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'meta_description' => 'nullable|string|max:500',
        ]);
        
        // Process content: convert base64 images to uploaded files
        $content = $this->processContentImages($validated['content']);
        
        // Clean HTML content - remove empty paragraphs
        $content = preg_replace('/<p><br><\/p>/i', '', $content);
        $content = preg_replace('/<p>\s*<\/p>/i', '', $content);
        $content = trim($content);
        
        // Check if content is actually empty after cleaning
        $textContent = strip_tags($content);
        if (empty(trim($textContent))) {
            return back()->withErrors(['content' => 'Konten berita tidak boleh kosong. Silakan tulis konten terlebih dahulu.'])->withInput();
        }
        
        $validated['content'] = $content;

        // Generate new slug if title changed
        if ($news->title !== $validated['title']) {
            $validated['slug'] = News::generateSlug($validated['title']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Set default author if not provided
        if (empty($validated['author'])) {
            $validated['author'] = auth()->user()->name ?? 'Admin';
        }

        $validated['is_published'] = $request->has('is_published');
        $validated['is_featured'] = $request->has('is_featured');

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        
        // Delete image if exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Upload image from Quill editor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news/content', 'public');
            $url = Storage::url($path);
            
            return response()->json([
                'success' => true,
                'url' => $url,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gambar gagal diupload',
        ], 400);
    }

    /**
     * Process content images: convert base64 to uploaded files
     */
    private function processContentImages($content)
    {
        // Find all base64 images in content (handle both single and double quotes)
        preg_match_all('/<img[^>]+src=(["\'])(data:image\/([^;]+);base64,([^\1]+))\1[^>]*>/i', $content, $matches, PREG_SET_ORDER);
        
        if (empty($matches)) {
            return $content;
        }

        foreach ($matches as $match) {
            $imgTag = $match[0];
            $quote = $match[1];
            $fullBase64 = $match[2];
            $imageType = $match[3];
            $base64Data = $match[4];
            
            // Validate image type
            $allowedTypes = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
            if (!in_array(strtolower($imageType), $allowedTypes)) {
                continue;
            }
            
            // Decode base64 image
            $imageData = base64_decode($base64Data, true);
            
            if ($imageData === false || empty($imageData)) {
                continue;
            }
            
            // Validate image size (max 2MB)
            if (strlen($imageData) > 2 * 1024 * 1024) {
                continue;
            }
            
            // Generate unique filename
            $extension = strtolower($imageType) === 'jpeg' ? 'jpg' : strtolower($imageType);
            $filename = 'content_' . Str::random(20) . '.' . $extension;
            $path = 'news/content/' . $filename;
            
            try {
                // Save image to storage
                Storage::disk('public')->put($path, $imageData);
                
                // Get URL
                $url = Storage::url($path);
                
                // Replace base64 image with uploaded image URL
                $newImgTag = str_replace($fullBase64, $url, $imgTag);
                $content = str_replace($imgTag, $newImgTag, $content);
            } catch (\Exception $e) {
                // If upload fails, skip this image
                continue;
            }
        }
        
        return $content;
    }
}
