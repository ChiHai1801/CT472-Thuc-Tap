@extends('admin.index')
@section('content')
    <style>
        .btn:hover {
            background-color: #545b62;
            border-color: #4e555b;
        }

        .btn {
            margin: 2px;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm bài viết
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form action="/createbv" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input type="text" name="tbv" class="form-control" onkeyup="ChangeToSlug();"
                                    id="slug" placeholder="Tên bài viết">
                            </div>
                            <div for="category" class="form-group">
                                <label>Danh mục:</label>
                                <input type="radio" name="danhmuc" value="Sức khỏe" id="option">
                                <label for="1">Sức khỏe</label>
                                <input type="radio" name="danhmuc" value="Thuốc" id="option">
                                <label for="2">Thuốc</label>
                                <input type="radio" name="danhmuc" value="Bệnh" id="option">
                                <label for="3">Bệnh</label>
                                <input type="radio" name="danhmuc" value="Nghiên cứu" id="option">
                                <label for="4">Nghiên cứu</label>
                            </div>

                            <div class="form-group">
                                <label for="highlight-news">Tin tức nổi bật:</label>
                                <input type="radio" name="ttnb" value="Có" id="option">
                                <label for="5">Có</label>
                                <input type="radio" name="ttnb" value="Không" id="option">
                                <label for="6">Không</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="ttnd" id="ckeditor1"
                                    placeholder="Tóm tắt bài viết"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="ndbv" id="ckeditor2"
                                    placeholder="Nội dung bài viết"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info active">Thêm bài
                                viết</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
