{{-- @extends('layouts.app')

@section('content')
    <div class="card">
        <div class="class-header">Edit Category</div>
        <div class="card-body">
        <form action="{{route('categories.store')}}" method="POST">
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
                <button type="submit" class="btn btn-success">Add category</button>
            </div>
        </form>
        </div>
    </div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Category
        </div>

        <div class="card-body">
        <form action="{{route('categories.update',$category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
             <label for="name">Name</label>
            <input type="text" value="{{old('name',$category->name)}}"
            class="form-control @error('name') is-invalid @enderror"
            name="name" id="name"
            >
            @error('name')
            <p class="text-danger">{{$message}}</p>    
            @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Edit Category</button>
            </div>
        </form>
        </div>
    </div>
@endsection