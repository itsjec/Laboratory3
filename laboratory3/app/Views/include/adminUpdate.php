

<?= $this->include('include/adminTop') ?>
<div class="row">
    <div class="col-md-3">
        <!-- Include your adminSidebar content here -->
        <?= $this->include('include/adminSidebar') ?>
    </div>
<div class="col-md-9 w-100">
    <h2 style="margin-top: 50px; text-align: center">Update Product</h2>
        <form action="<?= base_url('updateProduct') ?>" method="post" enctype="multipart/form-data" style="max-width: 80%; margin: 0 auto; text-align: center; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #191c24; font-family: Helvetica, Arial, sans-serif;">
            <input type="hidden" name="id" value="<?= $selectedProduct['id'] ?? '' ?>" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            
            <label style="display: block; text-align: left; margin-bottom: 5px;">Product Name</label>
            <input type="text" name="name" placeholder="Product Name" value="<?= $selectedProduct['name'] ?? '' ?>" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            
            <label style="display: block; text-align: left; margin-bottom: 5px;">Description</label>
            <textarea name="description" placeholder="Product Description" style="width: 100%; padding: 8px; margin-bottom: 10px;"><?= $selectedProduct['description'] ?? '' ?></textarea>

            <label style="display: block; text-align: left; margin-bottom: 5px;">Product Image</label>
            <input type="file" name="image" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            
            <label style="display: block; text-align: left; margin-bottom: 5px;">Price</label>
            <input type="text" name="price" placeholder="Product Price" value="<?= $selectedProduct['price'] ?? '' ?>" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            
            <label style="display: block; text-align: left; margin-bottom: 5px;">Category</label>
            <input type="text" name="category" placeholder="Product Category" value="<?= $selectedProduct['category'] ?? '' ?>" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            
            <label style="display: block; text-align: left; margin-bottom: 5px;">Quantity</label>
            <input type="text" name="quantity" placeholder="Product Quantity" value="<?= $selectedProduct['quantity'] ?? '' ?>" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            
            <input type="submit" value="Update Product" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px;">
        </form>
    </div>
</div>
