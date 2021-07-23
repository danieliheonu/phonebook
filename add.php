<?php include "utils/header.php" ?>

<?php 

  if (isset($_REQUEST['action']) && $_REQUEST['action'] == "Save"){
  
    $name = $_REQUEST["user"];
    $number = $_REQUEST["number"];

    $query = mysqli_query($conn, "INSERT INTO contact VALUES (NULL, '$name', '$number')");
    header("Location: index.php");
  }

?>

  <div class="contact__header">
    <div class="contact__title">
      <a href="index.php"><button>&#215;</button></a>
      <h4>Create New Contact</h4>
    </div>
  </div>
  <form action="" method="POST">
    <div class="contact__details">
      <i class="fa fa-user"></i>
      <input type="text" name="user" placeholder="Full Name" required/>
    </div>
    <div class="contact__details">
      <i class="fa fa-phone"></i>
      <input type="text" name="number" placeholder="Mobile" required />
    </div>
    <div class="btn">
        <input type="submit" name="action" value="Save" class="btn__save" />
    </div>
</form>
    
<?php include "utils/footer.php" ?>