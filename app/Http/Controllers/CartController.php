<?php

namespace App\Http\Controllers;

use App\User;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::all();
        return view('pages.keranjang.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $category = Category::all();
        return view('address.create', compact('category'));
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
                'penerima' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'kode_pos' => 'required'
        	]
        );

        // Create Post
        $address = new Address;
        $address->penerima = $request->input('penerima');
        $address->no_hp = $request->input('no_hp');
        $address->alamat = $request->input('alamat');
        $address->provinsi = $request->input('provinsi');
        $address->kota = $request->input('kota');
        $address->kecamatan = $request->input('kecamatan');
        $address->kode_pos = $request->input('kode_pos');
        $address->user_id = Auth::user()->id;
        $address->save();

        return redirect('alamat')->with('success', 'Alamat berhasil ditambahkan!');
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
        $address = Address::findOrFail($id);
        $category = Category::all();
        $users = User::all();
        return view('address.show', compact('address', 'category', 'users'));
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
        $address = Address::findOrFail($id);
        $category = Category::all();
        return view('address.edit')->with('address', $address);
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
                'penerima' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
        		'kode_pos' => 'required'
            ]
        );

        // Update Database
        $address = Address::find($id);
        $address->penerima = $request->input('penerima');
        $address->no_hp = $request->input('no_hp');
        $address->alamat = $request->input('alamat');
        $address->provinsi = $request->input('provinsi');
        $address->kota = $request->input('kota');
        $address->kecamatan = $request->input('kecamatan');
        $address->kode_pos = $request->input('kode_pos');
        $address->user_id = Auth::user()->id;
        $address->save();

        return redirect('alamat')->with('success', 'Alamat anda berhasil diubah!');
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
        Address::destroy($id);

        return redirect('alamat')->with('danger', 'Alamat anda telah berhasil dihapus!');
    }
}
