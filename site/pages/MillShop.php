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

            <div id="banners-block">
                <div id="main-banner"><img src="../resources/images/banners/banner_40001.jpg"></div>
                <div id="shop-banners-block">
                    <div id="banner-shop-men"><a href="Men.php"><img src="../resources/images/banners/banner_40002.jpg"></a></div>
                    <div id="banner-shop-women"><a href="Women.php"><img src="../resources/images/banners/banner_40003.jpg"></a></div>
                </div>
            </div>

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