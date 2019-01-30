<?php

$pathToRoot = '../';
$dirname = basename(dirname(__FILE__)) . '/';

include $pathToRoot . "config.php";
include "functions.php";

echo "<h2>So far so good guys!</h2>";

if(isset($_POST['post_create']))  {
  $table = "Posts";
  $values = array(
						'title'   => $_POST['post_title'],
						'date' 		=> $_POST['post_date'],
            'author'  => $_POST['post_author'],
            'body'    => $_POST['post_body'],
						);

  if(isset($_POST['post_image']))  {
    $values['image'] = $_POST['post_image'];
  }
  if(isset($_POST['post_subtitle']))  {
    $values['subtitle'] = $_POST['post_subtitle'];
  }

  insertIntoTable($table, $values);
} else {
  echo "<h2>Just a regular day in the office</h2>";
}

//makes a query to the database in the style of
//'SELECT $headers FROM $table WHERE $conditions'
//
//use $headers = NULL for 'SELECT *'
//do not include 'WHERE' in $conditions
//
//returns $results from query or NULL if something went wrong
$table = 'Posts';
$headers = NULL;
$conditions = NULL;

$results = queryDB($table, $headers, $conditions);




?>
