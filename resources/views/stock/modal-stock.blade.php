
@if($stockColorcard)
<strong>Data Stock Color Card {{ $divisi_name->division_name }}</strong>
<br><br>
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
@else 
<strong style="color:red">Tidak Ada Stock Color Card</strong>
@endif

