<?php include '../view/header.php';?>

<head>
  <link rel="stylesheet" type="text/text/css" href="../main.css" />
</head>
<main>
  <h1>View/Update Customer</h1>
  <br/>
  <form action="." method="post" id="long_label_form">
    <input type="hidden" name="action" value="add_customer" />

    <label>First Name:</label>
    <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
    <?php echo $fields->getField('first_name')->getHTML(); ?><br>
    <br/>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
    <?php echo $fields->getField('last_name')->getHTML(); ?><br>
    <br/>
    
    <label>Address:</label>
    <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
    <?php echo $fields->getField('address')->getHTML(); ?><br>
    <br/>

    <label>City:</label>
    <input type="text" name="city"  value="<?php echo htmlspecialchars($city); ?>">
    <?php echo $fields->getField('city')->getHTML(); ?><br>
    <br/>

    <label>State:</label>
    <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>">
    <?php echo $fields->getField('state')->getHTML(); ?><br>
    <br/>

    <label>Postal Code:</label>
    <input type="text" name="postal_code" value="<?php echo htmlspecialchars($postal_code); ?>">
    <?php echo $fields->getField('postal_code')->getHTML(); ?><br>
    <br/>

    <label>Country Code:</label>
    <input type="text" name="country_code" value="<?php echo htmlspecialchars($country_code); ?>">
    <?php echo $fields->getField('country_code')->getHTML(); ?><br>
    <br/>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
    <?php echo $fields->getField('phone')->getHTML(); ?><br>
    <br/>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <?php echo $fields->getField('email')->getHTML(); ?><br>
    <br/>

    <label>Password:</label>
    <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>">
    <?php echo $fields->getField('password')->getHTML(); ?><br>
    <br/>

    <label>&nbsp;</label>
    <input type="submit" value="Add Customer" />
    <br>
    <br>
  </form>

  <a href="index.php?action=search_customers">Search Customers</a>