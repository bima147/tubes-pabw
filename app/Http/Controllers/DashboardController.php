<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Order;

class DashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 16;

        if (!empty($keyword)) {
            $product = Product::where('nama_barang', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        $category = Category::all();
        return view('welcome', compact('category'))->with(['product' => $product]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        return view('cart')->with(['cartCollection' => $cartCollection]);;
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'attributes' => array(
                'gambar_1' => $request->gambar_1,
                'stok' => $request->stok
            )
        ));
        return redirect()->route('welcome')->with('success_msg', 'Item is Added to Cart!');
    }
}
