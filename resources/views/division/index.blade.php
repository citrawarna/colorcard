@extends('layouts.app')

@section('title')
Data Division
@endsection

@section('content')
<section class="content">
    <div class="card card-warning card-outline">
        <div class="card-header">
            <a href="{{ route('division.create') }}" class="btn btn-success">Tambah Divisi</a>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA DIVISI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($divisions as $divisi)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $divisi->division_name }}</td>
                        <td>
                            <form action="{{ route('division.destroy', ['id' => $divisi->id ]) }}" method="post">
                            
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Delete Data?')">
                                    Hapus
                                </button>
                                @csrf 
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</section> 
@endsection

@push('scripts')
 <!-- DataTables -->

 <script>
        
    $.extend( true, $.fn.dataTable.defaults, {
		"pageLength": 50
	});
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

       
</script>
@endpush