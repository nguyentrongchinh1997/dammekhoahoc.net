@extends('admin.layouts.index')

@section('content')
	<div class="page-content">
		<div class="page-header">
			<div class="page-title">
				<h3>Danh sách tin tức</h3>
			</div>
		</div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="">Trang chủ</a></li>
				<li><a href="#">Danh sách</a></li>
			</ul>

			<div class="visible-xs breadcrumb-toggle">
				<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
			</div>
		</div>
        @if (session('thongbao'))
            <div class="alert alert-success">
                {{ session('thongbao') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
		<div class="panel panel-default">
            <div class="datatable">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td colspan="7">
                                <input type="text" autocomplete="off" id="search" placeholder="Từ khóa tìm kiếm" class="form-control" name="">
                            </td>
                            <td>
                                <button class="btn btn-primary">
                                    <a style="color: #fff" href="#">Thêm</a>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Chuyên mục</th>
                            <th>Lượt xem</th>
                            <th>Link nguồn</th>
                            <th>Ngày đăng</th>
                            <th>Loại tin</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="result-search">
                    	@foreach ($newsList as $post)
                            <tr>
                                <td>
                                    {{ ++$stt }}
                                </td>
                                <td>
                                    <img src='{{asset("upload/thumbnails/$post->image")}}' width="100px">
                                </td>
                                <td>
                                    <a target="_blank" href="{{route('detail', ['slug' => $post->slug, 'id' => $post->id])}}">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>
                                    {{ $post->category->name }}
                                </td>
                                <td>
                                    {{ $post->view }}
                                </td>
                                <td>
                                    <a href="{{$post->link}}" target="_blank">
                                        Link
                                    </a>
                                </td>
                                <td>
                                    {{ $post->date }}
                                </td>
                                <td>
                                    @if ($post->type == 0)
                                        <span style="color: red">{{'Tin clone'}}</span>
                                    @else
                                        {{'Tin tự thêm'}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.news.edit', ['id' => $post->id])}}">
                                        <i class="icon-pencil3 edit-category"></i>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return question()" href="#">
                                        <i class="icon-remove3"></i>
                                    </a>
                                </td>
                                <script type="text/javascript">
                                    function question()
                                    {
                                        if (confirm('Bạn có muốn xóa không')) {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                </script>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $newsList->links() }}
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                $('#search').keyup(function(){
                    key = $('#search').val();
                    $.get('admin/post/search?key=' + key, function(data){
                        $('#result-search').html(data);
                    });
                })
            })
        </script>
	</div>
</div>
<style type="text/css">
    .datatable-footer{
        display: none;
    }
</style>
@endsection

