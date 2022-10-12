<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menus.index', [
            'menus' => Menu::with('category')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menus.create', [
            'categories' => Category::with('menu')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'file', 'image', 'max:2048', 'mimes:png,jpg,jpeg,svg'],
            'category_id' => ['string'],
            'price' => 'required'
        ]);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('menu-post', 'public');
        }

        Menu::create($validatedData);
        return redirect()->route('menus.index')->with('success', "Menu Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::with('menu')->get();
        return view('admin.menus.edit', compact(['menu', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'file', 'image', 'max:2048', 'mimes:png,jpg,jpeg,svg'],
            'category_id' => ['string'],
            'price' => 'required'
        ]);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('menu-post', 'public');
        } else {
            Storage::delete($menu->image);
            $validatedData['image'] = $request->file('image')->store('menu-post', 'public');
        }
        $menu->update($validatedData);

        return redirect()->route('menus.index')->with('success', "menu Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return to_route('menus.index');
    }
}
