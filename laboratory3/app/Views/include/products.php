<?= $this->include('include/top') ?>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="#" class="view-product-btn" data-toggle="modal" data-target="#productModal<?= $product['id'] ?>">
                        <img src="<?= base_url('/uploads/' . $product['image']) ?>" alt="<?= $product['name'] ?>">
                    </a>
                </div>
                <h3><?= $product['name'] ?></h3>
                <p class="product-price"><span>Per Kg</span> <?= $product['price'] ?>$ </p>
                <a href="" class="cart-btn view-product-btn" data-toggle="modal" data-target="#productModal<?= $product['id'] ?>">
                    <i class="fas fa-eye"></i> View Product
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Modal structure for each product -->
<?php foreach ($products as $product): ?>
	<div class="modal fade" id="productModal<?= $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="productModalLabel<?= $product['id'] ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel<?= $product['id'] ?>">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3><?= $product['name'] ?></h3>
                    <img src="<?= base_url('/uploads/' . $product['image']) ?>" alt="<?= $product['name'] ?>" class="img-fluid">
                    <p><strong>Price:</strong> <?= $product['price'] ?>$ per Kg</p>
                    <p><strong>Description:</strong> <?= $product['description'] ?></p>
                    <p><strong>Category:</strong> <?= $product['category'] ?></p>
                    <!-- Add more details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    $(document).ready(function() {
        // Add a click event listener to elements with class 'view-product-btn'
        $('.view-product-btn').click(function() {
            // Get the 'data-target' attribute to identify which modal to open
            var targetModal = $(this).data('target');
            // Open the identified modal
            $(targetModal).modal('show');
        });
    });
</script>
