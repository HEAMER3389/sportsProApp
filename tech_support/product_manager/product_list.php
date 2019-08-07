<?php include '../view/header.php'; ?>
<head>
  <link rel="stylesheet" type="text/css" href="../main.css">


    <div class="wrapper">
      <h1>Product List</h1>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['version']; ?></td>
                <td><?php echo $product['releaseDate']; ?></td>
                <td>
                  <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="product_code"
                           value="<?php echo $product['productCode']; ?>">
                    <input type="submit" value="Delete">
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
        </table>
      </br>
      <ul>
        <a href="?action=show_add_form">Add Product</a>

      </ul>
    </div>
<?php include '../view/footer.php'; ?>
