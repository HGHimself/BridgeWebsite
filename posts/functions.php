<?php

function getPosts($pathToRoot)  {


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
  foreach($results as $result)  {
    printPost($result, $pathToRoot);
  }
}

function printPost($result, $pathToRoot)  {
  if($result)  {
    echo "<div class='card playing-card'>";
      printf("<h2>%s</h2>", $result['title']);
      if(isset($result['subtitle'])) printf("<h4>%s</h4>", $result['subtitle']);
      printf("<h5>posted on %s by %s</h5>", $result['date'], $result['author']);
      if(isset($result['image'])) printf("<img class='post-img' src='%s'>", $pathToRoot . $result['image']);
      printf("%s", nl2br($result['body']));
        printf("<form method='post' action=''><input type='hidden' value='%s' name='post_id'><input type='submit' name='post_delete' value='Delete'></form>", $result['id']);
      echo "<h3>Comments</h3>";
      getComments($result['id']);

      printf("<form method='post' action='' id='post_comment_%s'>", $result['id']);
        echo "<div class='row'>";
          printf("<input type='hidden' name='comment_post_id' value='%s'>", $result['id']);
          printf("<input type='hidden' name='comment_date' value='%s'>", getToday());
          printf("<input type='hidden' name='comment_author' value='%s'>", "Anonymous");
          printf("<textarea class='' rows='4' form='post_comment_%s' name='comment_body' required></textarea>", $result['id']);
          echo "<input type='submit' name='comment_create' value='Comment'>";
        echo "</div>";
      echo "</form>";

    echo "</div>";
  }
}

function getComments($id)  {
  $table = 'Comments';
  $headers = NULL;
  $conditions = "post_id = " . $id;

  $results = queryDB($table, $headers, $conditions);
  foreach($results as $result)  {
    printComment($result);
  }
}

function printComment($result)  {
  if($result)  {
    echo "<div class='comment'>";
      printf("<h5>posted on %s by %s</h5>", $result['date'], $result['author']);
      printf("%s", nl2br($result['body']));
      printf("<form method='post' action=''><input type='hidden' value='%s' name='comment_id'><input type='submit' name='comment_delete' value='Delete'></form>", $result['id']);
    echo "</div>";
  }
}



?>
