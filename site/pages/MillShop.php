<!DOCTYPE html>
<!--
    MILL SHOP COMPANY, 2016
    CREATED BY NIKITA GRECHUKHIN, NIKOLAY KOMAROV AND VAGIK SIMONYAN
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mill Shop</title>
    <link rel="icon" href="../resources/images/icon.ico">
    <link rel="stylesheet" href="../css/MillShop.css">
</head>
<body>

<div id="wrapping-block">
<div id="menu-block">
    <?php
    include('menu.html');
    ?>
</div>

<div id="main-block">
    <div class="margin-wrapper">
    <h1>Welcome to Mill Shop!</h1>
    <form>
        <button id="clickme">Click Me!</button>
    </form>

    <?php
    include_once("../database/DBConnection.php");
    $db = new DBConnection();
    $db->openConnection();
    //$criteria[0] = "color = 205";
    $db->selectItemsByColor("205");
    $db->selectItemsByColor(0);
    $db->showResult();
    $db->closeConnection();
    ?>

    </div>
</div>
</div>

<div id="footer-block">
    <?php
    include('footer.html');
    ?>
</div>


</body>
</html>