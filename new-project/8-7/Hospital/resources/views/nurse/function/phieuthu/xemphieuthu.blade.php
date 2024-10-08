@extends('nurse.layout.index')
@section('content')
<body class="hold-transition sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <section class="content mt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Phiếu thu bảo hiểm y tế
                    <small class="float-right">Ngày lập: {{ $userDetail->ngaykham }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <form method="POST">
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
                          <div class="form-check ">
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
  
                  <div class="row mt-4">
                    <div class="col-12">
                      <label for="">Địa chỉ :</label>
                      <input type="text" class="form-control" value="{{ $userDetail->address_bn }}">
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-12">
                      <label for="">Chẩn đoán :</label>
                      <input type="text" class="form-control" value="{{ $userDetail->chandoan }}">
                    </div>
                  </div>
  
                </div>
                <!-- /.card-body -->


              <!-- /.row -->

              <!-- Table row -->
              <div class="row mt-1">
                <div class="col-12 table-responsive">

                    <table class="table table-striped mt-4">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên thuốc</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thành tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($DSthuphis as $index => $prescription)
                          <tr>
                              <td>{{ $index+1 }}</td>
                             
                              <td>{{ $prescription->tenthuoc }}<br></td>
                              <td>{{ $prescription->soluong }}<br></td>
                              <td>{{ $prescription->donvi }}<br></td>
                              <td>{{ $prescription->thanhtien }}<br></td>
                          </tr>
                          @endforeach
                           <tr>
                            <td colspan="5">Tổng tiền: {{ $userDetail->tongtien}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                    <p>Phiếu có giá trị xuất hóa đơn trong ngày, kiểm tra tên thuốc, số lượng thuốc trước khi rời quầy</p>
                    <p>(Mọi thắc mắc về sau Nhà thuốc không chịu trách nhiệm)</p>
                </div>
                <!-- /.col -->
                <div class="col-4 mt-6">
                  <p class="lead">Ngày . . . tháng . . . Năm</p>

                  <div class="table-responsive">
                    <h2 class="ml-5">Người thu tiền</h2>   
                  <h4 class=" mt-3 ml-5">{{ $userDetailYT->name }}</h4>   
                </div>
              </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 mt-5">
                  <a href="{{ route('function/phieuthu/phieuthu') }}" class="btn btn-warning"><i class="fas fa-angle-double-left"></i> Quay lại</a>

                  <a href="{{ route('edit-inbh', ['id'=>$userDetail->id]) }}" rel="noopener" target="_blank" class="btn btn-secondary float-right"><i class="fas fa-print"></i> Print</a>
                </div>

              </div>

              @csrf
            </form>

            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>

@endsection
