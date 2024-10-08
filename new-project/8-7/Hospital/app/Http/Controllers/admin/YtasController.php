<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Yta;
use App\Models\Admin;

class YtasController extends DB
{
    /**
     * Display a listing of the resource.
     */
    public $data = [];
    private $user;

    public function __construct()
    {
        $this->user = new Admin();
    }
    public function index(Request $request)
    {
        $users = User::where('usertype', '=', 3)->get();
        foreach ($users as $user) {
            $gender = ($user->gender == 'nam') ? 1 : 0;
            $exit_yta = 0;
            $exit_yta = Yta::where('email_yt', $user->email)->count();
            if ($exit_yta == 0) {
                $yta = new Yta();
                $yta->name_yt = $user->name;
                $yta->email_yt = $user->email;
                $yta->phone_yt = $user->phone;
                $yta->gender_yt = $gender;
                $yta->cccd_yt = $user->cccd;
                $yta->address_yt = $user->address;
                $yta->password_yt = $user->password;
                $yta->save();
            }
        }
        // $ytas = DB::table('users')
        // ->where('usertype', 3)
        // ->get();
        // return view('admin.inforyta', compact('ytas'));
        $keywords = null;
        $filters = [];

        if (!empty($request->keywords)) {
            $keywords = $request->keywords; // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
        }

        $userList = $this->user->getAllTableYT($keywords);
        $phantrang = $this->user->phantrangYT();

        return view('admin.inforyta', $this->data, compact('userList', 'phantrang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createyta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $yta = new User();
        $yta->name = $request->input('fullname');
        $yta->phone = $request->input('phone');
        $yta->ngaysinh = $request->input('ngaysinh');
        $yta->cccd = $request->input('cccd');
        $yta->address = $request->input('diachi');
        $yta->gender = $request->input('gioitinh');
        $yta->password = bcrypt($request->input('password'));
        $yta->email = $request->input('email');
        $yta->usertype = '3';
        $yta->save();
        return redirect('/inforyta');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $yta = User::find($id);
        $yta->delete();
        return redirect('/inforyta');
    }
}