<?php
include 'frontend/layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Add</title>
</head>
<body>
<div class="container">
    <form method="POST" id="product_form" autocomplete="off">
        <div class="d-flex justify-content-between col align-self-start align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3>Product Add</h3>
            <div>
                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                <a class="btn btn-secondary ms-4" href = "/">Cancel</a>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" id="error" style="display: none;"></div>
        <!--SKU input field-->
        <div class="row mt-5">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <label for="sku" class="form-label w-100 fs-4 bg-transparent">SKU</label>
            </div>
            <div class="col-lg-6 col-md-9 col-sm-8">
                <input required type="text" name="sku" class="form-control" id="sku" placeholder="SKU">
                <p>Product Sku should be required, unique, no #$%^& characters.</p>
            </div>
        </div>
        <!--Name input field-->
        <div class="row mt-3">
            <div class="col-lg-2 col-md-3  col-sm-4">
                <label for="name" class="form-label w-100 fs-4 bg-transparent">Name </label>
            </div>
            <div class="col-lg-6 col-md-9  col-sm-8">
                <input required placeholder="Name" type="text" name="name" class="form-control" id="name">
                <p>Product name is required, no #$%^& characters.</p>
            </div>
        </div>
        <!--Price input field-->
        <div class="row mt-3">
            <div class="col-lg-2 col-md-3  col-sm-4">
                <label for="price" class="form-label w-100 fs-4 bg-transparent">Price ($) </label>
            </div>
            <div class="col-lg-6 col-md-9  col-sm-8">
                <input required placeholder="Price" type="text" name="price" class="form-control" id="price">
                <p>Product price is required, only numbers.</p>
            </div>
        </div>
        <!--Type Selector-->
        <div class="row mt-3">
            <!--Selector Label-->
            <div class="col-lg-2 col-md-3  col-sm-4">
                <label for="productType" class="form-label w-100 fs-4 bg-transparent">Type Switcher </label>
            </div>
            <!--Selector Input-->
            <div class="col-lg-6 col-md-9  col-sm-8">
                <select title="Press to select type" id="productType" name="type" class="form-control">
                    <option disabled selected value="">Type Switcher</option>
                    <option id="DVD" value="dvd">DVD</option>
                    <option id="Book" value="book">Book</option>
                    <option id="Furniture" value="furniture">Furniture</option>
                </select>
            </div>
        </div>
        <!--DVD select option-->
        <div id="DVD" style="display: none" class="row mt-4 type">
            <div class="col-lg-2 col-md-3  col-sm-4">
                <label for="size" class="form-label w-100 fs-4 bg-transparent">Size (MB) </label>
            </div>
            <div class="col-lg-6 col-md-9  col-sm-8">
                <input required placeholder="Enter Dvd Size" type="text" name="size" class="form-control" id="size">
                <p>Product Size is required, only numbers.</p>
                <h6 class="mt-4">"Product Description"</h6>
            </div>
        </div>
        <!--Furniture select option-->
        <div id="Furniture" class="type" style="display: none">
            <!--Height-->
            <div class="row mt-3">
                <div class="col-lg-2 col-md-3  col-sm-4">
                    <label for="height" class="form-label w-100 fs-4 bg-transparent">Height (CM) </label>
                </div>
                <div class="col-lg-6 col-md-9  col-sm-8">
                    <input required placeholder="Enter Furniture Height" type="text" name="height" class="form-control" id="height">
                    <p>Product height is required, only numbers.</p>

                </div>
            </div>
            <!--Width-->
            <div class="row mt-3">
                <div class="col-lg-2 col-md-3  col-sm-4">
                    <label for="width" class="form-label w-100 fs-4 bg-transparent">Width (CM) </label>
                </div>
                <div class="col-lg-6 col-md-9  col-sm-8">
                    <input required placeholder="Enter Furniture Width" type="text" name="width" class="form-control" id="width">
                    <p>Product width is required, only numbers.</p>
                </div>
            </div>
            <!--Length-->
            <div class="row mt-3">
                <div class="col-lg-2 col-md-3  col-sm-4">
                    <label for="length" class="form-label w-100 fs-4 bg-transparent">Length (CM) </label>
                </div>
                <div class="col-lg-6 col-md-9  col-sm-8">
                    <input required placeholder="Enter Furniture Length" type="text" name="length" class="form-control" id="length">
                    <p>Product length is required, only numbers.</p>
                    <h6 class="mt-4">"Product Description"</h6>
                </div>
            </div>
        </div>
        <!--Book select option-->
        <div id="Book" class="row mt-4 type" style="display: none">
            <div class="col-lg-2 col-md-3  col-sm-4">
                <label for="weight" class="form-label w-100 fs-4 bg-transparent">Weight (KG) </label>
            </div>
            <div class="col-lg-6 col-md-9  col-sm-8">
                <input required placeholder="Enter Book Weight" type="text" name="weight" class="form-control" id="weight">
                <p>Product weight is required, only numbers.</p>
                <h6 class="mt-4">"Product Description"</h6>
            </div>
        </div>
    </form>
</div>
<?php include "frontend/layout/footer.php";?>
<script src="/frontend/assets/js/AddProduct.js"></script>
</body>
</html>