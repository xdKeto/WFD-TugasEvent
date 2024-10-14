<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session as FacadesSession;

class categoriesController extends Controller
{
    public function index(){
        $categoryData = EventCategories::query()->get();
        return view('/master/categories/index', [
            'categoryData' => $categoryData
        ]);
    }
    
    // add new category
    public function create(){
        return view('/master/categories/form/index');
    }

    public function store(Request $r){
        $data = $r->validate([
            'name' => 'required|string|max:255',  
        ]);

        if (!$data) {
            return redirect()->route('event_category.index');
        }

        EventCategories::query()->create([
           'name' => $r->name,
           'created_at' => Carbon::now()->format('Y-m-d H:i:s') ,
           'updated_at' => Carbon::now()->format('Y-m-d H:i:s') 
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id){
        $categoryData = EventCategories::findOrFail($id);
        return view('/master/categories/form/index', compact('categoryData')); 
    }

    public function update(Request $r, $id){
        $data = $r->validate([
            'name' => 'required|string|max:255',  
        ]);

        if (!$data) {
            return redirect()->route('event_category.index');
        }

        EventCategories::query()->where('id', $id)->update([
           'name' => $r->name,
           'updated_at' => Carbon::now()->format('Y-m-d H:i:s') 
        ]);

        return redirect()->route('categories.index');
    }

    

    public function destroy($id){
        EventCategories::query()->where('id', $id)->delete();

        return redirect()->route('categories.index');
    }

    
}