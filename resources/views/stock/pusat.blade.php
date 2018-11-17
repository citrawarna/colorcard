@extends('layouts.app')

@section('title')
Stock Pusat
@endsection

@section('content')
<div class="content col-md-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            Data Stock Pusat
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>CC Name</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colorcards as $cc)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cc->cc_name }}</td>
                        <td>{{ calculateStock($cc->id) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection

@push('scripts')

<script>
$.extend( true, $.fn.dataTable.defaults, {
    "pageLength": 25
});
$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
    
@endpush