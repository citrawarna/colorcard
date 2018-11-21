@extends('layouts.app')

@section('title')
    Kartu Stock
@endsection

@section('content')
    <div class="content col-md-6">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <div class="card card-secondary card-outline">
            <div class="card-header">
                Cek Data Barang
            </div>
            <div class="card-body">
                <form action="{{ route('kartu-stock.search') }}" method="get">
         
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="dari" class="form-control" placeholder="DARI" id="datepicker" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="sampai" class="form-control" placeholder="SAMPAI" id="datepickers" required>
                        </div>
                    </div>
                    <br>
                    <select name="division_id" class="form-control">
                        <option value=""> - PILIH DIVISI - </option>
                        <option value=""> Pusat </option>
                        @foreach($divisi as $option)
                            <option value="{{ $option->id }}">{{ $option->division_name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="text" class="form-control" name="colorcard" required placeholder="NAMA BARANG">
                    <br>
                    <input type="submit" class="btn btn-secondary float-right" value="Search">
                </form>
            </div>
        </div>
    </div>
@endsection