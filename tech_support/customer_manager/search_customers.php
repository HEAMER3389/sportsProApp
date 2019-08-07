<?php include '../view/header.php';?>
<head>
  <div id="wrapper" />
  <main>
    <h1>Customer Search<h1>
      <br/>
      <form action="index.php" method="post" id="short_label_form">
        <input type="hidden" name="action" value="run_search" />

        <label>Last Name:</label>
        <input type="text" name="last_name">

        <input type="submit" value="Search" />
      </form>
      <br/>
    </main>
  </div>
  <?php include '../view/footer.php'; ?>
