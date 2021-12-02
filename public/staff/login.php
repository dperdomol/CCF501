<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  //Validations
  if(is_blank($username)){
    $errors[] = "User cannot be blank";
  }

  if(is_blank($password)){
    $errors[] = "Password cannot be blank";
  }

  if(empty($errors)){

    $admin = find_admin_by_username($username);
    if($admin){
      if(password_verify($password, $admin["hashed_password"])){
        log_in_admin($admin);
        redirect_to(url_for('/staff/index.php'));
      }else{
        $errors[] = "Login was unsuccessful.";
      }
    } else {
      $errors[] = "Login was unsuccessful.";
    }

  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="container pt-5">

  <div class="row justify-content-center">
    <div class="col-3">
      <h1>Log in</h1>
    
      <?php echo display_errors($errors); ?>
    
      <form action="login.php" method="post">
        Username:<br />
        <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
        Password:<br />
        <input type="password" name="password" value="" /><br />
        <input class="btn btn-primary mt-2" type="submit" name="submit" value="Submit" />
      </form>
    </div>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
