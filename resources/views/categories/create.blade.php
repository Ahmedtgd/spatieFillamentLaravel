
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create category</h1>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
            <label for="category_name">category_name</label>
            <input type="text" name="category_name" class="form-control" required>
        </div>
     <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection