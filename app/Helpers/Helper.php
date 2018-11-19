<?php
use Illuminate\Support\Facades\DB;
use App\ColorCard;

function getCcIdFromDataList($cc_name){
    $q= ColorCard::where('cc_name', $cc_name)->first();
    return $q->id;
    
}

function stockReceive($cc_id){
    $receives = DB::table('receives')->where('colorcard_id', $cc_id)->where('deleted_at', null)->sum('qty');
    return $receives;
}

function stockSend($cc_id){
    $sends = DB::table('sends')->where('colorcard_id', $cc_id)->where('deleted_at', null)->sum('amount');
    return $sends;
}

function calculateStock($cc_id){
    return stockReceive($cc_id) - stockSend($cc_id);
}

function showCcDivisi($divisi_id){
    return DB::select("SELECT cc_name, division_id, colorcard_id, sum(amount) as stocks FROM sends 
        inner join color_cards on color_cards.id = sends.colorcard_id
        where division_id = $divisi_id 
        OR sends.deleted_at != NULL 
        group by sends.colorcard_id
        order by cc_name asc ");
}

function checkStockCC($cc_id, $amount){
    $stock_cc = calculateStock($cc_id);
    if($stock_cc > $amount){
        return $amount;
    } else {
        return false;
    }
}

?>