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
                            <a href="javascript:void(0);" data-href="{{ URL('route-modal?divisi='.$divisi->id) }}" class="btn btn-info btn-sm openPopup">Lihat Stock</a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
    $(document).ready(function(){
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');
            console.log(dataURL);
            $('.modal-body').load(dataURL,function(){
                $('#detailModal').modal({show:true});
            });
        }); 
    });
    </script>
@endpush