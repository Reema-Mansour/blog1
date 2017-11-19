@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading" style="background-color: #9fdf9f">
		Trashed Posts
	</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Edit</th>
					<th>Restore</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" style="width:70px; height:50px"></td>
                    <td>{{$post->title}}</td>
					<td><a class="btn btn-sm btn-info" href="{{ Route('post.edit',[$post->id])}}">Edit</a></td>
					<td><a class="btn btn-sm btn-success" href="{{ Route('post.restore',[$post->id])}}">Restor</a></td>
					<td><a class="btn btn-sm btn-danger" href="{{ Route('post.kill',[$post->id])}}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
 </div>
</div>
@endsection
