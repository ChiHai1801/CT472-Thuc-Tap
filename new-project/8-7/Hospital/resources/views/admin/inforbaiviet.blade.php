@extends('admin.index')
@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th>Mã</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Tin tức nổi bật</th>
                <th>Nội dung</th>
                <th>Tóm tắt nội dung</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($baiviets as $baiviet)
                <tr class="text-center">
                    <td>{{ $baiviet->id }}</td>
                    <td>{{ $baiviet->name }}</td>
                    <td>{{ $baiviet->danhmuc }}</td>
                    <td>{!! $baiviet->ttnoibat == 1 ? 'Có' : 'Không' !!}</td>
                    <td>{{ $noidung }}</td>
                    <td>{{ $baiviet->ttnoidung }}</td>
                    <td>{{ $baiviet->photo_path }}</td>
                    <td>{{ $baiviet->created_at }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="/deletebaiviet/{{ $baiviet->id }}" method="post" class="mr-2">
                            <a href="{{ route('baiviet.edit', ['baiviet' => $baiviet->id]) }}" class="btn btn-success"> Sửa
                            </a>
                            
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirmDelete2()" class="btn btn-danger active"><i
                                    class="bi bi-trash "></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
