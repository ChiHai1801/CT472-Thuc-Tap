@extends('admin.index')
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th>Mã</th>
                <th>Tên</th>
                <th>Ngày nhập thuốc</th>
                <th>Đơn giá</th>
                <th>Dạng bào chế</th>
                <th>Nhà cung cấp</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($thuocs as $thuoc)
                <tr class="text-center">
                    <td>{{ $thuoc->id }}</td>
                    <td>{{ $thuoc->name }}</td>
                    <td>{{ $thuoc->ngaynhap }}</td>
                    <td>{{ $thuoc->dongia }}</td>
                    <td>{{ $thuoc->dangbaoche }}</td>
                    <td>{{ $thuoc->tennhacungcap }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="/deletethuoc/{{ $thuoc->id }}" method="post" class="mr-2">
                            <a href="{{ route('thuoc.edit', ['id' => $thuoc->id]) }}" class="btn btn-success"> Sửa
                            </a>
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirmDelete3()" class="btn btn-danger active"><i
                                    class="bi bi-trash "></i> Xóa</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
