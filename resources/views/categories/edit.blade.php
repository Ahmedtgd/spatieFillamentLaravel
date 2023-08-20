@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      
        
        <div class="form-group">
            <label for="category_name">category_name</label>
            <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" required>
        </div>


      
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection