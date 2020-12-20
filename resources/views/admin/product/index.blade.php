@extends('layouts.app')

@section('content')
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-10">
                        <h4>Produk</h4>
                      </div>
                      <div class="col-md-2">
                        <a href="product/create" class="btn btn-primary">Buat Produk</a>
                      </div>
                    </div>
                    </div>
                     <div style="overflow-y: auto;"> 
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Id</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Gambar 1</th>
                            <th>Gambar 2</th>
                            <th>Gambar 3</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($myItem as $item)
                          <tr>
                            <td style="text-align: center;">{{ $item->id }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{!! \Illuminate\Support\Str::limit($item->deskripsi, 50, $end='...') !!}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->berat }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td><img src="/storage/img/product/{{ $item->gambar_1 }}" style="height: 100px; width: 100px;" alt="{{ $item->nama_barang }}"></td>
                            <td><img src="/storage/img/product/{{ $item->gambar_2 }}" style="height: 100px; width: 100px;" alt="{{ $item->nama_barang }}"></td>
                            <td><img src="/storage/img/product/{{ $item->gambar_3 }}" style="height: 100px; width: 100px;" alt="{{ $item->nama_barang }}"></td>
                            <td>
                              <a href="{{ url('/admin/product/' . $item->id . '/edit') }}">
                                <button class="btn btn-warning btn-sm">
                                  <i class="mdi mdi-pencil" aria-hidden="true"></i>
                                </button>
                              </a>
                              {!! Form::open([
                                'method' => 'DELETE',
                                'url' => ['/admin/product', $item->id],
                                'style' => 'display:inline'
                              ]) !!}
                              {!! Form::button('<i class="mdi mdi-trash-can-outline" aria-hidden="true"></i>', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Delete Product',
                                'onclick'=>'return confirm("Apakah kamu yakin mau menghapus produk ini?")'
                              )) !!}
                              {!! Form::close() !!}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    {{ $product->links() }}
                  </div>
                </div>
              </div>
            </div>
          <!-- content-wrapper ends -->
@endsection