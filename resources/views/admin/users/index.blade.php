@extends('layouts.app')

@section('content')
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4>Pengguna</h4>
                    </div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Email</th>
                          <th style="text-align: center;">Verifikasi Email</th>
                          <th style="text-align: center;">Google</th>
                          <th style="text-align: center;">Facebook</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          @if($user->email != NULL)
                          <td>{{ substr_replace($user->email, str_repeat('*', strpos($user->email, '@')-2), 1, strpos($user->email, '@')-2) }}"</td>
                          @endif
                          <td style="text-align: center;">
                            @if ($user->email_verified_at != NULL)
                            <i class="mdi mdi-check text-success"></i>
                            @else
                            <i class="mdi mdi-close text-danger"></i>
                            @endif
                          </td>
                          <td style="text-align: center;">
                            @if ($user->google_id != NULL)
                            <i class="mdi mdi-check text-success"></i>
                            @else
                            <i class="mdi mdi-close text-danger"></i>
                            @endif
                          </td>
                          <td style="text-align: center;">
                            @if ($user->facebook_id != NULL)
                            <i class="mdi mdi-check text-success"></i>
                            @else
                            <i class="mdi mdi-close text-danger"></i>
                            @endif
                          </td>
                          <td>
                            <!-- <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit User">
                              <button class="btn btn-primary btn-sm">
                                <i class="mdi mdi-pencil" aria-hidden="true"></i>
                              </button>
                            </a> -->
                            {!! Form::open([
                              'method' => 'DELETE',
                              'url' => ['/admin/users', $user->id],
                              'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="mdi mdi-trash-can-outline" aria-hidden="true"></i>', array(
                              'type' => 'submit',
                              'class' => 'btn btn-danger btn-sm',
                              'title' => 'Delete User',
                              'onclick'=>'return confirm("Apakah kamu yakin mau menghapus user ini?")'
                            )) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $users->links() }}
                  </div>
                </div>
              </div>
            </div>
          <!-- content-wrapper ends -->
@endsection