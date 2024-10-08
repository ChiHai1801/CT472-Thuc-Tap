@extends('doctor.layout.index')
@section('content')
    <script>
        function checkPasswordsMatch() {
            // Lấy giá trị từ hai ô mật khẩu
            var password1 = document.getElementById('pw1').value;
            var password2 = document.getElementById('pw2').value;

            // Kiểm tra xem hai ô mật khẩu có giống nhau hay không
            if (password1 === password2 && password1 != '') {
                document.getElementById('myForm').submit();
            } else {
                alert('Mật khẩu trống hoặc không khớp!');
            }
        }
    </script>


    <body class="hold-transition sidebar-mini">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-4">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin bác sĩ</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->


                                <form id='myForm' action="{{ route('bacsi/capnhatbacsi') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="#" class="col-sm-2 col-form-label">Họ tên</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="hoten"
                                                    value="{{ $userDetailBS->name }}">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="#" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                    value="{{ $userDetailBS->email }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="#" class="col-sm-2 col-form-label">Số điện thoại</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="sdt"
                                                    value="{{ $userDetailBS->phone }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="#" class="col-sm-2 col-form-label">CCCD</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="cccd" 
                                                    value="{{ $userDetailBS->cccd }} " readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="#" class="col-sm-2 col-form-label">Địa chỉ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="diachi"
                                                    value="{{ $userDetailBS->address }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="#" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="pw1" name="matkhau"
                                                    value="">
                                            </div>
                                          </div>
                                            <div class="form-group row">
                                                <label for="#" class="col-sm-2 col-form-label">Nhập lại mật khẩu
                                                    mới</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="pw2"
                                                        value="">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="button" class="btn btn-primary active"
                                                    onclick="checkPasswordsMatch()">Cập nhật</button>
                                            </div>
                                </form>

                            </div>
                            <!-- /.card -->

                        </div>
                        <!--/.col (left) -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </body>
@endsection
