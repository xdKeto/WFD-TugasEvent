<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Organizer;
use App\Models\EventCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class eventController extends Controller
{
    public function index()
    {
        $eventData = Events::query()->get();
        return view('events/index', [
            'events' => $eventData,
        ]);
    }

    public function master()
    {
        $eventData = Events::query()->get();
        return view('/master/events/index', compact('eventData'));
    }

    // Display the specifed resources
    public function show($id)
    {
        $event = Events::with('categories', 'organizer')->find($id);
        return view('events.detail.index', compact('event'));
    }

    public function create()
    {
        $organizerData = Organizer::all();
        $categoryData = EventCategories::all();

        return view('master/events/form/index', compact('organizerData', 'categoryData'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'venue' => 'required|string|max:255',
                'tanggal' => 'required|date',
                'start_time' => 'required',
                'description' => 'required|string',
                'booking_url' => 'nullable|string|max:255',
                'tags' => 'required|json',
                'organizer' => 'required|exists:organizer,id',
                'event_category' => 'required|exists:categories,id',
            ]);
            Log::info($data);
            if (!$data) {
                return redirect()->route('master.events.index');
            }

            Events::query()->create([
                'title' => $request->title,
                'venue' => $request->venue,
                'tanggal' => $request->tanggal,
                'start_time' => $request->start_time,
                'description' => $request->description,
                'booking_url' => $request->booking_url,
                'tags' => $request->tags, // Save tags as JSON
                'organizer_id' => $request->organizer,
                'categories_id' => $request->event_category,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            return redirect()->route('master.events.index');
        } catch (\Throwable $e) {
            Log::error('Error storing event: ' . $e->getMessage());

            // Redirect back with errors and input data
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $eventData = Events::findOrFail($id);
        $organizerData = Organizer::all();
        $categoryData = EventCategories::all();

        return view('/master/events/form/index', compact('eventData', 'organizerData', 'categoryData'));
    }

    public function update(Request $r, $id)
    {

        try{
            $data = $r->validate([
                'title' => 'required|string|max:255',
                'venue' => 'required|string|max:255',
                'tanggal' => 'required|date',
                'start_time' => 'required',
                'description' => 'required|string',
                'booking_url' => 'nullable|string|max:255',
                'tags' => 'required|json',
                'organizer' => 'required|exists:organizer,id',
                'event_category' => 'required|exists:categories,id',
            ]);
    
            if (!$data) {
                return redirect()->back()->withErrors($r->errors())->withInput();
            }
    
            Events::query()
                ->where('id', $id)
                ->update([
                    'title' => $r->title,
                    'venue' => $r->venue,
                    'tanggal' => $r->tanggal,
                    'start_time' => $r->start_time,
                    'description' => $r->description,
                    'booking_url' => $r->booking_url,
                    'tags' => $r->tags, // Save tags as JSON
                    'organizer_id' => $r->organizer,
                    'categories_id' => $r->event_category,
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
    
            return redirect()->route('master.events.index');
        }catch (\Throwable $e) {
            Log::error('Error storing event: ' . $e->getMessage());

            // Redirect back with errors and input data
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
        
    }

    public function destroy($id)
    {
        Events::query()->where('id', $id)->delete();

        return redirect()->route('master.events.index');
    }
}