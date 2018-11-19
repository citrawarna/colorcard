@if($stockColorcard)

@extends('layouts.app')

@section('title')
Data Color Card {{ $divisi_name->division_name }}
@endsection

@section('content')

<div class="content col-md-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            Stock Color Card Tersedia
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockColorcard as $cc)
                    <tr>
                        <td>1</td>
                        <td>{{ $cc->cc_name }}</td>
                        <td>{{ $cc->stocks }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection

@else 

<script>
alert('Stock color card pada cabang tersebut tidak ada!');
location.href='../stock-division';
</script>

@endif