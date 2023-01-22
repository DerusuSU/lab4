<?php
$dom = new DOMDocument();
$dom->load('data.xml');
$k_items = $dom->getElementsByTagName('k_items')->item(0);
?>
<style>
    .container {
        width: 100%;
    }
    .main {
        margin-top: 20px;
    }
    table {
        border-collapse: collapse;
        margin: auto;
    }
    th,
    td {
        border: 2px solid darksalmon;
        height: 30px;
        width: 10%;
        font-size: 1.5em;
        padding: 5px;
    }
    tr:nth-child(2n) {
        background: #fafff1;
    }
    td:nth-child(1), td:nth-child(6), td:nth-child(7) {
        text-align: center;
    }
    thead {
        background: bisque;
    }
    h3 {
        font-size: 30px;
        text-align: center;
    }
    .create-btn{
        text-decoration: none;
        font-size: 1.5em;
        border: 1px solid darksalmon;
        padding: 10px;
        background: bisque;
        color: black;
    }
    a:hover {
        background: #fafff1;
    }

</style>
<script>
    function Del(name){
        return confirm("Вы уверены что хотите удалить товар "+name+"?");
    }
</script>
<body>
    <div class="container">
        <div class="header">
            <h3>Таблица товара</h3>
        </div>
        <div class="create-item">
            <a class="create-btn" href="index.php?layout=create">Добавить новый товар</a>
        </div>
        <div class="main">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Описание</th>
                        <th>Изменить</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $c = 0;
                    $k_item=$k_items->getElementsByTagName('k_item');
                    while (is_object($k_item->item($c++))) {
                        ?>
                    <tr>
                        <td><?php echo $c?></td>
                        <td><?php echo $k_item->item($c-1)->getElementsByTagName('id')->item(0)->nodeValue?></td>
                        <td><?php echo $k_item->item($c-1)->getElementsByTagName('name')->item(0)->nodeValue?></td>
                        <td><?php echo $k_item->item($c-1)->getElementsByTagName('price')->item(0)->nodeValue?></td>
                        <td><?php echo $k_item->item($c-1)->getElementsByTagName('description')->item(0)->nodeValue?></td>
                        <td><a href="index.php?layout=update&id=<?php echo  $k_item->item($c-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Изменить </a></td>
                        <td><a onclick="return Del('<?php echo $k_item->item($c-1)->getElementsByTagName('id')->item(0)->nodeValue;?>')"  href= "index.php?layout=delete&id=<?php echo  $k_item->item($c-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Удалить</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
