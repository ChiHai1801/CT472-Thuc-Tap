<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\BacSi;
use App\Models\Admin;
use App\Models\Yta;

class BacsisController extends DB
{
    /**
     *
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
        $users = User::where('usertype', 2)->get();
        foreach ($users as $user) {
            $gender = ($user->gender == 'nam') ? 1 : 0;
            $exit_bacsi = 0;
            $exit_bacsi = Bacsi::where('email_bs', $user->email)->count();
            if ($exit_bacsi == 0) {
                $bacsi = new BacSi();
                $bacsi->name_bs = $user->name;
                $bacsi->email_bs = $user->email;
                $bacsi->gender_bs = $gender;
                $bacsi->phone_bs = $user->phone;
                $bacsi->cccd_bs = $user->cccd;
                $bacsi->address_bs = $user->address;
                $bacsi->password_bs = $user->password;
                $bacsi->save();
            }
        }
        // $bacsis = DB::table('users')
        //     ->where('usertype', 2)
        //     ->get();
        $keywords = null;

        if (!empty($request->keywords)) {
            $keywords = $request->keywords; // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
        }

        $userList = $this->user->getAllTableBS($keywords);
        $phantrang = $this->user->phantrangBS();

        return view('admin.inforbacsi', $this->data, compact('userList', 'phantrang'));

        //return view('admin.inforbacsi', compact('bacsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createbacsi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bacsi = new User();
        $bacsi->name = $request->input('fullname');
        $bacsi->phone = $request->input('phone');
        $bacsi->ngaysinh = $request->input('ngaysinh');
        $bacsi->cccd = $request->input('cccd');
        $bacsi->gender = $request->input('gioitinh');
        $bacsi->address = $request->input('diachi');
        $bacsi->password = bcrypt($request->input('password'));
        $bacsi->email = $request->input('email');
        $bacsi->usertype = '2';
        $bacsi->save();
        return redirect('/inforbacsi');
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
    public function destroy($id)
    {
        $bacsi = User::find($id);
        $bacsi->delete();
        return redirect('/inforbacsi');
    }
// Lấy toàn bộ dữ liệu từ bảng users với điều kiện usertype = 1
}