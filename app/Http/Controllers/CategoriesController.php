<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Categories $categories)
    {
        $categories = Categories::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Categories::create($data);
        return redirect()->route('list.categories')->with('thongbao', 'Thêm người dùng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::find($id);
        return view('category.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Categories::find($id);
        $categories->update($request->all());
        return redirect()->route('list.categories', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->route('list.categories', compact('categories'));
    }
}
