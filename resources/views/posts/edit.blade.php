@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="class-header">Edit Post</div>
        <div class="card-body">
        
            {{-- enctype = multipart is necessary to add images and multiple things from form --}}
             <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
                    {{-- title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" 
                name="title" 
                id="title"
                value="{{old('title', $post->title)}}"
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
                rows="4">{{old('excerpt',$post->excerpt)}}</textarea>
                
                @error('excerpt')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
                {{-- content --}}
            <div class="form-group">
                <label for="content">content</label>
                <input type="hidden" id="content" name="content"
            value="{{old('content', $post->content)}}">
                <trix-editor input="content"></trix-editor>
            @error('content')
            <p class="text-danger">{{$message}}</p>    
            @enderror
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" 
                name="published_at" 
                id="published_at"
                value="{{old('published_at',$post->published_at)}}"
                class="form-control "
                >
            </div>
            <div class="form-group">
            <img src="{{asset('storage/'.$post->image)}}" alt="" width="100%">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" 
                name="image" 
                id="image"
                value="{{old('image',$post->image)}}"
                value="{{old('image')}}"
                class="form-control  " {{--@error('image') is-invalid @enderror--}}
                >
                {{--@error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror--}}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add Post</button>
            </div>
        </form>
        </div>
    </div>
@endsection

@section('page-level-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#published_at", {
            enableTime: true
        });
    </script>
@endsection

@section('page-level-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection