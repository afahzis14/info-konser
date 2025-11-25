<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'venue' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:coming_soon,hot,new,ended',
            'price_vip' => 'nullable|numeric|min:0',
            'price_regular' => 'nullable|numeric|min:0',
            'price_economy' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lineup' => 'nullable|string',
            'capacity' => 'nullable|integer|min:0',
            'sold_tickets' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'meta_description' => 'nullable|string|max:500',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        // Handle lineup (convert string to JSON if needed)
        if (isset($validated['lineup']) && is_string($validated['lineup'])) {
            $lineupArray = array_filter(array_map('trim', explode(',', $validated['lineup'])));
            $validated['lineup'] = !empty($lineupArray) ? json_encode($lineupArray) : null;
        }

        $validated['is_featured'] = $request->has('is_featured');

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event konser berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'venue' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:coming_soon,hot,new,ended',
            'price_vip' => 'nullable|numeric|min:0',
            'price_regular' => 'nullable|numeric|min:0',
            'price_economy' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lineup' => 'nullable|string',
            'capacity' => 'nullable|integer|min:0',
            'sold_tickets' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'meta_description' => 'nullable|string|max:500',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        // Handle lineup (convert string to JSON if needed)
        if (isset($validated['lineup']) && is_string($validated['lineup'])) {
            $lineupArray = array_filter(array_map('trim', explode(',', $validated['lineup'])));
            $validated['lineup'] = !empty($lineupArray) ? json_encode($lineupArray) : null;
        }

        $validated['is_featured'] = $request->has('is_featured');

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event konser berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        
        // Delete image if exists
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event konser berhasil dihapus!');
    }
}
