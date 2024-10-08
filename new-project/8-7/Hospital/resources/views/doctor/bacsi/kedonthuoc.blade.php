@extends('doctor.layout.index')
@section('content')
    <style>
        .nut_them {
            display: inline-block;
            border-radius: 4px;
            background-color: #06a909;
            border: none;
            color: #fff;
            text-align: center;
            font-size: 16px;
            padding: 10px 24px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .nut_them:hover {
            background-color: #09d10c;
        }

        .nut_luu {
            display: inline-block;
            border-radius: 4px;
            background-color: #007bff;
            border: none;
            color: #fff;
            text-align: center;
            font-size: 16px;
            padding: 10px 24px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .nut_luu:hover {
            background-color: #0056b3;
        }
    </style>

<script>
    var soThuTu = 1;
    var tongTien = 0;
    var taiKham = [];
    var chanDoan = [];
    var maDonThuoc = 155;
    var danhSachThuoc = [];

    function capNhatDuLieuBieuMau() {
        var tableDataInput = document.getElementById("tableData");
        var table = document.getElementById("bangHangCho");
        var rows = table.getElementsByTagName("tr");

        var data = [];

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var row = {
                soThuTu: cells[0].innerHTML, // Lấy số thứ tự từ cột đánh số
                tenThuoc: cells[1].innerHTML,
                donVi: cells[2].innerHTML,
                soLuong: cells[3].innerHTML,
                giaBan: cells[4].innerHTML,
                cachDung: cells[5].innerHTML,
                thanhTien: cells[6].innerHTML,
            };
            data.push(row);
        }
        data.push(maDonThuoc);
        data.push(taiKham);
        data.push(chanDoan);
        data.push(tongTien);
        tableDataInput.value = JSON.stringify(data);
    }

    function capNhatSTT() {
        var bangHangCho = document.getElementById("bangHangCho");
        var rows = bangHangCho.getElementsByTagName("tr");
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            cells[0].innerHTML = i + 1; // Cập nhật số thứ tự
        }

        tongTien = 0; // Đặt lại giá trị tổng tiền thành 0
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var thanhTien = parseInt(cells[6].innerHTML); // Lấy giá trị thành tiền từ cột "Thành tiền"
            tongTien += thanhTien; // Cộng dồn vào tổng tiền
        }
        // Cập nhật tổng tiền
        document.getElementById("tongTien").innerHTML = tongTien;

    }

    function hienThiKhac() {
        chanDoan = document.getElementById("chanDoan").value
        taiKham = document.getElementById("taiKham").value
        maDonThuoc = document.getElementById("maDonThuoc").value
    }

    function themThuoc() {
        // Lấy giá trị từ các trường nhập liệu
        var donVi = document.getElementById("donVi").value;
        var tenThuoc = document.getElementById("tenThuoc").value;
        var soLuong = document.getElementById("soLuong").value;
        var giaBan = document.getElementById("giaBan").value;
        var cachDung = document.getElementById("cachDung").value;

        // Kiểm tra xem thuốc đã tồn tại trong danh sách hay chưa
        var found = danhSachThuoc.find(function(thuoc) {
            return thuoc.tenThuoc === tenThuoc;
        });

        if (found) {
            alert("Thuốc đã tồn tại trong danh sách hàng chờ.");
            return;
        }

        // Tính thành tiền
        var thanhTien = soLuong * giaBan;
        tongTien += thanhTien;

        // Tạo một hàng mới trong bảng hàng chờ
        var table = document.getElementById("bangHangCho");
        var row = table.insertRow(-1);

        // Thêm dữ liệu vào các ô trong hàng
        var cellSoThuTu = row.insertCell(0);
        cellSoThuTu.innerHTML = soThuTu++;

        var cellTenThuoc = row.insertCell(1);
        cellTenThuoc.innerHTML = tenThuoc;

        var cellDonVi = row.insertCell(2);
        cellDonVi.innerHTML = donVi;

        var cellSoLuong = row.insertCell(3);
        cellSoLuong.innerHTML = soLuong;

        var cellGiaBan = row.insertCell(4);
        cellGiaBan.innerHTML = giaBan;

        var cellCachDung = row.insertCell(5);
        cellCachDung.innerHTML = cachDung;

        var cellThanhTien = row.insertCell(6);
        cellThanhTien.innerHTML = thanhTien;

        var cellHanhDong = row.insertCell(7);
        cellHanhDong.innerHTML =
            '<button class="btn btn-danger" onclick="xoaHang(this)">Xoá</button> <button class="btn btn-warning" onclick="suaHang(this)">Sửa</button>';

        // Thêm thuốc vào danh sách
        danhSachThuoc.push({
            tenThuoc: tenThuoc,
            donVi: donVi,
            soLuong: soLuong,
            giaBan: giaBan,
            cachDung: cachDung,
            thanhTien: thanhTien
        });
        hienThiKhac();
        capNhatSTT();
        capNhatDuLieuBieuMau();
        }



        function xoaHang(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Cập nhật danh sách thuốc
            var tenThuoc = row.getElementsByTagName("td")[1].innerHTML;
            danhSachThuoc = danhSachThuoc.filter(function(thuoc) {
                return thuoc.tenThuoc !== tenThuoc;
        });

            capNhatSTT();
            capNhatDuLieuBieuMau();
        }

        function suaHang(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");

            var soThuTu = cells[0].innerHTML; // Lấy số thứ tự từ cột đánh số
            var tenThuoc = cells[1].innerHTML;
            var donVi = cells[2].innerHTML;
            var soLuong = cells[3].innerHTML;
            var giaBan = cells[4].innerHTML;
                        var cachDung = cells[5].innerHTML;

            // Điền dữ liệu vào form sửa
            document.getElementById("tenThuoc").value = tenThuoc;
            document.getElementById("donVi").value = donVi;
            document.getElementById("soLuong").value = soLuong;
            document.getElementById("giaBan").value = giaBan;
            document.getElementById("cachDung").value = cachDung;

            // Xoá hàng trong bảng hàng chờ
            row.parentNode.removeChild(row);

            // Cập nhật danh sách thuốc
            danhSachThuoc = danhSachThuoc.filter(function(thuoc) {
                return thuoc.tenThuoc !== tenThuoc;
            });

            capNhatSTT();
            capNhatDuLieuBieuMau()
        }


        function xoaHang(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Cập nhật danh sách thuốc
            var tenThuoc = row.getElementsByTagName("td")[1].innerHTML;
            danhSachThuoc = danhSachThuoc.filter(function(thuoc) {
                return thuoc.tenThuoc !== tenThuoc;
            });

            capNhatSTT();
            capNhatDuLieuBieuMau();
        }

        function suaHang(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName("td");

            var soThuTu = cells[0].innerHTML; // Lấy số thứ tự từ cột đánh số
            var tenThuoc = cells[1].innerHTML;
            var donVi = cells[2].innerHTML;
            var soLuong = cells[3].innerHTML;
            var giaBan = cells[4].innerHTML;
            var cachDung = cells[5].innerHTML;

            // Điền dữ liệu vào form sửa
            document.getElementById("tenThuoc").value = tenThuoc;
            document.getElementById("donVi").value = donVi;
            document.getElementById("soLuong").value = soLuong;
            document.getElementById("giaBan").value = giaBan;
            document.getElementById("cachDung").value = cachDung;

            // Xoá hàng trong bảng hàng chờ
            row.parentNode.removeChild(row);

            // Cập nhật danh sách thuốc
            danhSachThuoc = danhSachThuoc.filter(function(thuoc) {
                return thuoc.tenThuoc !== tenThuoc;
            });

            capNhatSTT();
            capNhatDuLieuBieuMau()
        }


        function hienThiTheoThuoc() {
            var thuocSelect = document.getElementById("tenThuoc");
            var dongiaInput = document.getElementById("giaBan");
            var donviInput = document.getElementById("donVi");

            var selectedThuoc = thuocSelect.options[thuocSelect.selectedIndex];
            dongiaInput.value = selectedThuoc.getAttribute("data-dongia");
            donviInput.value = selectedThuoc.getAttribute("data-donvi");
        }

        document.addEventListener('DOMContentLoaded', function() {
            thoiGianTuDong();
            hienThiTheoThuoc(); // Gọi hàm khi trang được tải xong
            var thuocSelect = document.getElementById("tenThuoc");
            thuocSelect.addEventListener('change', function() {
                hienThiTheoThuoc(); // Gọi hàm khi có sự thay đổi trong select box
                });


        });

        function thoiGianTuDong() {
            var now = new Date();
            now.setHours(now.getHours() + 7); // Thêm 7 giờ cho múi giờ GMT+7

            var taikhamInput = document.getElementById('taiKham');
            var nextWeek = new Date(now.getTime() + 7 * 24 * 60 * 60 * 1000);
            taikhamInput.value = nextWeek.toISOString().slice(0, 16);
        }
    </script>

    <body class="hold-transition sidebar-mini">
        <div class="content-wrapper">
            <!-- Horizontal Form -->
            <div class="card card-info">

                <form action="{{ route('bacsi/addthuoc') }}" method="post">

                    @csrf
                    <label for="themthuoc">Thêm thuốc:</label>
                    <div class="row">
                        <div class="col-sm-6">

                            

                            <label for="maDonThuoc">Mã đơn thuốc:</label>
                            <input type="interger" class="form-control" id="maDonThuoc" value="{{ $madt }}" readonly>
                            
                            <label for="chanDoan">Chẩn đoán:</label>
                            <input class="form-control" id="chanDoan" value="" required>

                            <label for="taiKham">Hẹn tái khám:</label>
                            <input type="datetime-local" class="form-control" name="tg_taikham" id="taiKham">
                            
                            <label for="tenThuoc">Tên thuốc:</label>
                            <select class="form-control" id="tenThuoc" name="tenThuoc">
                                @foreach ($kedons as $thuoc)
                                    <option value="{{ $thuoc->name }}" data-dongia="{{ $thuoc->dongia }}"
                                        data-donvi="{{ $thuoc->dangbaoche }}">{{ $thuoc->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="donVi">Đơn vị:</label>
                            <input class="form-control" id="donVi" name="donVi" readonly>

                            <label for="giaBan">Giá bán:</label>
                            <input class="form-control" id="giaBan" name="giaBan" readonly>

                            <label for="soLuong">Số lượng:</label>
                            <input type="number" class="form-control" id="soLuong" name="soLuong" value="5">

                            <label for="cachDung">Cách dùng:</label>
                            <textarea class="form-control" id="cachDung" name="cachDung" required>Sáng 1, Chiều 1</textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-6">

                            <button type="button" class="nut_them" onclick="themThuoc()">Thêm thuốc</button>

                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên thuốc</th>
                                    <th>Đơn vị</th>
                                    <th>Số lượng</th>
                                    <th>Giá bán</th>
                                    <th>Cách dùng</th>
                                    <th>Thành tiền</th>
                                    <th>Hành động</th>
                                </tr>
                                <tbody id="bangHangCho">

                                </tbody>
                                <input type="hidden" id="tableData" name="table_data" value="">
                                <tfoot>
                                    <tr>
                                        <td colspan="6" align="right"><strong>Tổng tiền thuốc:</strong></td>
                                        <td id="tongTien" colspan="2"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            </div>
            <button type="submit" class="nut_luu">Lưu đơn thuốc</button>
            </form>
        </div>
    </body>
@endsection
