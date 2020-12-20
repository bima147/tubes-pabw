@extends('layouts.app')

@section('content')
<div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                </div>
              </div>
            <!-- Page Title Header Ends-->              
            <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{ Auth::user()->count() }}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Pengguna</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{ $product->count() }}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Produk</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{ $category->count() }}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Kategori</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{ $order->count() }}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Pesanan</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
@endsection
