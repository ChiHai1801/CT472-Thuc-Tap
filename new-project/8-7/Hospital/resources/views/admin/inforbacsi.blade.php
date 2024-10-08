@extends('admin.index')
@section('content')
    <form action="" method="get">

        <div class="col-3 input-group input-group-sm float-right">
            <input type="search" name="keywords" class="form-control" placeholder="Search . . . "
                value="{{ request()->keywords }}">

            <div class="input-group-append">
                <button style="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i>Tìm kiếm</button>
            </div>
        </div>


    </form>

    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th>Mã</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>CCCD</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userList as $bacsi)
                <tr class="text-center">
                    <td>{{ $bacsi->id }}</td>
                    <td>{{ $bacsi->name }}</td>
                    <td>{{ $bacsi->gender }}</td>
                    <td>{{ $bacsi->phone }}</td>
                    <td>{{ $bacsi->cccd }}</td>
                    <td>{{ $bacsi->email }}</td>
                    <td>{{ $bacsi->created_at }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="/deletebacsi/{{ $bacsi->id }}" method="post" id="myForm">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirmDelete1()" class="btn btn-danger active"><i
                                    class="bi bi-trash"></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!empty($phantrang))
        <div>
            <a class="page-item"> {!! $phantrang->links() !!}</a>
        </div>
    @endif
@endsection
