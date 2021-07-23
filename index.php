<?php include "utils/header.php" ?>

<?php 

  if (isset($_REQUEST['search'])){
    $query = mysqli_query($conn, "SELECT * FROM contact WHERE name LIKE '%". $_REQUEST['search'] ."%' ORDER BY name ASC");
    $result = mysqli_fetch_all($query);
  }else {
    $query = mysqli_query($conn, "SELECT * FROM contact ORDER BY name ASC");
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
  }


?>
  <div class="phonebook__header">
    <form>
      <div class="phonebook__search">
        <input
          type="text"
          name="search"
          placeholder="Search contacts and places"
        />
        <div class="search__dot">
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
        </div>
      </div>
    </form>
    <div class="create__contact">
      <a href="add.php">
        <i class="fa fa-user-plus"></i>
        <button>Create new contact</button>
      </a>
    </div>
  </div>
  <div class="phonebook__body">
    <?php foreach($result as $key):?>
      <?php
        $a = "";
        $icon = explode(" ",$key["name"]); 
        foreach ($icon as $char) {
          $a.=substr($char,0,1);
        }
      ?>
    <div class="phonebook__main">
      <div class="contact__letter">
        <h4><?= $a ?></h4>
      </div>
      <div class="contact">
        <h5><?= $key["name"] ?></h5>
        <p><?= $key["mobile"] ?></p>
      </div>
      <div class="icons">
        <a href="edit.php?id=<?= $key["id"] ?>">
          <button class="icon__edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
        </a>
      </div>
    </div>
    <?php endforeach ?>
  </div>
   
<?php include "utils/footer.php" ?>