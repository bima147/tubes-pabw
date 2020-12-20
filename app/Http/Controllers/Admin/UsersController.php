<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $users = User::where('jalan', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::paginate($perPage);
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        // return view('admin.users.create');
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
        // $this->validate(
        // 	$request, 
        // 	[
        // 		'name' => 'required',
        //         'email' => 'required',
        //         'gender' => 'required',
        //         'birthday' => 'required',
        //         'level' => 'required',
        // 		'password' => 'required'
        // 	]
        // );

        // // Create Post
        // $users = new User;
        // $users->name = $request->input('name');
        // $users->email = $request->input('email');
        // $users->gender = $request->input('gender');
        // $users->birthday = $request->input('birthday');
        // $users->level = $request->input('level');
        // $users->password = Hash::make($data['password']);
        // $users->user_id = Auth::user()->id;
        // $users->save();

        // return redirect('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan!');
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
        $users = User::findOrFail($id);
        
        return view('admin.users.show', compact('users'));
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
        $users = User::findOrFail($id);
        return view('admin.users.edit')->with('users', $users);
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
                'name' => 'required',
                'email' => 'required',
                'level' => 'required',
        		'password' => 'required'
            ]
        );

        // Update Database
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->level = $request->input('level');
        $users->password = Hash::make($data['password']);
        $users->user_id = Auth::user()->id;
        $users->save();

        return redirect('admin.users.index')->with('success', 'Pengguna berhasil diubah!');
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
        User::destroy($id);

        return redirect('admin/users/index')->with('success', 'Pengguna anda telah berhasil dihapus!');
    }
}
