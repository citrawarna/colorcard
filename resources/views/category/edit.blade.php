@extends('layouts.app')

@section('title')
Edit Category
@endsection

@section('content')


<section class="content col-md-6">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
    <div class="card card-warning card-outline">
        <div class="card-header">
            <a href="{{ route('category.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-chevron-left"></i> &nbsp; Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', ['id' => $category->id ]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category-name">Category Name</label>
                    <input type="text" class="form-control" name="category_name" required value="{{ $category->category_name }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary float-right" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</section> 

 

@endsection