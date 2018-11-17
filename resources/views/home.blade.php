@extends('layouts.app')

@section('title')
Welcome
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Title Section</h3>
        </div>
        <div class="card-body">
            Content Section
        </div>
    </div>
</section>                  
          
@endsection
