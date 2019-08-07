<?php include '../view/header.php';?>
<head>
  <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<div class="wrapper">

<h1>Customer Search</h1>

<form action="index.php" method="post" id="short_label_form" />
  <input type="hidden" name="action" value="run_search"/>

  <label>Last Name:</label>
  <input type="text" name="last_name">

  <input type="submit" value="Search" />
  <br/>
</form>

<h2>Add a new customer</h2>
      <form action="." method="post">
      <input type="hidden" name="action" value="add_customer_form">
      <input type="submit" value="Add Customer">
      </form>

    <?php if (isset($message)) : ?>
    <p>
    <?php echo $message; ?>
    </p>
    <?php elseif ($customers) : ?>

<h1>Results</h1>
<table>
  <tr>
    <th>Name</th>
    <th>Email Address</th>
    <th>City</th>
    <th></th>
  </tr>

  <?php foreach ($customers as $customer): ?>

  <tr>
    <td><?php echo $customer['firstName']. " ". $customer['lastName']; ?></td>
    <td><?php echo $customer['email']; ?></td>
    <td><?php echo $customer['city']; ?></td>
      <td>
        <form action="." method="post">
        <input type="hidden" name="action" value="select_customer" >
        <input type="hidden" name="email" value="<?php echo $customer['email']; ?>">
        <input type="submit" value="Select">
        </form>
      </td>
      
    </tr>
<?php endforeach; ?>
</table>
</div>
<?php endif; ?>

<?php include '../view/footer.php'; ?>
