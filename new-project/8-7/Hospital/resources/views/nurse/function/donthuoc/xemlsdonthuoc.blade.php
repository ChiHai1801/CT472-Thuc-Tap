@extends('nurse.layout.index')
@section('content')

<body class="hold-transition sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">

    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Danh sách xem lịch sử đơn thuốc</h3>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <form action="" method="get" class="ml-4 mt-2 mb-2">
                  <div class="card-tools ">
                    
                      <div class="row">
                       
                        <div class="col-2 input-group input-group-sm">
                          <select class="form-control" name="status">
                            <option value="0">Tất cả dịch vụ</option>
                            <option value="Dichvu" {{ request()->status=='Dichvu'? 'selected':false }}>Dịch vụ</option>
                            <option value="BHiem" {{ request()->status=='BHiem'? 'selected':false }}>Bảo hiểm y tế</option>
                          </select>
                        </div>
                        <div class="col-2 input-group input-group-sm">
                          <select class="form-control" name="gioitinh">
                            <option value="0">Giới tính </option>
                            <option value="Nam" {{ request()->gioitinh=='Nam'? 'selected':false }}>Nam</option>
                            <option value="Nu" {{ request()->gioitinh=='Nu'? 'selected':false }}>Nữ</option>
                          </select>
                        </div>
                        <div class="col-3 input-group input-group-sm">
                          <input type="search" name="keywords" class="form-control" placeholder="Search . . . " value="{{  request()->keywords  }}">
                        
                        <div class="input-group-append">
                            <button style="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i>Tìm kiếm</button>
                        </div>
                      </div>
                      </div>
    
                    
                    </div>
                    @csrf
                  </form>
                  <!-- /.btn-group --> 
                </div>
                <!-- /.float-right -->
              </div>

              <div class="table-responsive mailbox-messages">
                <table class="table table-hover">
                    <thead>
                        <tr>
                          <th scope="col">Mã</th>
                          <th scope="col">Họ Tên</th>
                          <th scope="col">Email</th>
                          <th scope="col">Giới tính</th>
                          <th scope="col">Số điện thoại</th>
                          <th scope="col">Địa chỉ</th>
                          <th scope="col">Bác sĩ</th>
                          <th scope="col">ngày khám</th>
                          <th scope="col">Dịch vụ khám</th>
                          {{-- <th scope="col">Chi tiết đơn thuốc</th> --}}
                        </tr>
                      </thead>

                  <tbody>
                    @if (!empty ($userList))
                    @foreach ($userList as $key => $item)

                  <tr data-widget="expandable-table" aria-expanded="false">
                    <th>{{$item->id}}</th>
                    <td>{{ $item->name_bn }}</td>
                    <td>{{ $item->email_bn }}</td>
                    <td>{{  $item->gender_bn }}</td>
                    <td>{{ $item->phone_bn }}</td>
                    <td style="width:20%">{{ $item->address_bn }}</td>
                    <td>{{ $item->ten_doctor  }}</td>
                    <td>{{ $item->ngaykham }}</td>
                    <td>{!! $item->examination_service==0? '<button class="btn btn-success 
                      btn-sm">Dịch vụ</button>':'<button class="btn btn-info 
                      btn-sm">Bảo hiểm y tế</button>'!!}</td>
                  </tr>

                  <tr class="expandable-body d-none">
                    <td colspan="10">
                      <p style="display: none;">

                        <a href="{{ route('edit-ct', ['id'=>$item->id]) }}" class="btn btn-primary">
                          Xem đơn thuốc</a>
                      </p>
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
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>

@endsection
