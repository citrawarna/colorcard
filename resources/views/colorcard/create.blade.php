@extends('layouts.app')

@section('title')
Tambah Color Cards
@endsection


@section('content')

<section class="content col-md-8">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <a href="{{ route('colorcard.index') }}" class="btn btn-warning btn-sm"> <i class="fa fa-chevron-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('colorcard.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="cc_name">Name</label>
                    <input type="text" class="form-control" name="cc_name" value="{{ old('cc_name') }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">- Select -</option>
                        @foreach($categories as $option)
                            <option value="{{ $option->id }}" {{ (old('category_id') == $option->id ? 'selected' : '') }} >{{ $option->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control" name="tag" value="{{ old('tag') }}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary float-right" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</section>  

@endsection