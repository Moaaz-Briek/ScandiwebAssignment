<?php
include 'frontend/layout/header.php';
;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProductList</title>
</head>
<body>
<div class="container">
    <div class="row">
        <main class="col align-self-start">
            <div class="d-flex justify-content-between col align-self-start align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h3>Product List</h3>
                <div>
                    <a class="btn btn-primary" href="/addProduct">ADD</a>
                    <a id="delete-product-btn" class="btn btn-danger ms-4">MASS DELETE</a>
                </div>
            </div>
            <div class="product row mb-5">
            </div>
<?php include "frontend/layout/footer.php" ?>
</body>
<script src="/frontend/assets/js/ProductList.js"></script>
</html>