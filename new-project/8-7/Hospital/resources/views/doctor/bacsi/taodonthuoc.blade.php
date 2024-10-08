@extends('doctor.layout.index')
@section('content')
    <script>
        function thoiGianTuDong() {
            var now = new Date();
            now.setHours(now.getHours() + 7); // Thêm 7 giờ cho múi giờ GMT+7

            var ngaykhamInput = document.getElementById('ngaykham');
            ngaykhamInput.value = now.toISOString().slice(0, 16);
        }


        document.addEventListener('DOMContentLoaded', function() {
            thoiGianTuDong();

        });
    </script>

    <body class="hold-transition sidebar-mini">
        <div class="content-wrapper">
            <!-- Horizontal Form -->
            
            <div class="card card-info">

                <form id="taoDonThuoc" action="{{ route('bacsi/taodonthuoc') }}" method="post">
                    @csrf
                <div class="card-header">
                    <h3 class="card-title">Kê đơn thuốc</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <h3 class="card-title mt-1 mr-2">Mã bệnh nhân</h3>
                            <input type="text" name="mabn" id="mabn" class="form-control" value="{{ $userDetail->id }}">
                        </div>
                    </div>
                </div>
                
                    
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <div class="card-body">
                                    <tr>
                                        <th colspan="2">Bác sĩ: <input class="form-control" name="tenbs" id="tenbs"
                                                value="{{ $userDetailBS->name }}" readonly></th>
                                        <th colspan="2">Bệnh nhân: <input class="form-control" name="tenbn"
                                                id="tenbn" value="{{ $userDetail->name_bn }}" readonly></th>
                                        <th colspan="2">Giới tính: <input class="form-control"
                                                value="{{  $userDetail->gender_bn  }}" readonly></th>
                                        <th colspan="2">Địa chỉ: <input class="form-control"
                                                value="{{ $userDetail->address_bn }}" readonly></th>
                                        <th colspan="2">Phương thức khám: <input class="form-control"
                                                value="{!! $userDetail->examination_service == 0 ? 'Dịch vụ' : 'BHYT' !!}" readonly></th>
                                        <th colspan="2">Thời gian khám:<input type="datetime-local" class="form-control"
                                                name="tg_kham" id="ngaykham" readonly></th>
                                    </tr>
                            </table>
                            <button type="submit" class="btn btn-primary active ">Bắt đầu tạo đơn</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
