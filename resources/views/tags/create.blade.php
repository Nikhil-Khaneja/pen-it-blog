@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="class-header">Add Tag</div>
        <div class="card-body">
        <form action="{{route('tags.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" 
                name="name" 
                id="name"
                value="{{old('name')}}"
                class="form-control @error('name') is-invalid @enderror "
                >
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add Tag</button>
            </div>
        </form>
        </div>
    </div>
@endsection