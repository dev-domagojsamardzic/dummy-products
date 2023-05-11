<!DOCTYPE html>
<?php
    require_once __DIR__ . '/vendor/autoload.php';
    use App\Controllers\ProductController;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Import Bootstrap 5 CSS -->
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <!-- Import main.css -->
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>
    <?php

        $productController = new ProductController();
        $productCollection = $productController->index();
    ?>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
                foreach($productCollection->items as $product) {
                    $product->card->render();
                }
            ?>
        </div>
        <div class="d-block">
            <?php
                $productCollection->pagination->links->render();
            ?>
        </div>
    </div>
</body>
</html>