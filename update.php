<?php
$id=$_GET['id'];
echo $id;
$dom = new DOMDocument();
$dom->load('data.xml');
$k_items = $dom->getElementsByTagName('k_items')->item(0);
$k_item=$k_items->getElementsByTagName('k_item');

if(isset($_POST['submit'])){
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $new_item = $dom->createElement('k_item');

    $node_id = $dom->createElement('id',$id);
    $new_item->appendChild($node_id);

    $node_name = $dom->createElement('name',$item_name);
    $new_item->appendChild($node_name);

    $node_price = $dom->createElement('price',$price);
    $new_item->appendChild($node_price);

    $node_description = $dom->createElement('description',$description);
    $new_item->appendChild($node_description);
    $i=0;
    while (is_object($k_item->item($i++))){
        $prd=$k_item->item($i-1)->getElementsByTagName('id')->item(0);
        $prd_id= $prd->nodeValue;
        if( $prd_id== $id){
            $k_items->replaceChild($new_item,$k_item->item($i-1));
            break;
        }
    }

    $dom->formatOutput = true;
    $dom->save('data.xml')or die('Error');
    header('location: index.php?layout=list');
}
?>
<style>
    .container {
        width: 100%;
    }
    .main {
        margin-top: 20px;
    }
    h3 {
        font-size: 30px;
        text-align: center;
    }
    .main {
        display: flex;
        justify-content: center;
    }
    label {
        font-size: 1.5em;
    }
    .group {
        width: 400px;
        border: 1px solid darksalmon;
        margin-bottom: 20px;
        padding: 10px;
    }
    input {
        float: right;
        border: 1px solid darksalmon;
        padding: 5px;
    }

    button {
        font-size: 1.5em;
        border: 1px solid darksalmon;
        padding: 10px;
        background: bisque;
        color: black;
        margin-left: 140px;
    }
</style>

<div class="container">
    <div class="header">
        <h3>Изменить товар</h3>
    </div>
    <div class="main">
        <form method="POST" enctype="multipart/form-data">
            <div class="group">
                <label for="">Имя товара</label>
                <input type="text" name="item_name" required  ">
            </div>
            <div class="group">
                <label for="">Цена товара</label>
                <input type="number" name="price" required  ">
            </div>
            <div class="group">
                <label for="">Описание товара</label>
                <input type="text" name="description" required  ">
            </div>
            <button name="submit" type="submit">Обновить</button>
        </form>
    </div>
</div>