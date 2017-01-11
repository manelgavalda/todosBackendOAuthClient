@extends('adminlte::page')

@section('htmlheader_title')
	TODO LIST
@endsection


@section('main-content')
	<script>
        window.access_token = {{ $access_token }};
	</script>

	<div id="app">
		<todos></todos>
	</div>
@endsection
