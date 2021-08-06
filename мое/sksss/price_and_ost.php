<?php
/** curs **/

function getCurs(){

  $opts = array(
      'http'=>array(
        'method'=>"GET",
      )
    );   
    $context = stream_context_create($opts);
    $fp = file_get_contents('https://www.nbrb.by/api/exrates/rates/298', false, $context);

$decoded = json_decode($fp);
return $decoded->Cur_OfficialRate;
}
global $cursRUB;
$cursRUB=getCurs();
/** end curs **/

/** connection API **/
$login = "U0tTXzIwMTg=";
$password = "RTQ5MTA2M0w=";
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header' => "Authorization: Basic U0tTXzIwMTg6RTQ5MTA2M0w="
  )
);  
$context = stream_context_create($opts);

$priceAPI;
$ostatokAPI;
$decodedPriceAPI;
$decodedOstatokAPI;
$priceRUB;
$priceBLR;
$ostatok;


$args = array( 'post_type' => 'product','orderby'=> 'post_date','numberposts'=> 100,'offset'=>50);
$products = get_posts( $args );
foreach( $products as $product ) : 

$priceAPI = file_get_contents('https://cdis.russvet.ru/rs/price/'.$product->ID, false, $context);
$ostatokAPI=file_get_contents('https://cdis.russvet.ru/rs/residue/96/'.$product->ID, false, $context);

decode($priceAPI,$ostatokAPI);
price_and_ost();
/*updateDB($product->ID);*/

endforeach;

function decode($priceAPI,$ostatokAPI)
{
global $decodedPriceAPI,$decodedOstatokAPI;
  $decodedPriceAPI = json_decode($priceAPI);
  $decodedOstatokAPI = json_decode($ostatokAPI);
}

function price_and_ost()
{
  global $decodedPriceAPI,$decodedOstatokAPI,$priceRUB,$priceBLR,$ostatok,$cursRUB;
  $priceRUB=$decodedPriceAPI->Price->Personal;
  $priceBLR=($priceRUB*$cursRUB)/100;
  $ostatok=$decodedOstatokAPI->Residue;
}
function updateDB($id)
{
global $priceBLR,$ostatok;
  wc_delete_product_transients($id);
  update_post_meta( $id, '_regular_price', $priceBLR );
  update_post_meta( $id, '_price', $priceBLR );
  update_post_meta( $id, '_stock', $ostatok );
}
?>
