<?php include "init.php"; ?>
<!DOCTYPE html>
<html>
  <head>
		<?php include $pathToRoot . $incLocation . "meta.php"; ?>
    <title>Home</title>
	</head>
  <body>
		<?php include $pathToRoot . $incLocation . "header.php"; ?>
		<?php include $pathToRoot . $incLocation . "nav.php"; ?>
		<main>
      <?
      if(isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == TRUE))  {
        printf("<h2 class='dayHeader'>Welcome %s!</h2>", $_SESSION['name']);
      }
      ?>
			<div class="row">
			  <div class="leftcolumn">
			    <div class="card">
            <h1>Create A Post!</h1>
            <form id='post_form' method='post' action=''>
              <div class='row'>
                <label for='post_title'>Title:</label>
                <input type='text' name='post_title' id='post_title' required>
              </div>
              <br>
              <div class='row'>
                <label for='post_subtitle'>Subtitle:</label>
                <input type='text' name='post_subtitle' id='post_subtitle'>
              </div>
              <br>
              <div class='row'>
                <label for='post_date'>Date:</label>
                <input type='text' name='post_date' id='post_date' value='<?php echo getToday(); ?>' readonly>
              </div>
              <br>
              <div class='row'>
                <label for='post_author'>Author:</label>
                <input type='text' name='post_author' id='post_author' value='<?php echo "HG King"; ?>' readonly>
              </div>
              <br>
              <div class='row'>
                <label for='post_image'>Image:</label>
                <input type='text' name='post_image' id='post_image' readonly>
              </div>
              <br>
              <div class='row'>
                <label for='post_body'>Body:</label>
                <textarea form='post_form' name='post_body' id='post_body' required></textarea>
              </div>
              <br>
              <div class='row'>
                <input type='submit' name='post_create' value='Create Post'>
              </div>
            </form>
          </div>
          <?php
            foreach($results as $result)  {
              echo "<div class='card'>";
    			      printf("<h2>%s</h2>", $result['title']);
                if(isset($result['subtitle'])) printf("<h4>%s</h4>", $result['subtitle']);
                printf("<h5>posted on %s by %s</h5>", $result['date'], $result['author']);
    			      if(isset($result['image'])) printf("<h4>%s</h4>", $result['image']);
    			      printf("%s", nl2br($result['body']));
    			    echo "</div>";
            }
          ?>
			  </div>
			 	<?php include $pathToRoot . $incLocation . "sidebar.php"; ?>
			</div>
		</main>
		<?php include $pathToRoot . $incLocation . "footer.php"; ?>
  </body>
</html>
