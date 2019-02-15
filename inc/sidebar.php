<?php

function makeSidebar($pathToRoot)  {
  $tableName = 'Posts';
  $headers = NULL;
  $conditions = "1 LIMIT 5";

  $result = queryDB($tableName, $headers, $conditions);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
      echo "<div class='card playing-card'>";
      printf("<h3><a href='%sschedule/?post=%s'>%s</a></h3>", $pathToRoot, $row['id'], $row['title']);
      printf('<h4>%s</h4>', $row['subtitle']);
      printf('<h4>%s</h4>', getTextDate($row['date']));
      if(isset($result['image'])) printf("<img class='post-img' src='%s'>", $pathToRoot . $result['image']);
      echo "</div>";
		}
	}
}
?>

<div class="_1-3rd left">
  <div class="playing-card card">
    <h1>Bridge</h1>
    <h1>Canasata</h1>
    <h1>Scrabble</h1>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
  </div>
  <?php makeSidebar($pathToRoot); ?>
  <div class="playing-card card">
    <h3>Follow Me</h3>
    <p>Some text..</p>
  </div>
</div>
