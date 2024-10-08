<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thuoc;

class ThuocsController extends DB
{
    public $data = [];
    private $thuoc;

    public function __construct()
    {
        $this->thuoc = new Thuoc();
    }

    public function index()
    {
        $thuocs = $this->thuoc->getThuocs();
        return view('admin.inforthuoc', $this->data, compact('thuocs'));
    }

    public function create()
    {
        return view('admin.createthuoc');
    }

    public function store(Request $request)
    {
        $thuoc = Thuoc::create([
            'lothuoc' => $request->input('lothuoc'),
            'name' => $request->input('tenthuoc'),
            'ngaynhap' => $request->input('ngaynhap'),
            'dongia' => $request->input('dongia'),
            'dangbaoche' => $request->input('dangbaoche'),
            'tennhacungcap' => $request->input('tennhacungcap')
        ]);
        return redirect('/inforthuoc');
    }

    public function edit($id)
    {
        $thuoc = $this->thuoc->getThuoc($id);
        $thuoc = $thuoc[0];
        $data['thuoc'] = $thuoc;
        return view('admin.updatethuoc', $data);
    }
    
    public function update(Request $request ,$id)
    {
        $thuoc = Thuoc::find($id);
        $thuoc->update([
            'lothuoc' => $request->input('lothuoc'),
            'name' => $request->input('tenthuoc'),
            'ngaynhap' => $request->input('ngaynhap'),
            'dongia' => $request->input('dongia'),
            'dangbaoche' => $request->input('dangbaoche'),
            'tennhacungcap' => $request->input('tennhacungcap')
        ]);
        return redirect('/inforthuoc');
    }
    
    public function destroy($id)
    {
        $thuoc= Thuoc::find($id);
        $thuoc->delete();
        return redirect('/inforthuoc');
    }

}
