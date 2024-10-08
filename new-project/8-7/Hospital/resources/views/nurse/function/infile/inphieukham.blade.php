
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
                <i class="fas fa-globe"></i> Phiếu khám bệnh
                <small class="float-right mr-5">Ngày lập:{{ $userDetail->created_at }}</small>
                </h2>
            </div>
            <!-- /.col -->
            </div>
            <!-- info row -->

            <div class="row invoice-info mt-4">
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
                        <th scope="col"></th>
                        </tr>
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
                        <td colspan="6" >{{  $userDetail->trieuchung  }} </td>
                        </tr>
                </tbody>
                </table>
            </div>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->

            <div class="ml-4">
               
            
              </div>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-9"> 
                    <label for="">Lưu ý:</label>
                    <h6>- Phiếu khám bệnh chỉ in duy nhất một bảng cho một lần khám.</h6>   
                </div>
          
                <div class="col-3 mt-6">
                  <p class="lead">Ngày . . . tháng . . . Năm</p>
          
                  <div class="table-responsive">
                    <div class="table-responsive">
                      <h6 class="ml-5">Bác sĩ điều trị</h6>   
                    <h5 class=" mt-3 ml-4">{{ $userDetailYT->name  }}</h5>   
                  </div>
                  </div>
                </div>
              </div>
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
