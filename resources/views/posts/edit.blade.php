@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h2>Update post</h2>
    <div class="lead">
        Edit post.
    </div>

    <div class="container mt-4">

        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ $post->title }}" 
                    type="text" 
                    class="form-control" 
                    name="title" 
                    placeholder="Title" required>

                @if ($errors->has('title'))
                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="mb-3 w-full">
                <label for="body" class="form-label">Content:</label>
                <textarea
                    type="text" 
                    class="form-control w-full" 
                    name="content" 
                    placeholder="Body" required>{{ $post->content }}</textarea>

                @if ($errors->has('content'))
                    <span class="text-danger text-left">{{ $errors->first('content') }}</span>
                @endif
            </div>
            

            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

</div>
@endsection
