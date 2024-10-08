@extends('admin.index')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h4>Hoạt động hôm nay</h4>
            </div>
        </div>
        <div class="row mb-3 border py-5">
            <div class="col bg-success text-white text-center rounded px-5 mx-5">
                <p>Tài khoản bác sĩ đã thêm</p>
                <p> {{ $bacsisAddedToday }} </p>
            </div>
            <div class="col bg-warning text-white text-center rounded px-5 mx-5">
                <p>Tài khoản y tá đã thêm</p>
                <p> {{ $ytasAddedToday }} </p>
            </div>
            <div class="col bg-danger text-white text-center rounded px-5 mx-5">
                <p>Bài viết đã thêm</p>
                <p> {{ $postsAddedToday }} </p>
            </div>
            <div class="col bg-secondary text-white text-center rounded px-5 mx-5">
                <p>Loại thuốc đã thêm</p>
                <p> {{ $medicinesAddedToday }} </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h4>Thống kê</h4>
            </div>
        </div>
        <div class="row mb-3 border py-5">
            <div class="col border border-primary rounded px-5 mx-5">
                <p>Bác sĩ</p>
                <p>Số lượng:  {{ $soluongbs }}</p>
            </div>
            <div class="col border border-secondary rounded mx-5">
                <p>Y tá </p>
                <p>Số lượng: {{ $soluongyt }} </p>
            </div>
            <div class="col border border-danger rounded mx-5">
                <p>Bài viết</p>
                <p>Số lượng: {{ $soluongbv }} </p>
            </div>
            <div class="col border border-success rounded mx-5">
                <p>Loại thuốc</p>
                <p>Số lượng: {{ $soluonglt }} </p>
            </div>
       
    </div>
@endsection
