@extends('layouts.app')

@section('title')
Form Terima Barang 
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
            Masukan Color Card yang Diterima.
        </div>
        <div class="card-body">
            <form action="{{ route('receive.store') }}" method="post" autocomplete="off">
                @csrf 
                <table class="table" id="receiveTable">
                    <thead>
                        <tr>
                            <th>CC Name</th>
                            <th>Qty</th>
                            <th>Keterangan</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="cc_name[]" list="cc_list" required>
                                <datalist id="cc_list">
                                    @foreach($colorcards as $cc)
                                    <option>{{ $cc->cc_name }}</option>
                                    @endforeach
                                </datalist>
                            </td>
                            <td><input type="number" name="qty[]" class="form-control" required></td>
                            <td><input type="text" name="descriptions[]" class="form-control" ></td>
                        </tr>
                       
                    </tbody>
                </table>
                <strong><a href="#" class="btn-plus"> <i class="fa fa-plus"></i> Tambah Form</a></strong><br><br>
                <button type="submit" class="btn btn-primary btn-lg float-right">Terima Barang</button>
            </form>
            <br>
            
        </div>
    </div>
</section>
    
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    var row = 0;

    $('.btn-plus').click(function(e){
        e.preventDefault();
        row++;
        var html = '<tr id="row'+row+'">';
        html += "<td> <input type='text' class='form-control' name='cc_name[]' list='cc_list' required>";
        html += "<datalist id='cc_list'>";
        html += "<?php foreach($colorcards as $cc){ ?>";
        html += "<option>{{ $cc->cc_name }}</option>";
        html += "<?php } ?>";
        html += "</datalist></td>";
        html += "<th><input type='number' name='qty[]' class='form-control' required></th>";
        html += "<th><input type='text'  name='descriptions[]' class='form-control' required></th>";
        html += '<td><button type="button" data-row="row'+row+'" class="btn btn-sm btn-danger fa fa-minus btn-minus"></button></td>';
        html += '</tr>';
        $('#receiveTable').append(html);
    });

    $(document).on('click', '.btn-minus', function(e){
        e.preventDefault();
        var data_row = $(this).attr('data-row');

        $('#'+data_row).remove();

        row--;
    });
});
</script>
        
@endpush