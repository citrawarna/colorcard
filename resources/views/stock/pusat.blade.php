@extends('layouts.app')

@section('title')
Stock Pusat
@endsection

@section('content')
<div class="content col-md-12">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
    <div class="card card-secondary card-outline">
        <div class="card-header">
            Data Stock Pusat
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>CC Name</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colorcards as $cc)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cc->cc_name }}</td>
                        <td>{{ dataRepair($cc->id, null, calculateStock($cc->id)) }}</td>
                       
                        <td><a href="#" data-toggle="modal" data-target="#exampleModal" data-cc="{{ $cc->cc_name }}" data-cc_id="{{ $cc->id }}" data-stock="{{ calculateStock($cc->id) }}">Sesuaikan</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('repair.stock-pusat') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_cc" name="colorcard_id" value="">
                    <input type="hidden" id="stock" name="stock" value="">
                    <p><b style="color:red">Masukan Stock Fisik Sekarang</b></p>

                    <input type="number" class="form-control" name="difference" required>
                    <br>
                    <p>Alasan</p>
                    <select name="reason" class="form-control" required>
                        <option value=""> - Pilih - </option>
                        <option value="penyesuaian">Penyesuaian</option>
                        <option value="hilang">Hilang</option>
                        <option value="rusak">Rusak</option>
                        <option value="terjual">Terjual</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('cc');
        var cc_id = button.data('cc_id');
        var stock = button.data('stock');
    

        var modal = $(this);
        modal.find('.modal-title').text('Sesuaikan Stock '+ recipient  + ' di Pusat');
        modal.find('.modal-body #id_cc').val(cc_id);
        modal.find('.modal-body #stock').val(stock);
    });
} );




</script>
    
@endpush