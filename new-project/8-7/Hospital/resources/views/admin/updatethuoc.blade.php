@extends('admin.index')
@section('content')
@if(session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
@endif
    <form action="/updatethuoc/{{ $thuoc->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fullname">Tên thuốc</label>
            <input type="text" class="form-control" name="tenthuoc" value="{{ $thuoc->name }}" placeholder="Nhập vào tên thuốc" required>
        </div>
        <div class="form-group">
            <label for="lothuoc">Lô thuốc</label>
            <input type="text" class="form-control" name="lothuoc" value="{{ $thuoc->lothuoc }}" placeholder="Nhập mã lô thuốc" required>
        </div>
        <div class="form-group">
            <label for="ntt">Ngày nhập thuốc</label>
            <<input type="text" class="form-control" value="{{ $thuoc->ngaynhap }}" name="ngaynhap" readonly>
        </div>
        <div class="form-group">
            <label for="dg">Đơn giá</label>
            <input type="text" class="form-control" name="dongia" value="{{ $thuoc->dongia }}" placeholder="Nhập đơn giá" required>
        </div>
        <div class="form-group">
            <label for="dbc">Dạng bào chế</label>
            <input type="text" class="form-control" name="dangbaoche" value="{{ $thuoc->dangbaoche }}" placeholder="Nhập dạng bào chế" required>
        </div>
        <div class="form-group">
            <label for="tncc">Nhà cung cấp</label>
            <input type="text" class="form-control" name="tennhacungcap" value="{{ $thuoc->tennhacungcap }}" placeholder="Nhập tên nhà cung cấp" required>
        </div>
        <button type="submit" class="btn btn-primary active">Cập nhật</button>
    </form>
@endsection
