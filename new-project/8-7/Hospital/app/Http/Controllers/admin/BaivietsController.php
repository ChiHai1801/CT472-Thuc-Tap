<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Baiviet;

class BaivietsController extends DB
{
    public $data = [];
    private $baiviet;

    public function __construct()
    {
        $this->baiviet = new Baiviet();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baiviets = $this->baiviet->getPosts();
        $word = explode(" ", $baiviets[0]->noidung);
        $noidung = implode(" ", array_splice($word, 0, 10));
        $noidung . "...";
        // dd($noidung);
        return view('admin.inforbaiviet', compact('baiviets', 'noidung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createbaiviet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $check = $request->input('ttnb');
        $check = $check == 'Không' ? '0' : '1';

        $this->baiviet->create([
            'name' => $request->input('tbv'),
            'noidung' => $request->input('ndbv'),
            'ttnoibat' => $check,
            'ttnoidung' => $request->input('ttnd'),
            'danhmuc' => $request->input('danhmuc'),
            'photo_path' => $imageName,
        ]);

        return redirect('/inforbaiviet');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Baiviet $baiviet)
    {
        return view('admin.updatebaiviet', compact('baiviet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $baiviet = Baiviet::where('id', $id);
        $check = $request->input('ttnb');
        $check = $check == 'Không' ? '0' : '1';
        $baiviet->update([
            'name' => $request->input('tbv'),
            'noidung' => $request->input('ndbv'),
            'ttnoibat' => $check,
            'ttnoidung' => $request->input('ttnd'),
            'danhmuc' => $request->input('danhmuc'),
            'photo_path' => $imageName,
        ]);

        return redirect('/inforbaiviet');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baiviet = Baiviet::find($id);
        $baiviet->delete();
        return redirect('/inforbaiviet');
    }
}
