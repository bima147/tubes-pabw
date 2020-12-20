<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Product;
use Livewire\WithPagination;

class index extends Component
{
	use WithPagination;

    public function render()
    {
        return view('livewire.product.index', [
        	'products' => Product::latest()->paginate(16),
        ]);
    }
}
