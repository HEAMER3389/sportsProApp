<?php include '../view/header.php';?>

<head>
  <link rel="stylesheet" type="text/text/css" href="../main.css" />
</head>
<main>
  <h1>View/Update Customer</h1>
  <br/>
  <form action="index.php" method="post" id="long_label_form">
    <input type="hidden" name="action" value="update_customer" />

    <label>First Name:</label>
    <input type="text" name="first_name" value="<?php echo $customer['firstName']; ?>">
    <br/>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="<?php echo $customer['lastName']; ?>">
    <br/>

    <label>Address:</label>
    <input type="text" name="address" value="<?php echo $customer['address']; ?>">
    <br/>

    <label>City:</label>
    <input type="text" name="city" value="<?php echo $customer['city']; ?>">
    <br/>

    <label>State:</label>
    <input type="text" name="state" value="<?php echo $customer['state']; ?>">
    <br/>

    <label>Postal Code:</label>
    <input type="text" name="postal_code" value="<?php echo $customer['postalCode']; ?>">
    <br/>

    <label>Country Code:</label>
    <input type="text" name="country_code" value="<?php echo $customer['countryCode']; ?>">
    <br/>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $customer['phone']; ?>">
    <br/>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $customer['email']; ?>">
    <br/>

    <label>Password:</label>
    <input type="text" name="password" value="<?php echo $customer['password']; ?>">
    <br/>

    <label>&nbsp;</label>
    <input type="submit" value="Update Customer" />
    <br>
    <br>
  </form>

  <a href="index.php?action=search_customers">Search Customers</a>
