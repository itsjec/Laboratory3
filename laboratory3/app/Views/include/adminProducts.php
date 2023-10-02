<h2 style="margin-top: 20px;">Products</h2>
<table class="table table-striped table-bordered" style="width: 100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['description'] ?></td>
                <td>
                    <?php if (!empty($product['image'])): ?>
                        <img src="<?= base_url('uploads/' . $product['image']) ?>" alt="<?= $product['name'] ?>" width="100">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['category'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td>
                    <a href="/delete/<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                    <a href="/adminUpdate/<?=$product['id'] ?>" class="btn btn-success">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Find all elements with the "edit-product" class
    var editButtons = document.querySelectorAll(".edit-product");

    // Add a click event listener to each "Edit" button
    editButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the product ID from the href attribute
            var productId = this.getAttribute("href").split("=")[1];

            // Make an AJAX request to fetch the product data based on the ID
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/getProductData.php?id=" + productId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse the JSON response
                    var productData = JSON.parse(xhr.responseText);

                    // Populate the form fields with the fetched data
                    document.getElementById("name").value = productData.name;
                    document.getElementById("description").value = productData.description;
                    // Add similar lines for other form fields
                }
            };
            xhr.send();
        });
    });
});
</script>



