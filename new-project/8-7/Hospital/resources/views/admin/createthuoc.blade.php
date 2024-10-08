@extends('admin.index')
@section('content')
    <script>
        function thoiGianTuDong() {
            var now = new Date();
            now.setHours(now.getHours() + 7); // Thêm 7 giờ cho múi giờ GMT+7

            var ngaynhapthuocInput = document.getElementById('ngaynhapthuoc');
            ngaynhapthuoc.value = now.toISOString().slice(0, 16);
        }

        document.addEventListener('DOMContentLoaded', function() {
            thoiGianTuDong();

        });
    </script>
    <form action="/createthuoc" method="post">
        @csrf
        <div class="form-group">
            <label for="fullname">Tên thuốc</label>
            <input type="text" class="form-control" name="tenthuoc" placeholder="Nhập vào tên thuốc" required>
        </div>
        <div class="form-group">
            <label for="lothuoc">Lô thuốc</label>
            <input type="text" class="form-control" name="lothuoc" placeholder="Nhập mã lô thuốc" required>
        </div>
        <div class="form-group">
            <label for="ntt">Ngày nhập thuốc</label>
            <input type="datetime-local" class="form-control" id="ngaynhapthuoc" name="ngaynhap" readonly>
        </div>
        <div class="form-group">
            <label for="dg">Đơn giá</label>
            <input type="text" class="form-control" name="dongia" placeholder="Nhập đơn giá" required>
        </div>
        <div class="form-group">
            <label for="dbc">Dạng bào chế</label>
            <input type="text" class="form-control" name="dangbaoche" placeholder="Nhập dạng bào chế" required>
        </div>
        <div class="form-group">
            <label for="tncc">Nhà cung cấp</label>
            <input type="text" class="form-control" name="tennhacungcap" placeholder="Nhập tên nhà cung cấp" required>
        </div>
        <button type="submit" class="btn btn-primary active">Thêm</button>
    </form>
@endsection
