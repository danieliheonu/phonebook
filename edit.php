<?php include "utils/header.php" ?>

<?php

  $result = mysqli_fetch_assoc(mysqli_query($conn, " SELECT * FROM contact WHERE id=" . $_REQUEST['id'] . ""));

  if (isset($_REQUEST['action']) && $_REQUEST['action'] == "Update") {
    $update = mysqli_query($conn, "UPDATE contact SET name = '" . $_REQUEST['user'] ."', mobile = '" . $_REQUEST['number']. "' WHERE id =" . $_REQUEST['id'] . "");
    header("Location: index.php");
  }

  if (isset($_REQUEST['action']) && $_REQUEST['action'] == "Delete"){
    $delete = mysqli_query($conn, "DELETE FROM contact WHERE id =". $_REQUEST['id'] . "");
    header("Location: index.php");
  }

?>
  <div class="contact__header">
    <div class="contact__title">
      <a href="index.php"><button>&#215;</button></a>
      <h4>Edit Contact</h4>
    </div>
  </div>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $result['id'] ?>" />
    <div class="contact__details">
      <i class="fa fa-user"></i>
      <input type="text" name="user" placeholder="Full Name" value="<?= $result['name'] ?>" required/>
    </div>
    <div class="contact__details">
      <i class="fa fa-phone"></i>
      <input type="text" name="number" placeholder="Mobile" value="<?= $result['mobile'] ?>" required />
    </div>
    <div class="btn">
      <input type="submit" name="action" value="Update" class="btn__save2" />
      <input type="submit" name="action" value="Delete" class="btn__delete" />
      </div>
  </form>

<?php include "utils/footer.php" ?>