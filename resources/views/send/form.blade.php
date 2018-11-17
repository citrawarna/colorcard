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
    <div class="card card-secondary card-outline">
        <form action="{{ route('send.store') }}" method="post">
            @csrf
            <div class="card-header">
                <strong>Color Card Kirim Ke : </strong> 
                <select name="division_id" required>
                    <option value="">- Pilih Divisi -</option>
                    @foreach($divisions as $to)
                        <option value="{{ $to->id }}">{{ $to->division_name }}</option>
                    @endforeach
                </select>
                &nbsp; &nbsp;
                <strong>Tanggal : </strong>
                <input type="text" name="date" required id="datepicker">
            </div>
            <div class="card-body">
                <table class="table" id="sendTable">
                    <thead>
                        <tr>
                            <th>Color Card</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="colorcard_id[]" list="cc_list" required>
                                <datalist id="cc_list">
                                    @foreach($colorcards as $cc)
                                    <option>{{ $cc->cc_name }}</option>
                                    @endforeach
                                </datalist>
                            </td>
                            <td><input type="number" class="form-control" name="amount[]" required></td>
                            <td><input type="text" class="form-control" name="description[]"></td>
                        </tr>
                    </tbody>
                </table>
                <strong><a href="#" class="btn-plus"> <i class="fa fa-plus"></i> Tambah Form</a></strong><br><br>
                <button type="submit" class="btn btn-secondary btn-lg float-right">Kirim Barang</button>
            </div>
        </form>
        
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
        html += "<td> <input type='text' class='form-control' name='colorcard_id[]' list='cc_list' required>";
        html += "<datalist id='cc_list'>";
        html += "<?php foreach($colorcards as $cc){ ?>";
        html += "<option>{{ $cc->cc_name }}</option>";
        html += "<?php } ?>";
        html += "</datalist></td>";
        html += "<th><input type='number' name='amount[]' class='form-control' required></th>";
        html += "<th><input type='text'  name='description[]' class='form-control'></th>";
        html += '<td><button type="button" data-row="row'+row+'" class="btn btn-sm btn-danger fa fa-minus btn-minus"></button></td>';
        html += '</tr>';
        $('#sendTable').append(html);
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