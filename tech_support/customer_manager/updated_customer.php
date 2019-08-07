<?php include '../view/header.php';?>
<head>
  <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<div class="wrapper">

  <h1>Updated Customer</h1>
  <br/>
  <table>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Phone</th>
      <th>&nbsp;</th>

    </tr>
    <tr>
      <td><?php echo $customer['firstName']." ".$customer['lastName']; ?></td>
      <td><?php echo $customer['address']." ".$customer['city'].",".$customer['state']." ".
      $customer['postalCode']; ?></td>
      <td><?php echo $customer['phone']; ?></td>
      <td>
        <form action="." method="post">
          <input type="hidden" name="action" value="select_customer"/>
          <input type="hidden" name="email" value="<?php echo $customer['email']; ?>">
          <input type="submit" value="Select"/>
        </form>
      </td>
    </table>
    <br/><br/>
    <ul>
      <a href="index.php?action=search_customers">Search Customers</a>
    </ul>
  </div>
  <?php include '../view/footer.php';?>
