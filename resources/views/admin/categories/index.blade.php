@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading" style="background-color: #9fdf9f">
		Categories
	</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>Category</th>
					<th>Updating</th>
					<th>Deleting</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $cat)
				<tr>
					<td>{{$cat->name}}</td>
					  <td><a class="btn btn-sm btn-info" href="{{Route('category.edit', ['id'=>$cat->id])}}">edit</a></td>
					<td><a class="btn btn-sm btn-danger" href="{{Route('category.delete', ['id'=>$cat->id])}}">delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
 </div>
</div>
@endsection
