<?php $id = $_GET['id'];
$dom = new DOMDocument();
$dom->load('data.xml');
$k_items = $dom->getElementsByTagName('k_items')->item(0);
$k_item=$k_items->getElementsByTagName('k_item');
$c=0;
while (is_object($k_item->item($c++))){
    $itm=$k_item->item($c-1)->getElementsByTagName('id')->item(0);
    $item_id= $itm->nodeValue;
    if( $item_id== $id){
        $k_items->removeChild($k_item->item($c-1));
        break;
    }
}
$dom->formatOutput=true;
$dom->save('data.xml')or die('Error');
header('location: index.php?layout=list');
?>
