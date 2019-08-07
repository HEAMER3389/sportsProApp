<?php include '../view/header.php'; ?>
<head>
  <link rel="stylesheet" type="text/css" href="../main.css">


    <div class="wrapper">
      <h1>Technician List</h1>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $technician): ?>
            <tr>
                <td><?php echo $technician['firstName']; ?></td>
                <td><?php echo $technician['lastName']; ?></td>
                <td><?php echo $technician['email']; ?></td>
                <td><?php echo $technician['phone']; ?></td>
                <td><?php echo $technician['password']; ?></td>
                <td>
                  <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_techs">
                    <input type="hidden" name="tech_id"
                           value="<?php echo $technician['techID']; ?>">
                    <input type="submit" value="Delete">
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
        </table>
      </br>
      <ul>
        <a href="?action=show_add_form">Add Technician</a>

      </ul>
    </div>
<?php include '../view/footer.php'; ?>
