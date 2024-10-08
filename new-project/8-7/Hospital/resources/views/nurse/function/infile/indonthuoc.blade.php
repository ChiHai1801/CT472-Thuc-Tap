
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Đơn thuốc
          <small class="float-right">Ngày lập: {{ $userDetail->ngaykham }}</small>
        </h2>
      </div>
    </div>
    <!-- info row -->

    <form method="POST">
    <div class="row invoice-info">
      <div class="col-sm-10 invoice-col">
        <table class="table table-sm mt-4">
          <thead>
            <thead>
              <tr>
                <th >Họ tên: <td colspan="2">{{ $userDetail->name_bn }}</td></th>
                <th >Email (Nếu có): <td>{{ $userDetail->email_bn }}</td>  </th>
                <th >Giới tính: <td colspan="2">{{  $userDetail->gender_bn }}</td></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Số điện thoại: 
                      <td colspan="2">{{ $userDetail->phone_bn }}</td></th>
                <th>Năm sinh: 
                    <td colspan="2">{{ $userDetail->ngaysinh_bn  }}</td></th>
              </tr>
              <tr>
                <th>Dịch vụ khám: 
                  <td colspan="2">{{ $userDetail->examination_service==0? 'Dịch vụ':'Bảo hiểm y tế' }}</td></th>
              </tr>
              <tr>
                <th >Địa chỉ: 
                  <td colspan="6">{{ $userDetail->address_bn }}</td></th>
              </tr>
              <tr>
                <th >Chuẩn đoán: 
                  <td colspan="6">{{  $userDetail->chandoan  }}</td></th>
              </tr>
            </tbody>
        </table>
      </div>
      <!-- /.col -->
      
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped mt-4">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên thuốc/ hàm lượng</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Đơn vị</th>
              <th style="width:20%" scope="col">Cách dùng</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($DSthuocs as $index => $prescription)
            <tr>
                <td>{{ $prescription->id }}</td>
               
                <td>{{ $prescription->tenthuoc }}<br></td>
                <td>{{ $prescription->soluong }}<br></td>
                <td>{{ $prescription->donvi }}<br></td>
                <td>{{ $prescription->cachdung }}<br></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-9"></div>

      <div class="col-3 mt-6">
        <p class="lead">Ngày . . . tháng . . . Năm</p>

        <div class="table-responsive">
          <div class="table-responsive">
            <h6 class="ml-5">Bác sĩ điều trị</h6>   
          <h5 class=" mt-3 ml-4">{{ $userDetail->ten_doctor }}</h5>   
        </div>
        </div>
      </div>
    </div>
      @csrf
    </form>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
