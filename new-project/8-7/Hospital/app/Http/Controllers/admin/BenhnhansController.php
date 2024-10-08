<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Benhnhan;
use App\Models\Admin;

class BenhnhansController extends DB
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
        $keywords = null;
        $filters = [];

        if (!empty($request->keywords)) {
            $keywords = $request->keywords; // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
        }

        $userList = $this->user->getAllTableBN($keywords);
        $phantrang = $this->user->phantrangBN();

        return view('admin.inforbenhnhan', $this->data, compact('userList', 'phantrang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $benhnhan= User::find($id);
        $benhnhan->delete();
        return redirect('/inforbenhnhan');
    }
}