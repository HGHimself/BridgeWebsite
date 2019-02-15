<?php

$pathToRoot = '../';
$dirname = basename(dirname(__FILE__)) . '/';

include $pathToRoot . "config.php";
include "functions.php";

$statusMsg = "";
$errorMsg = "";

echo "<h2>So far so good guys!</h2>";

if(isset($_POST['post_create']))  {
  $table = "Posts";
  $values = array(
						'title'   => $_POST['post_title'],
						'date' 		=> $_POST['post_date'],
            'author'  => $_POST['post_author'],
            'body'    => $_POST['post_body'],
						);

  //file upload path
  $targetDir = "img/";
  $fileName = basename($_FILES["file"]["name"]);
  $filePath = $targetDir . $fileName;
  $targetFilePath = $pathToRoot . $filePath;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  echo "Here!!!";
  if(!empty($_FILES["file"]["name"])) {
    echo "Here2!!!";
    //allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
      //upload file to server
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        $statusMsg = "The file ".$fileName. " has been uploaded.";
        $tableName = "Images";
        $imgvalues = array(
          'size' => filesize($targetFilePath),
          'path' => $filePath,
          'type' => $fileType,
          'width' => $_POST["width"],
          'height' => $_POST["height"],
          'date' => getToday(),
        );
        //print_r($values);
        if(NULL == insertIntoTable($tableName, $imgvalues)) echo $errorMsg = "Couldn't insert into DB!";
        $values['image'] = $filePath;
      }
      else echo $statusMsg = "Sorry, there was an error uploading your file.";
    }
    else echo $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
  }
  if(isset($_POST['post_subtitle']))  {
    $values['subtitle'] = $_POST['post_subtitle'];
  }

  insertIntoTable($table, $values);
} else if(isset($_POST['comment_create'])) {
  $table = "Comments";
  $values = array(
						'post_id' => $_POST['comment_post_id'],
						'date' 		=> $_POST['comment_date'],
            'author'  => $_POST['comment_author'],
            'body'    => $_POST['comment_body'],
						);

  insertIntoTable($table, $values);

} else if(isset($_POST['comment_delete'])) {
  removeById("Comments", $_POST['comment_id']);
} else if(isset($_POST['post_delete'])) {
  removeById("Posts", $_POST['post_id']);
} else {
  echo "<h2>Just a regular day in the office</h2>";
}





?>
