<?php include "utils/header.php" ?>

<?php 

  if (isset($_REQUEST['search'])){
    $query = mysqli_query($conn, "SELECT * FROM contact WHERE name LIKE '%". $_REQUEST['search'] ."%' ORDER BY name ASC");
    $result = mysqli_fetch_all($query);
  }else {
    $query = mysqli_query($conn, "SELECT * FROM contact ORDER BY name ASC");
    $result = mysqli_fetch_all($query);
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
    <div class="phonebook__main">
      <div class="contact__letter">
        <h4><?= substr($key[1], 0, 1) ?></h4>
      </div>
      <div class="contact">
        <h5><?= $key[1] ?></h5>
        <p><?= $key[2] ?></p>
      </div>
      <div class="icons">
        <a href="edit.php?id=<?= $key[0] ?>">
          <button class="icon__edit"><i class="fa fa-edit"></i></button>
        </a>
      </div>
    </div>
    <?php endforeach ?>
    <h6 style="margin-left: 50px; margin-right: 50px; padding-top: 5px; padding-bottom: 5px; font-weight: 400;">Copyright &copy; Danieldutcum 2021</h6>
    </div>
   
<?php include "utils/footer.php" ?>
