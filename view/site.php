<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://rentacar-ruse.com/wp-content/uploads/2018/04/cropped-favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>TestTask</title>
</head>
<body>
    <div class="fluid-container">
        <div class="row">
            <div class="header p-3 d-flex justify-content-between">
                <div>
                    <img class="logo ms-5" src="https://rentacar-ruse.com/wp-content/uploads/2018/04/cropped-favicon.png" alt="logo">
                    <span class="fw-bold ms-3">TEST TASK</span>
                </div>
                <select class="form-select w-25 me-3" name="sortBox" id="sortBox">
                    <option value="CHEAP">Найдешевші</option>
                    <option value="NEW">По даті</option>
                    <option value="ALPHABET">По алфавіту</option>
                </select>
            </div>
            <div class="sidebar col-3">
                <ul class="category-box">
                    <?php foreach ($categories as $category) : ?>
                        <li id="category-<?= $category['id'] ?>" class="category"><?= $category['name']; ?> <span class="counter-products float-right"><?= $category['count_products'] ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="products col-9">
                <div id="product-box" class="row pb-3">
                        <?php foreach ($products as $product) : ?>
                            <div class=" col-lg-4 col-md-6 col-sm-6 col-12">
                                <section class="p-3 product mt-3">
                                    <div id="pb-<?= $product['id'] ?>" class="product-body">
                                        <img class="photo" src="<?= $product['photo'] ?>" alt="photo">
                                        <h5 class="mt-1"><?= $product['name'] ?></h5>
                                        <div>
                                            <span class="text-danger fw-bold">Ціна:</span>
                                            <span class="fw-bold"><?= $product['price'] ?>$</span>
                                        </div>
                                        <div>
                                            <span class="text-primary fw-bold">Дата:</span>
                                            <span class="fw-bold"><?= $product['date'] ?></span>
                                        </div>
                                    </div>
                                    <button onclick="openInModal(this)" data-bs-toggle="modal" data-bs-target="#productModal" id="btn-<?= $product['id'] ?>" class="btn btn-danger w-100">Купити</button>
                                </section>
                            </div>
                         <?php endforeach; ?>
                </div>
            </div>
            <div class="footer p-3">
                <span class="fw-bold ms-3">@2023 - Shmahai Volodymyr</span>
            </div>
        </div>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-auto" class="container">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Купити</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
