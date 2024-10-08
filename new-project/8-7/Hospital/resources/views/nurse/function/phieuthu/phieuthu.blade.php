@extends('nurse.layout.index')
@section('content')

<body class="hold-transition sidebar-mini">

<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-4">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Danh sách thu phí</h3>
              </div>

              <form action="" method="get" class="mt-3 ml-5">
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


              <!-- /.card-header -->
              <form method="POST">
              <div class="card-body">
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
                    <th scope="col">Ngày khám</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Dịch vụ khám</th>
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
                    <td style="width:15%">{{ $item->address_bn }}</td>
                    <td>{{ $item->ten_doctor }}</td>

                    <td>{{ $item->ngaykham }}</td>

                    <td>
                    @if( ($item->trangthai)==2)
                    <a>Đã khám</a> 
                      @else 
                    <a >Chờ Khám</a>
                    @endif 
                  </td>

                    <td>{!! $item->examination_service==0? '<a class="btn btn-success 
                      btn-sm">Dịch vụ</a>':'<a class="btn btn-info 
                      btn-sm">Bảo hiểm y tế</a>'!!}</td>
                  </tr>

                  <tr class="expandable-body d-none">
                    <td colspan="10">
                      <p style="display: none;">

                          <a href="#" class="btn btn-primary ">Hóa đơn</a>
                    
                        @if(($item->examination_service) == 1)
                        
                            <a href="{{ route('edit-bh', ['id'=>$item->id]) }}" class="btn btn-primary ml-2">
                              Lập phiếu thu</a>
                          
                          @else
                          
                            <a href="{{ route('edit-dv', ['id'=>$item->id]) }}" class="btn btn-primary ml-2">
                              Lập phiếu thu</a>
                          
                          @endif
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
            </div>
            @csrf
          </form>
        </div>

            <!-- /.card -->
          </div>



          @csrf
        </form>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</body>

@endsection