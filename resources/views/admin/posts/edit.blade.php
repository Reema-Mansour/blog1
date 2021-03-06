@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #9fdf9f">
			Update post: {{$post->title}}
		</div>
		<div class="panel-body">
			<form action="{{ route('post.update',[$post->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{$post->title}}"/>
				</div>
				<div class="form-group">
					<label for="category_id">Category</label>
					<select type="text" name="category_id" class="form-control">
                   @foreach($categories as $category)
                   	 <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach

					</select>
				</div>
				<div class="form-group">
					<label for="featured">Featured image</label>
					<input type="file" name="featured" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update post</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
