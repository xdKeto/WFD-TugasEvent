<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class organizerController extends Controller
{
    public function index(){
        $organizerData = Organizer::query()->get();
        return view('/master/organizer/index',  compact('organizerData'));
    }

    public function create(){
        return view('/master/organizer/form/index');
    }

    public function store(Request $request){
        $data = $request->validate([   
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'fb_link' => 'required|string|max:255',
                'twt_link' => 'required|string|max:255',
                'web_link' => 'required|string|max:255',
            ]
        );

        if(!$data){
            return redirect()->route('organizer.index');
        }

        Organizer::query()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'fb_link' => $data['fb_link'],
            'twt_link' => $data['twt_link'],
            'web_link' => $data['web_link'],
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect()->route('organizer.index');
    }

    public function edit($id){
        $organizerData = Organizer::findOrFail($id);
        return view('/master/organizer/form/index', compact('organizerData'));
    }

    public function update(Request $r, $id){
        $data = $r->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'fb_link' => 'required|string|max:255',
            'twt_link' => 'required|string|max:255',
            'web_link' => 'required|string|max:255',
        ]);

        if(!$data){
            return redirect()->route('organizer.index');
        }

        Organizer::query()->where('id', $id)->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'fb_link' => $data['fb_link'],
            'twt_link' => $data['twt_link'],
            'web_link' => $data['web_link'],
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect()->route('organizer.index');
    }

    public function destroy($id){
        Organizer::query()->where('id', $id)->delete();
        return redirect()->route('organizer.index');
    }
}