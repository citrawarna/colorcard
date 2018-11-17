@extends('layouts.app')

@section('title')
Data Category
@endsection

@section('content')


<section class="content">
        
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <a href="{{ route('category.create') }}" class="btn btn-success">Tambah Category</a>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>CATEGORY NAME</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <form action="{{ route('category.destroy', ['id' => $category->id ]) }}" method="post">
                                <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Delet Data?')">
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