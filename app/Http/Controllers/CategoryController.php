<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

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
        $perPage = 15;

        if (!empty($keyword)) {
            $category = Category::where('jalan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category::paginate($perPage);
        }

        return view('pages.kategori', compact('category'));
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
        $category = Category::findOrFail($id);
        
        return view('pages.kategori.show', compact('category'));
    }
}
