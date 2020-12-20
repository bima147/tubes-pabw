<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use Livewire\WithPagination;
use App\Product;

class Index extends Component
{
	use WithPagination;

	public $search;

	protected $updateQueryString = [
		['search' => ['except' => '']]
	];

	public function mount() {
		$this->search = request()->query('search', $this->search);
	}

    public function render()
    {
        return view('livewire.shop.index', [
        	'products' => $this->search === null ?
        		Product::latest()->paginate(12) :
        		Product::latest()->where('nama_barang', '%' . $this->search . '%')->paginate(12)
        ]);
    }

    public function addToCart($productId) {
    	$product = Product::find($productId);
    	$cart = Cart::add($product);

    	dd(Cart::get()['products']);
    }
}
