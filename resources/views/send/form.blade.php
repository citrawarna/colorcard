@extends('layouts.app')

@section('title')
Kirim Color Card
@endsection

@section('content')

<section class="content col-md-12">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
    <div class="card card-warning card-outline">
        <div class="card-header">
            <strong>Color Card Kirim Ke : </strong> 
            <select name="divisi_id">
                <option value="">- Select Divisi -</option>
                <option value="cw1">Citra Warna 01</option>
            </select>
        </div>
    </div>
    
</section>
    
@endsection