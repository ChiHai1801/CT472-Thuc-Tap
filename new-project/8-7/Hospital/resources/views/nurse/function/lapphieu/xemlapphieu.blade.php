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
              <form method="POST">
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Phiếu khám bệnh
                    <small class="float-right">Ngày lập: {{ $userDetail->created_at }}

                      {{-- <img width="100" height="100" src="{{asset('img/qr-phongkham.png')}}"> --}}
                    </small>
                      
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              
              <div class="row invoice-info">
                <div class="col-sm-10 invoice-col">
                  <div class="card-header">
                      <h3 class="card-title">Thông tin bệnh nhân</h3>
                  
                  <table class="table table-sm ">
                  <thead>
                    <tr>
                      <th scope="col">Họ tên:</th>
                      <td colspan="4" scope="col">{{ $userDetail->name_bn }}</td>
                      <th scope="col">Email (nếu có): </th>
                      <td colspan="4" scope="col">{{ $userDetail->email_bn }}</td>
                      <th scope="col">Giới tính: </th>
                      <td colspan="4" scope="col">{{  $userDetail->gender_bn }}</td>
                      </tr>
                     
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="4" scope="col">Số điện thoại: </th><td>{{ $userDetail->phone_bn }}</td>
                      <th colspan="4" scope="col">Năm sinh: </th><td>{{ $userDetail->ngaysinh_bn }}</td>
                      </tr>
                      <tr>
                        <th colspan="4" scope="col">Dịch vụ khám: </th><td>{{ $userDetail->examination_service==0? 'Dịch vụ':'Bảo hiểm y tế' }}</td>
                      </tr>
                      <tr>
                        <th scope="col">Địa chỉ: </th>
                        <td colspan="6" >{{ $userDetail->address_bn }}</td>
                        </tr>
                      <tr>
                      <th scope="col">Triệu chứng: </th>
                      <td colspan="6" >{{ $userDetail->trieuchung }}</td>
                      </tr>
                  </tbody>
                  </table>
              </div>
              </div>
 
                <!-- /.col -->
              </div>

              <!-- /.row -->

              <!-- Table row -->
              
                {{-- <div class="col-10 table-responsive ml-4">

                    <label for="">Lưu ý:</label>
                    <h6>- Phiếu khám bệnh chỉ in duy nhất một bảng cho một lần khám.</h6>   
                  <!-- /.col -->
              </div> --}}

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">
                  <label for="">Lưu ý:</label>
                  <h6>- Phiếu khám bệnh chỉ in duy nhất một bảng cho một lần khám.</h6> 
                </div>
                <!-- /.col -->
                <div class="col-4 mt-3">
                  <p class="lead">Ngày . . . tháng . . . Năm</p>

                  <div class="table-responsive">
                    <h2 class="ml-5">Người lập phiếu</h2>   
                  <h4 class=" mt-3 ml-5">{{ $userDetailYT->name }}</h4>   
                </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          <!-- /.col -->
              
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 mt-5 float-right" >
                
                  <a href="{{ route('lapphieu/edit-pk', ['id'=>$userDetail->id]) }}" class="btn btn-warning"><i class="fas fa-angle-double-left"></i> Quay lại</a>
                
                  <a href="{{ route('lapphieu/edit-inpk', ['id'=>$userDetail->id]) }}" rel="noopener" target="_blank" class="btn btn-secondary float-right"><i class="fas fa-print"></i> Print</a>
                
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
