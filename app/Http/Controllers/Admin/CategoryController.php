<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $category = Category::where('nama_kategori', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category::latest()->paginate($perPage);
        }

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
        	$request, 
        	[
        		'nama_kategori' => 'required',
        	]
        );

        // Create Post
        $category = new Category;
        $category->nama_kategori = $request->input('nama_kategori');
        $category->save();

        return redirect('admin/category')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        // $category = Category::findOrFail($id);
        
        // return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'nama_kategori' => 'required',
            ]
        );

        // Update Database
        $category = Category::find($id);
        $category->nama_kategori = $request->input('nama_kategori');
        $category->save();

        return redirect('admin/category')->with('success', 'Kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect('admin/category')->with('success', 'Kategori telah berhasil dihapus!');
    }
}
