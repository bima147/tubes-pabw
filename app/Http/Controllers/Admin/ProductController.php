<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
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
            $product = Product::where('nama_barang', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        $myItem = DB::table('products')
		            ->join('categories', 'products.cat_id', '=', 'categories.id')
		            ->select('products.*', 'categories.nama_kategori')
		            ->get();
        return view('admin.product.index', compact('product', 'myItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
    	$category = Category::all();
        return view('admin.product.create', compact('category'));
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
        		'nama_barang' => 'required',
        		'deskripsi' => 'required',
        		'cat_id' => 'required',
        		'stok' => 'required',
        		'harga' => 'required',
        		'berat' => 'required',
        		'gambar_1' => 'image|nullable|max:1999',
        		'gambar_2' => 'image|nullable|max:1999',
        		'gambar_3' => 'image|nullable|max:1999',
        	]
        );

        //Handle File Upload Gambar 1
        if($request->hasFile('gambar_1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar_1')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar_1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            $path = $request->file('gambar_1')->storeAs('public/img/product', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        //Handle File Upload Gambar 2
        if($request->hasFile('gambar_2')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('gambar_2')->getClientOriginalName();
            // Get just filename 
            $filename2 = pathInfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('gambar_2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename2."_".time().'.'.$extension2;
            // Upload image
            $path2 = $request->file('gambar_2')->storeAs('public/img/product', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.png';
        }

        //Handle File Upload Gambar 3
        if($request->hasFile('gambar_3')){
            // Get filename with the extension
            $filenameWithExt3 = $request->file('gambar_3')->getClientOriginalName();
            // Get just filename 
            $filename3 = pathInfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
            $extension3 = $request->file('gambar_3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename3."_".time().'.'.$extension3;
            // Upload image
            $path3 = $request->file('gambar_3')->storeAs('public/img/product', $fileNameToStore3);
        } else {
            $fileNameToStore3 = 'noimage.png';
        }

        // Create Post
        $product = new Product;
        $product->nama_barang = $request->input('nama_barang');
        $product->deskripsi = $request->input('deskripsi');
        $product->cat_id = $request->input('cat_id');
        $product->stok = $request->input('stok');
        $product->harga = $request->input('harga');
        $product->berat = $request->input('berat');
        $product->gambar_1 = $fileNameToStore;
        $product->gambar_2 = $fileNameToStore2;
        $product->gambar_3 = $fileNameToStore3;
        $product->save();

        return redirect('admin/product')->with('success', 'Produk berhasil ditambahkan!');
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
        $product = Product::findOrFail($id);
        $category = Category::all();
        return view('admin.product.edit', compact('category'))->with('product', $product);
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
                'nama_barang' => 'required',
        		'deskripsi' => 'required',
        		'cat_id' => 'required',
        		'stok' => 'required',
        		'harga' => 'required',
        		'berat' => 'required',
        		'gambar_1' => 'image|nullable|max:1999',
        		'gambar_2' => 'image|nullable|max:1999',
        		'gambar_3' => 'image|nullable|max:1999',
            ]
        );

        //Handle File Upload Gambar 1
        if($request->hasFile('gambar_1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar_1')->getClientOriginalName();
            // Get just filename 
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar_1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename."_".time().'.'.$extension;
            // Upload image
            $path = $request->file('gambar_1')->storeAs('public/img/product', $fileNameToStore);
        }

        //Handle File Upload Gambar 2
        if($request->hasFile('gambar_2')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('gambar_2')->getClientOriginalName();
            // Get just filename 
            $filename2 = pathInfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('gambar_2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename2."_".time().'.'.$extension2;
            // Upload image
            $path2 = $request->file('gambar_2')->storeAs('public/img/product', $fileNameToStore2);
        }

        //Handle File Upload Gambar 3
        if($request->hasFile('gambar_3')){
            // Get filename with the extension
            $filenameWithExt3 = $request->file('gambar3')->getClientOriginalName();
            // Get just filename 
            $filename3 = pathInfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
            $extension3 = $request->file('gambar_3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename3."_".time().'.'.$extension3;
            // Upload image
            $path3 = $request->file('gambar_3')->storeAs('public/img/product', $fileNameToStore3);
        }

        // Update Database
        $category = Product::find($id);
        $category->nama_kategori = $request->input('nama_kategori');
        $product->nama_barang = $request->input('nama_barang');
        $product->deskripsi = $request->input('deskripsi');
        $product->cat_id = $request->input('cat_id');
        $product->stok = $request->input('stok');
        $product->harga = $request->input('harga');
        $product->berat = $request->input('berat');
        if($request->hasFile('gambar_1')){
            $product->gambar_1 = $fileNameToStore;
        }
        if($request->hasFile('gambar_2')){
            $product->gambar_2 = $fileNameToStore2;
        }
        if($request->hasFile('gambar_3')){
            $product->gambar_3 = $fileNameToStore3;
        }
        $product->save();

        return redirect('admin/product')->with('success', 'Produk berhasil diubah!');
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
        Product::destroy($id);

        return redirect('admin/product')->with('success', 'Produk telah berhasil dihapus!');
    }
}
