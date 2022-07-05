<?php $title = "Product Add Page"; require __DIR__ . "/layouts/head.php"; ?>
    <section class="py-5">
        <div class="container">
            <form method="POST" id="product_form">
                <div class="d-flex justify-content-between border-bottom py-3">
                    <h1 class="font-weight-bold text-capitalize">Product Add</h1>
                    <div class="d-flex align-items-center">
                        <button id="product_save" class="btn btn-primary">Save</button>
                        <a href="./index.php" class="btn btn-danger ml-3">Cancel</a>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" id="sku" name="sku">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
                    <div class="col-sm-10 col-md-4">
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productType" class="col-sm-2 col-form-label text-capitalize">Type Switcher</label>
                    <div class="col-sm-10 col-md-4">
                        <select class="form-control" id="productType" name="productType" required>
                            <option selected disabled>Please choose a type</option>
                            <option value="1">DVD</option>
                            <option value="2">Furniture</option>
                            <option value="3">Book</option>
                        </select>
                    </div>
                </div>

                <div id="settings">
                    <div class="card col-sm-10 col-md-6" id="dvd" style="display: none;">
                        <div class="form-group row mt-3">
                            <label for="size" class="col-sm-4 col-form-label">Size (MB)</label>
                            <div class="col">
                                <input type="text" class="form-control" id="size" name="size">
                            </div>
                            <p class="text-muted small d-block w-100 mx-3 my-auto">Please, provide size</p>
                        </div>
                    </div>

                    <div class="card col-sm-10 col-md-6" id="furniture" style="display: none;"> 
                        <div class="form-group mt-3">
                            <div class="d-flex mt-1">
                                <label for="height" class="col-sm-4 col-form-label">Height (CM)</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="height" name="height">
                                </div>
                            </div>
                            <div class="d-flex mt-1">
                                <label for="width" class="col-sm-4 col-form-label">Width (CM)</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="width" name="width">
                                </div>
                            </div>
                            <div class="d-flex mt-1">
                                <label for="length" class="col-sm-4 col-form-label">Length (CM)</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="length" name="length">
                                </div>
                            </div>
                            <p class="text-muted small mt-3 mx-3 mb-0">Please provide dimensions in HxWxL format</p>
                        </div>
                    </div>

                    <div class="card col-sm-10 col-md-6" id="book" style="display: none;">
                        <div class="form-group row mt-3">
                            <label for="weigth" class="col-sm-4 col-form-label">Weight (KG)</label>
                            <div class="col">
                                <input type="text" class="form-control" id="weight" name="weigth">
                            </div>
                            <p class="text-muted small d-block w-100 mx-3 my-auto">Please, provide weight</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php require __DIR__ . "/layouts/footer.php"; ?>