@extends('layouts.app')

@section('title')
    Tambah Divisi
@endsection

@section('content')
    <section class="content col-md-8">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <div class="card card-warning card-outline">
            <div class="card-header">
                <a href="{{ route('division.index') }}" class="btn btn-warning btn-sm"> <i class="fa fa-chevron-left"></i> Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('division.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc_name">Nama Divisi</label>
                        <input type="text" class="form-control" name="division_name" value="{{ old('division_name') }}">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary float-right" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </section>  
@endsection