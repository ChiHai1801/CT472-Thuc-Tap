@extends('nurse.layout.index')
@section('content')

<script>
  function thoiGianTuDong() {
      var now = new Date();
      now.setHours(now.getHours() + 7); // Thêm 7 giờ cho múi giờ GMT+7

      var ngaykhamInput = document.getElementById('ngaylap');
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

        <form method="POST">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Phiếu khám bệnh</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm">
                <h3 class="card-title mt-1 mr-2">Mã bệnh nhân</h3>
                <input type="text" name="id_patient" class="form-control" value="{{ $userDetail->id }}">
              </div>
            </div>
          </div>
          
          @error('id_patient')
          <span class="btn btn-danger mt-3">{{ $message }}</span>
        @enderror
          <!-- /.card-header -->
              {{-- @if ($errors->any())
                    <div class="alert alert-primary">Thông tin đã được in</div>
                @endif --}}


            <div class="ml-4 mt-4 mb-2">
              <h3 class="card-title">Thông tin bệnh nhân</h3>
            </div>

            
            <div class="card card-danger">
              <div class="card-body">
                <div class="row col-10">
                  <div class="col-4">
                    <label for="">Họ tên :</label>
                    <input type="text" class="form-control"  value="{{ $userDetail->name_bn }}">
                  </div>
                  <div class="col-4">
                    <label for="">Email (nếu có) :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->email_bn }}">
                  </div>
                  <div class="col-4">
                    <label for="">Số điện thoại :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->phone_bn }}">
                  </div>
                </div>

                <div class="row mt-4 col-12">
                  <div class="col-3">
                    <label for="">Năm sinh :</label>
                    <input type="date" class="form-control" value="{{ $userDetail->ngaysinh_bn }}">
                  </div>
                  <div class="col-3">
                    <label for="">Căn cước công dân :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->cccd_bn }}">
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Giới tính</label>
                      <div class="form-check ml-5">
                        <input class="form-check-input" name="gioitinh" type="radio" name="flexRadioDefault"  value="1" @if ( $userDetail->gender_bn== "Nam" ) { checked } @endif  >
                                           
                        <label class="form-check-label" for="flexRadioDefault1">
                          Nam
                        </label>
                        <input class="form-check-input ml-4" name="gioitinh" type="radio" name="flexRadioDefault" value="0" @if ( $userDetail->gender_bn == 'Nữ' ) { checked } @endif>
                        <label class="form-check-label ml-5" for="flexRadioDefault2">
                          Nữ
                        </label>
                      </div>
                    </div>
                  </div>

                  
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Dịch vụ khám</label>
                        <div class="form-check">
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

                <div class="row mt-4 col-12">
                  <div class="col-12">
                    <label for="">Địa chỉ :</label>
                    <input type="text" class="form-control" value="{{ $userDetail->address_bn }}">
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </div>   
            <!-- /.card-body -->

        <!-- /.card -->
         

            <div class="card-body">

              <div class="form-group col-8">
                <label  for="exampleInputEmail1" >Ngày lập: <span style="color: red">*</span></label>
                <input type="datetime-local" name="ngaylap" id="ngaylap" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('ngaylap') }}">
                @error('ngaylap')
                <span style="color: red">{{ $message }}</span>
              @enderror
              </div>

              <div class="form-group col-8 mt-4">
                <select name="departement" id="departement" class="custom-select">
                  <option value="general">Sáng</option>
                  <option value="cardiology">Chiều</option>
                </select>
              </div>

              <div class="form-group col-8">
                <label for="exampleInputEmail1">Triệu chứng: <span style="color: red">*</span></label>
                <input type="text" name="trieuchung" class="form-control" id="exampleInputEmail1" placeholder="Dấu hiệu lâm sàng . . ." value="{{ old('trieuchung') }}">
                @error('trieuchung')
                <span style="color: red">{{ $message }}</span>
              @enderror
              </div>

              <div class="ml-4">
                  <label for="">Ghi chú:</label>
                  <h6 style="color: red">- Dấu <b>( * )</b> là điều kiện bắt buộc phải nhập.</h6>   
                  {{-- <h6 style="color: red">- Có thể thêm vào giá trị <b>( 0 hoăc Không )</b> vào ô <b>nhịp tim</b> và <b>nhiệt độ</b> nếu không có thông tin</h6> --}}
                  <h6 style="color: red">- Phiếu khám bệnh chỉ được lập và in duy nhất một bảng cho một lần khám.</h6>
              
                </div>

              <div class="card-footer">
                <div class="float-right">
                  <button class="btn btn-primary float-right ml-3"><i class="far fa-credit-card"></i> Lưu và In phiếu
                  </button>

                 
                 
                </div>
                <a href="{{ route('function/lapphieu/lapphieukhambenh') }}" class="btn btn-warning"><i class="fas fa-angle-double-left"></i> Quay lại</a>

              {{-- @if () --}}
                  <a href="{{ route('lapphieu/edit-xpk', ['id'=>$userDetail->id]) }}" class="btn btn-success ml-2">Xem lại phiếu</a>
              {{-- @else --}}
              {{-- <a href="#" class="btn btn-success ml-2">Chưa lập phiếu</a> --}}
              {{-- @endif --}}
                
              </div>
          </div>
          <!-- /.card-body -->

        </div>
        @csrf
      </form>
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