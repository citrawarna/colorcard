@extends('layouts.app')

@section('title')
Data Color Cards
@endsection


@section('content')
<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <a href="{{ route('colorcard.create') }}" class="btn btn-success">Tambah Category</a>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>CC NAME</th>
                        <th>CATEGORY</th>
                        <th>TAG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colorcards as $cc)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cc->cc_name }}</td>
                        <td>{{ $cc->category->category_name }}</td>
                        <td>{{ $cc->tag }}</td>
                        <td>
                            <form action="{{ route('colorcard.destroy', ['id' => $cc->id ]) }}" method="post">
                                <a href="{{ route('colorcard.edit', ['id' => $cc->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
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