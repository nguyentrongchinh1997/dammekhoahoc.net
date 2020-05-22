@extends('admin.layouts.index')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="page-title">
                <h3>Sửa bài viết</h3>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="">Trang chủ</a></li>
                <li><a href="#">Sửa bài viết</a></li>
            </ul>
            <div class="visible-xs breadcrumb-toggle">
                <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
            </div>
        </div>
        @if (session('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
        @endif
        @if (count($errors->all()) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-body">
            <form action="{{route('admin.news.edit.post', ['id' => $news->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input required="required" value="{{$news->title}}" type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label class="control-label">Hình ảnh cũ</label><br>
                    <img src='{{asset("upload/thumbnails/$news->image")}}' width="100px">
                    <input type="hidden" value="{{$news->image}}" name="file_old">
                </div>
                <div class="form-group">
                    <label class="control-label">Hình ảnh mới</label>
                    <input type="file" name="file" class="styled">
                </div>
                <div class="form-group">
                    <label>Chuyên mục</label>
                    <select data-placeholder="Select department" class="select-full" tabindex="2" name="category_id">
                        @foreach ($categories as $cate)
                            <option @if($cate->id == $news->category_id){{'selected'}}@endif value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nguồn</label>
                    <input type="text" value="{{$news->author}}" class="form-control" name="author" placeholder="vd: báo lao động...">
                </div>
                <div class="form-group">
                    <label class="control-label">Từ khóa (nhập và ấn enter)</label>
                    <input required="required" value="{{$news->keyword}}" name="keyword" type="text" id="tags2" class="tags">
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <textarea required="required" name="summury" class="form-control ckeditor" rows="5" placeholder="Mô tả...">{{$news->summury}}</textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea required="required" name="content" required="required" name="content" id="content-ckeditor" class="form-control ckeditor">{{$news->content}}</textarea>
                </div>
                <div class="form-group">
                    <center>    
                        <button class="btn btn-primary">Hoàn thành</button>
                    </center>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

