<form method="post" action="{{route('test')}}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<button type="submit">Tải</button>
</form>