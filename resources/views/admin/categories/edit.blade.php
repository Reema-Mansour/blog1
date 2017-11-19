@extends('layouts.app')

@section('content')

	@if ( count($errors) > 0 )
		<ul class="list-group">
			@foreach ($errors->all() as $error)
				<li class="list-group-item text-danger"> {{ $error }}</li>
			@endforeach
		</ul>
	@endif
	<div class="panel panel-default" >
		<div class="panel-heading" style="background-color: #9fdf9f">
			Create a new category
		</div>
		<div class="panel-body">

					<form action="{{ route('category.update',['id'=>$category->id]) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="title">Name: {{$category->name}}</label>
								<input type="text" name="title" class="form-control" value="{{$category->name}}">
						</div>

						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">update</button>
							</div>
						</div>
					</form>
		</div>
	</div>
@endsection
