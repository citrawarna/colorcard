@extends('layouts.app')

@section('title')
    Kartu Stock {{ $cc }} {{ $lokasi }}
@endsection

@section('content')
<div class="content">
    <div class="card card-secondary card-outline">
        
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                    
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                  
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $totalIn = (int) '';
                        $totalOut = (int) '';    
                    ?>
                    @if(isset($receive))
                        @foreach($receive as $terima)
                        <?php $totalIn += (int) $terima->qty ?>
                        <tr>
                            <td>{{ $terima->date }}</td>
                            <td> {{ $terima->qty }} </td>
                            <td></td>
                    
                            <td>Masuk</td>
                        </tr>
                        @endforeach
                    

                        @foreach($send as $kirim)
                        <?php $totalOut += (int) $kirim->amount ?>
                        <tr>
                            <td>{{ $kirim->date }}</td>
                            <td></td>
                            <td>{{$kirim->amount}}</td>
                    
                            <td>Untuk {{ $kirim->division_name }} </td>
                        </tr>
                        @endforeach
                        @foreach($repair as $perbaiki)
                        <?php 
                            if($perbaiki->type == 'increase'){
                                $masuk = $perbaiki->difference;
                                $totalIn += (int) $masuk;
                                $keluar = '';
                                if($perbaiki->division_id != null){
                                    $reason = $perbaiki->reason . " CW ". $perbaiki->division_id;
                                } else {
                                    $reason = $perbaiki->reason . " Pusat";
                                }
                            } else {
                                $masuk = '';
                                $keluar = $perbaiki->difference;
                                $totalOut += (int) $perbaiki->difference; 
                            }
                            

                        ?>
                        <tr>
                            <td>{{ $perbaiki->date }}</td>
                            <td>{{ $masuk }}</td>
                            <td>{{ $keluar }}</td>
                        
                            <td>{{ $reason }}</td>

                        </tr>
                        @endforeach
                    @else 

                        @foreach($send as $kirim)
                        <?php $totalIn += (int) $kirim->amount ?>
                            <tr>
                                <td>{{ $kirim->date }}</td>
                                <td>{{$kirim->amount}}</td>
                                <td></td>
                                
                        
                                <td>Dari Pusat </td>
                            </tr>
                        @endforeach
                        
                        @foreach($repair as $perbaiki)
                        <?php 
                            if($perbaiki->type == 'increase'){
                                $masuk = $perbaiki->difference;
                                $totalIn += (int) $masuk;
                                $keluar = '';
                                if($perbaiki->division_id != null){
                                    $reason = $perbaiki->reason . " CW ". $perbaiki->division_id;
                                } else {
                                    $reason = $perbaiki->reason . " Pusat";
                                }
                            } else {
                                $masuk = '';
                                $keluar = $perbaiki->difference;
                                $totalOut += (int) $perbaiki->difference; 
                                $reason = "Repaired!";
                            }
                            

                        ?>
                        <tr>
                            <td>{{ $perbaiki->date }}</td>
                            <td>{{ $masuk }}</td>
                            <td>{{ $keluar }}</td>
                        
                            <td>{{ $reason }}</td>

                        </tr>
                        @endforeach
                    @endif


                    <tfoot>
                        <tr>
                            <td><b>TOTAL</b></td>
                            <td><b>{{$totalIn}}</b></td>
                            <td><b>{{$totalOut}}</b></td>
                            <td>STOCK SEKARANG : <b>{{ abs($totalIn - $totalOut) }} </b></td>
                        </tr>
                    </tfoot>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection

@push('scripts')

<script>
$('#myTable').dataTable( {
    "paging": false
} );
</script>
@endpush