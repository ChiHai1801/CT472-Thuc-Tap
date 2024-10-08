@extends('nurse.layout.index')
@section('content')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper mt-4">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Xác nhận thông tin bệnh nhân</h3>

                <form action="" method="get">

                  

                  <div class="col-3 input-group input-group-sm float-right">
                    <input type="search" name="keywords" class="form-control" placeholder="Search . . . " value="{{  request()->keywords  }}">
                  
                  <div class="input-group-append">
                      <button style="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i>Tìm kiếm</button>
                  </div>
                </div>

                <div class="col-2 input-group input-group-sm float-right">
                  <select class="form-control" name="gioitinh">
                    <option value="0">Giới tính </option>
                    <option value="Nam" {{ request()->gioitinh=='Nam'? 'selected':false }}>Nam</option>
                    <option value="Nu" {{ request()->gioitinh=='Nu'? 'selected':false }}>Nữ</option>
                  </select>
                </div>

                <div class="col-2 input-group input-group-sm float-right">
                  <select class="form-control" name="trangthai">
                    <option value="0">Trạng thái</option>
                    <option value="xacnhan" {{ request()->trangthai=='xacnhan'? 'selected':false }}>Đã xác nhận</option>
                    <option value="chuaxacnhan" {{ request()->trangthai=='chuaxacnhan'? 'selected':false }}>Chưa xác nhận</option>
                  </select>
                </div>
                
                </form>

              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Mã</th>
                    <th scope="col">Họ tên</th>
                    {{-- <th scope="col">Email</th> --}}
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Thời gian hẹn</th>
                    <th scope="col">Trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!empty ($userList))
                  @foreach ($userList as $key => $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{ $item->name_bn }}</td>
                    {{-- <td>{{ $item->email_bn }}</td> --}}
                    <td>{{  $item->gender_bn }}</td>
                    <td>{{ $item->phone_bn }}</td>
                    <td style="width:20%">{{ $item->address_bn }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td id="option">
                      @if(($item->trangthai) == 1)
                      <a class="btn btn-success">Đã xác nhận</a> 
                      @else 
                        <a href="{{route('edit-bs', ['id'=>$item->id])}}" onclick='document.getElementById("{{$item->id}}").innerHTML = "Xác nhận thành công"' class="btn btn-success">
                          Xác nhận</a>
                    @endif 
                    <a  type="reset" class="btn btn-default ml-2"><i class="fas fa-times"></i> Hủy</a>
                      <p id="{{$item->id }}"></p>
                    </td>
                  </tr>
                  @endforeach
                  @endif

                </tbody>
              </table>

              @if (!empty($phantrang))
              <div>
                  <a class="page-item"> {!! $phantrang->links() !!}</a>
              </div>
              @endif
            </div>
            <!-- /.card -->
            </div>
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

</body>

@endsection


