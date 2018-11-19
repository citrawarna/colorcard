@extends('layouts.app')

@section('title')
Stock Divisi    
@endsection

@section('content')
<div class="content col-md-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            Data Stock Pusat
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Divisi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($divisions as $divisi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $divisi->division_name }}</td>
                        <td>
                            <a href="{{ URL('stock-division/detail?divisi='.$divisi->id) }}" class="btn btn-info btn-sm openPopup">Lihat Stock</a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        
    </div>
</div>


@endsection

@push('scripts')
   
@endpush