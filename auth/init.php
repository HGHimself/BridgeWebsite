<?php
$pathToRoot = '../';
$dirname = basename(dirname(__FILE__)) . '/';
include $pathToRoot . "config.php";
include "functions.php";

function hash_password($password)  {
  return password_hash($password, PASSWORD_DEFAULT);
}


if(isset($_POST['register']))  {

  if(strcmp($_POST['register_password'], $_POST['register_password_confirm'])) {

    $table = 'Users';
    $values = array(
      'username' => $_POST['register_userame'],
      'password' => hash_password($_POST['register_password']),
      'name' => $_POST['register_name'],
      'email' => $_POST['register_email'],
      'role' => $_POST['register_role'],
      'status' => 1,
    );

    insertIntoTable($table, $values);
  }


}
?>
