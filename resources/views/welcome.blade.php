@extends('layouts.master')

@section('content')
    <!--SlideShow-->
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner slider">
                <div class="carousel-item active">
                    <img src="img/8.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
            </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            
              <!--Isi-->
              <div class="mt-3 mb-3">
              <div class="row">
                <a href="#">
                @foreach ($product as $produk)
                <div class="col-md-3">
                  <div class="card card-product">
                    <a href="#" class="products">
                      <img src="img/1.png" class="card-img-top" alt="{{ $produk->nama_barang }}">
                      <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                        <p class="card-text">{!! Illuminate\Support\Str::words($produk->deskripsi, 15, $end=' ...') !!}</p>
                      </div>
                    </a>
                    @guest
                    <a href="{{ route('login') }}" class="add-cart">
                      Tambahkan ke Keranjang
                    </a>
                    @else
                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $produk->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $produk->nama_barang }}" id="name" name="name">
                                        <input type="hidden" value="{{ $produk->harga }}" id="price" name="price">
                                        <input type="hidden" value="{{ $produk->gambar_1 }}" id="img" name="img">
                                        <input type="hidden" value="{{ $produk->stok }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="add-cart" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> Tambahkan ke keranjang
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                    @endguest
                  </div>
                </div>
                @endforeach
          </div>
        </div>
        <p>{{ $product->links() }}</p>
    </div>
@endsection