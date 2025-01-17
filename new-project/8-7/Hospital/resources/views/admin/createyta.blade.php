@extends('admin.index')
@section('content')
<form action="/createyt" method="post">
    @csrf
    <div class="form-group">
        <label for="fullname">Họ và tên</label>
        <input type="text" class="form-control" name="fullname" 
            placeholder="Nhập họ và tên" required>
    </div>
    <div class="form-group">
        <label for="giới tính">Giới tính</label>
        <input type="text" class="form-control" name="gioitinh" 
            placeholder="Nhập giới tính" required>
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" 
            placeholder="Nhập số điện thoại" required>
    </div>
    <div class="form-group">
        <label for="ngaysinh">Ngày sinh</label>
        <input type="date" class="form-control" name="ngaysinh" 
            placeholder="Nhập số điện thoại" required>
    </div>
    <div class="form-group">
        <label for="cccd">CCCD</label>
        <input type="text" class="form-control" name="cccd" 
        placeholder="Nhập CCCD" pattern="[0-9]{12}" title="CCCD phải có 12 ký tự" required>
    </div>
    <div class="form-group">
        <label for="phone">Địa chỉ</label>
        <input type="text" class="form-control" name="diachi" 
            placeholder="Nhập địa chỉ" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email"
            placeholder="Nhập địa chỉ email" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="text" class="form-control" name="password"
            placeholder="Nhập mật khẩu" pattern=".{8,}" title="Mật khẩu phải có ít nhất 8 ký tự" required>
    </div>
    <button type="submit" class="btn btn-primary active">Thêm</button>
</form>   
@endsection