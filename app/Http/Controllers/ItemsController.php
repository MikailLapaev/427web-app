<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function create()
    {
        return view('pages.items.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|between:2,100',
            'description'=>'required|string|between:10,5000',
            'price'=>'required|numeric|between:1,9999999999.99',
            'image'=>'required|image|mimes:jpeg,jpg,png,webp,gif,svg|max:5048',
        ]);

        if(!$request->hasFile('image'))
            return back()->withInput()->withErrors(['image' => 'No image']);
        $image=$request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->StoreAs('public/items', $filename);

        Items::create([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'image' => $filename,
        ]);
        return redirect(route('catalog'));
    }

    public function edit($id){
        return view('pages.items.update', ['item' => Items::findOrfail($id)]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required|string|between:2,100',
            'description'=>'required|string|between:10,5000',
            'price'=>'required|numeric|between:1,9999999999.99',
            'image'=>'required|image|mimes:jpeg,jpg,png,webp,gif,svg|max:5048',
        ]);
        
        $item = Items::findOrfail($id);

        if($request['image']){
            if(!$request->hasFile('image'))
            return back()->withInput()->withErrors(['image' => 'No image']);
        $image=$request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->StoreAs('public/items', $filename);
        $filePath = storage_path('app/public/items/' .$item->image);
        if (file_exists($filePath)) unlink($filePath);
        $item->update([
            'image' => $filename,
        ]);
    }

        $item->update([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
        ]);
        return redirect(route('catalog'));
        
    }

    public function destroy($id){
        $item = Items::findOrfail($id);
        $filePath = storage_path('app/public/items/' .$item->image);
        if (file_exists($filePath)) unlink($filePath);
        $item->delete();
        return redirect(route('catalog'));
    }
}
