
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
          <i class="fas fa-globe"></i> Phiếu thu bảo hiểm y tế
          <small class="float-right mr-5">Ngày lập: {{ $userDetail->ngaykham }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-10 invoice-col">
        <table class="table table-sm mt-4">
            <thead>
              <tr>
                <th >Họ tên: <td>{{ $userDetail->name_bn }}</td></th>
                <th >Email (Nếu có):  <td>{{ $userDetail->email_bn }}</td></th>
                <th >Giới tính: <td>{{  $userDetail->gender_bn }}</td></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Số điện thoại:
                    <td>{{ $userDetail->phone_bn }}</td></th>
                <th>Năm sinh: 
                    <td>{{ $userDetail->ngaysinh_bn }}</td></th>
              </tr>
              <tr>
                <th>Dịch vụ khám: 
                  <td>{{ $userDetail->examination_service==0? 'Dịch vụ':'Bảo hiểm y tế' }}</td></th>
              </tr>
              <tr>
                <th >Địa chỉ: 
                  <td colspan="6">{{ $userDetail->address_bn }}</td></th>
              </tr>
              <tr>
                <th >Chuẩn đoán: 
                  <td colspan="6"> {{  $userDetail->chandoan  }}</td></th>
              </tr>
            </tbody>
        </table>
      </div>
      <!-- /.col -->
      
      
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
              <th scope="col">Tên thuốc</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Đơn giá</th>
              <th scope="col">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($DSthuphis as $index => $prescription)
            <tr>
                <td>{{ $prescription->id }}</td>
               
                <td>{{ $prescription->tenthuoc }}<br></td>
                <td>{{ $prescription->soluong }}<br></td>
                <td>{{ $prescription->donvi }}<br></td>
                <td>{{ $prescription->thanhtien }}<br></td>
            </tr>
            @endforeach
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
          <h6 class="ml-5">Người thu tiền</h6>   
        <h5 class=" mt-3 ml-5">{{ $userDetailYT->name }}</h5>   
      </div>
      </div>
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
