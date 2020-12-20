@extends('layouts.app')

@section('content')
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-10">
                        <h4>Kategori</h4>
                      </div>
                      <div class="col-md-2">
                        <a href="category/create" class="btn btn-primary">Buat Kategori</a>
                      </div>
                    </div>
                    </div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="text-align: center;">Id</th>
                          <th>Nama Kategori</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($category as $cat)
                        <tr>
                          <td style="text-align: center;">{{ $cat->id }}</td>
                          <td>{{ $cat->nama_kategori }}</td>
                          <td>
                            <a href="{{ url('/admin/category/' . $cat->id . '/edit') }}" title="Edit Kategori">
                              <button class="btn btn-warning btn-sm">
                                <i class="mdi mdi-pencil" aria-hidden="true"></i>
                              </button>
                            </a>
                            {!! Form::open([
                              'method' => 'DELETE',
                              'url' => ['/admin/category', $cat->id],
                              'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="mdi mdi-trash-can-outline" aria-hidden="true"></i>', array(
                              'type' => 'submit',
                              'class' => 'btn btn-danger btn-sm',
                              'title' => 'Delete Category',
                              'onclick'=>'return confirm("Apakah kamu yakin mau menghapus kategori ini?")'
                            )) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $category->links() }}
                  </div>
                </div>
              </div>
            </div>
          <!-- content-wrapper ends -->
@endsection