@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Change Header</div>
					<div class="panel-body">

						Token : <input type="text" name="token">

					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		console.log(document.location.hash);
	</script>
@endsection
