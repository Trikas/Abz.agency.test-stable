@extends('layout.table_us')

@section('content')

<div id="container">
	{!!$tree!!}
</div>

@endsection
@section('script')

<script>
	$(function() {
		$('#container').jstree();
	});
</script>
@endsection