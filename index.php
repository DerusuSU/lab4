<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAB4</title>
</head>
<body>
<?php
if(isset($_GET['layout'])){
    switch ($_GET['layout']){
        case 'list':
            require_once 'list.php';
            break;
        case 'create':
            require_once 'create.php';
            break;
        case 'update':
            require_once 'update.php';
            break;
        case 'delete':
            require_once 'delete.php';
            break;
    }
}else{
    require_once 'list.php';
}
?>
</body>
</html>