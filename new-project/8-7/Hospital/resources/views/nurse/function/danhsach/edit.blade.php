@extends('nurse.layout.index')
@section('content')


<script>
  function thoiGianTuDong() {
      var now = new Date();
      now.setHours(now.getHours() + 7); // Thêm 7 giờ cho múi giờ GMT+7

      var ngaykhamInput = document.getElementById('ngay');
      ngaykhamInput.value = now.toISOString().slice(0, 16);
  }


  document.addEventListener('DOMContentLoaded', function() {
      thoiGianTuDong();

  });
</script>

@if(session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
@endif



<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin bệnh nhân</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <h3 class="card-title mt-1 mr-2">Mã bệnh nhân</h3>
                    <input type="text" name="MaBN" class="form-control" value="{{ $userDetail->id }}">
                  </div>
                </div>
              </div>
              </div>
              <!-- /.card-header -->



              <form method="POST">
              <div class="card-header">
                <h3 class="card-title">Thông tin bệnh nhân</h3>
                
              </div>
              <div class="p-0 mt-3">
                <div class="card card-warning">
   
                  <div class="card-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="hoten" class="form-control" value="{{ old('hoten') ?? $userDetail->name_bn }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') ?? $userDetail->email_bn }}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control" value="{{ old('sdt') ?? $userDetail->phone_bn }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Căn cước công dân</label>
                            <input type="text" name="cccd" class="form-control"  value="{{ old('cccd') ?? $userDetail->cccd_bn }}" >
                
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check ml-5">
                              <input class="form-check-input" name="gioitinh" type="radio" name="flexRadioDefault"  value="Nam" @if ( $userDetail->gender_bn== "Nam" ) { checked } @endif  >
                                                 
                              <label class="form-check-label" for="flexRadioDefault1">
                                Nam
                              </label>
                              <input class="form-check-input ml-4" name="gioitinh" type="radio" name="flexRadioDefault" value="Nữ" @if ( $userDetail->gender_bn == 'Nữ' ) { checked } @endif>
                              <label class="form-check-label ml-5" for="flexRadioDefault2">
                                Nữ
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Password </label>
                            <input type="password" name="pass" class="form-control" placeholder="Password . . ." value="{{ old('pass') ?? $userDetail->password_bn}}">
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="ngsinh" class="form-control" value="{{ old('ngsinh') ?? $userDetail->ngaysinh_bn }}">
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Dịch vụ khám</label>
                            <div class="form-check ml-5">
                              <input class="form-check-input" name="Dichvu" type="radio" name="flexRadioDefault"  value="0" @if ( $userDetail->examination_service== 0 ) { checked } @endif   >
                              <label class="form-check-label" for="flexRadioDefault1">
                                Dịch vụ
                              </label>
                            
                              <input class="form-check-input ml-4" name="Dichvu" type="radio" name="flexRadioDefault"  value="1" @if ( $userDetail->examination_service== 1 ) { checked } @endif    >
                              <label class="form-check-label ml-5" for="flexRadioDefault2">
                                Bảo hiểm y tế
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" placeholder="Enter ..." value="{{ old('address') ?? $userDetail->address_bn }}">
                          </div>
                        </div>
                       
                      </div>

                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label>Ngày cập nhật</label>
                            <input type="datetime-local" name="ngay" id="ngay" class="form-control" value="{{ old('ngay')}}">
                          </div>
                        </div>
                      </div>
                      <button onclick="return confirm('Bạn nên kiểm tra lại thông tin thay đổi. Trước khi cập nhật ?')" class="btn btn-primary ml-5 mt-3">Cập nhật</button>
                      <a href="{{ route('function/danhsach/lapdskhambenh') }}" class="btn btn-warning ml-2  mt-3"><i class="fas fa-angle-double-left"></i> Quay lại</a>
                  </div>
                  <!-- /.card-body -->
                  
                </div>
                <!-- /.card -->
                <!-- general form elements disabled -->

                
              <!-- /.card-body -->
              @csrf
            </form>
            <!-- /.card -->

           
            </div>
            <!-- /.card -->
          </div>
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</body>
@endsection