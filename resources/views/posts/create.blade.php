@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="class-header">Add Post</div>
        <div class="card-body">
        
            {{-- enctype = multipart is necessary to add images and multiple things from form --}}
             <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
                    {{-- title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" 
                name="title" 
                id="title"
                value="{{old('title')}}"
                class="form-control @error('title') is-invalid @enderror "
                >
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
                {{-- excerpt --}}
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" 
                id="excerpt" 
                class="form-control @error('excerpt') is-invalid @enderror"
                rows="4">{{old('excerpt')}}</textarea>
                
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" 
                id="content" 
                class="form-control @error('content') is-invalid @enderror"
                rows="4">{{old('content')}}</textarea>
                
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="date" 
                name="published_at" 
                id="published_at"
                value="{{old('published_at')}}"
                class="form-control "
                >
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" 
                name="image" 
                id="image"
                value="{{old('image')}}"
                class="form-control @error('image') is-invalid @enderror "
                >
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add Post</button>
            </div>
        </form>
        </div>
    </div>
@endsection