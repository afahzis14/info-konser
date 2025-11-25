<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = PageContent::all();
        return view('admin.page-content.index', compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $pageName)
    {
        $pageContent = PageContent::where('page_name', $pageName)->first();
        
        if (!$pageContent) {
            // Create default content if not exists
            $pageContent = PageContent::create([
                'page_name' => $pageName,
                'title' => $this->getDefaultTitle($pageName),
                'content' => json_encode($this->getDefaultContent($pageName)),
            ]);
        }
        
        return view('admin.page-content.edit', compact('pageContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pageName)
    {
        $pageContent = PageContent::where('page_name', $pageName)->firstOrFail();
        
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'meta_description' => 'nullable|string|max:500',
        ]);
        
        // Build content array from form fields
        $contentData = [];
        
        if ($pageName === 'welcome') {
            $contentData = [
                'hero_title' => $request->input('hero_title'),
                'hero_subtitle' => $request->input('hero_subtitle'),
                'featured_title' => $request->input('featured_title'),
                'featured_description' => $request->input('featured_description'),
                'artists_title' => $request->input('artists_title'),
                'about_title' => $request->input('about_title'),
            ];
        } elseif ($pageName === 'pembelian-tiket') {
            $contentData = [
                'title' => $request->input('page_title'),
                'subtitle' => $request->input('page_subtitle'),
                'search_placeholder' => $request->input('search_placeholder'),
                'form_title' => $request->input('form_title'),
                'admin_fee' => $request->input('admin_fee'),
            ];
        } elseif ($pageName === 'konfirmasi-pembayaran') {
            $contentData = [
                'title' => $request->input('page_title'),
                'subtitle' => $request->input('page_subtitle'),
                'account_name' => $request->input('account_name'),
                'account_number' => $request->input('account_number'),
                'admin_fee' => $request->input('admin_fee'),
                'instruction_1' => $request->input('instruction_1'),
                'instruction_2' => $request->input('instruction_2'),
                'instruction_3' => $request->input('instruction_3'),
                'instruction_4' => $request->input('instruction_4'),
            ];
        }
        
        // If JSON content is provided, use it; otherwise use form data
        if ($request->filled('content')) {
            $decoded = json_decode($request->input('content'), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $validated['content'] = json_encode($decoded);
            } else {
                // If JSON is invalid, use form data
                $validated['content'] = json_encode($contentData);
            }
        } else {
            $validated['content'] = json_encode($contentData);
        }
        
        $pageContent->update($validated);
        
        return redirect()->route('admin.page-content.edit', $pageName)
            ->with('success', 'Konten berhasil diperbarui!');
    }

    private function getDefaultTitle(string $pageName): string
    {
        return match($pageName) {
            'welcome' => 'Info Konser - Platform Informasi Konser & Musik Terlengkap',
            'pembelian-tiket' => 'Pembelian Tiket - Info Konser',
            'konfirmasi-pembayaran' => 'Konfirmasi Pembayaran - Info Konser',
            default => 'Info Konser',
        };
    }

    private function getDefaultContent(string $pageName): array
    {
        return match($pageName) {
            'welcome' => [
                'hero_title' => 'Temukan Konser Favoritmu',
                'hero_subtitle' => 'Platform terpercaya untuk informasi konser, event musik, dan pertunjukan live terbaru di Indonesia',
            ],
            'pembelian-tiket' => [
                'title' => 'Pembelian Tiket Konser',
                'subtitle' => 'Pilih konser favoritmu dan dapatkan tiketnya sekarang',
            ],
            'konfirmasi-pembayaran' => [
                'title' => 'Konfirmasi Pembayaran',
                'subtitle' => 'Silakan lengkapi informasi pembayaran Anda',
            ],
            default => [],
        };
    }
}
