<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Storage;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->status == 'Super Admin') {
            $admins = User::orderBy('status', 'desc')->get();

            return view('admin.account.index', compact('admins'));
        } else {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->status == 'Super Admin') {
            return view('admin.account.create');
        } else {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'image|max:1999',
            'password1' => 'required|same:password'
            ],
            [
                'foto' => 'Foto harus berupa file gambar',
                'max' => 'ukuran maksimal Foto adalah 2 MB',
                'same' => 'Password tidak sesuai'
            ]);

        $admin = new User;
        $admin->nama = $request->input('nama');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->status = $request->input('status');
        $admin->password = Hash::make($request->input('password'));
        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $FileNameToStore1 = $filename.'_'.time().'_.'.$extension;
            $path = $request->file('foto')->storeAs('public/images/avatar', $FileNameToStore1);
            $admin->foto = $FileNameToStore1;
        }
        $admin->save();

        return redirect('/user')->with('success', 'Akun Admin Baru Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if((auth()->user()->id == $id) || (auth()->user()->status == 'Super Admin')) {
            $admin = User::findOrFail($id);
    
            return view('admin.account.show', compact('admin'));
        } else {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->status == 'Super Admin') {
            $admin = User::findOrFail($id);
            return view('admin.account.edit', compact('admin'));
        } else {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'image|max:1999'
            ],
            [
                'foto' => 'Foto harus berupa file gambar',
                'max' => 'ukuran maksimal Foto adalah 2 MB'
            ]);

        $admin = User::findOrFail($id);
        $admin->nama = $request->input('nama');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->status = $request->input('status');
        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $FileNameToStore1 = $filename.'_'.time().'_.'.$extension;
            $path = $request->file('foto')->storeAs('public/images/avatar', $FileNameToStore1);
            if($admin->foto !== 'default_avatar.png') {
                Storage::delete('public/images/avatar/'.$admin->foto);
                $admin->foto = $FileNameToStore1;
            }
        }
        $admin->save();

        return redirect('/user/'.$id)->with('success', 'Akun Ini Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        if($admin->foto !== 'devault_avatar.png') {
            Storage::delete('public/avatar/'.$admin->foto);
        }
        $admin->delete();
        return redirect('/user')->with('success', 'Akun Admin Berhasil Dihapus');
    }

    public function editpassword($id) {
        if(auth()->user()->id == $id) {
            $admin = User::findOrFail($id);
            return view('admin.account.password', compact('admin'));

        } else {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses.');
        }

    }

    public function editpassword1(Request $request, $id) {

        $this->validate($request, [
            'password1' => 'required|same:password2'
            ],
            [
                'same' => 'Konfirmasi Password Baru Tidak Sesuai'
            ]);
        $oldpassword = $request->input('oldpassword');
        $admin = User::findOrFail($id);
        if (Hash::check($oldpassword, $admin->password)) {
            $admin->password = Hash::make($request->input('password1'));
            $admin->save();

            return redirect('/user/'.$id)->with('success', 'Password Berhasil Diperbaharui.');
        } else {
            return redirect('/editpassword/'.$id.'/user')->with('error', 'Password Lama Tidak Sesuai.');
        }
    }
}
