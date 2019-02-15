<?php include "init.php"; ?>
<!DOCTYPE html>
<html>
  <head>
		<?php include $pathToRoot . $incLocation . "meta.php"; ?>
    <title>Posts</title>
	</head>
  <script>
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#imageSpot').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("document").ready(function(){
      $('input[name=file]').change(function() {
        readURL(this);

        var _URL = window.URL || window.webkitURL;
        var image, file;
        if ((file = this.files[0])) {
          image = new Image();
          image.onload = function() {
            //alert("The image width is " +this.width + " and image height is " + this.height);
            var img = $('#imageSpot');
            console.log(this.width);
            var widthI = this.width;
            var heightI = this.height;

            document.getElementById('width').value = widthI;
            document.getElementById('height').value = heightI;

            var ratioI = (heightI/widthI);

            var div = document.getElementById('imgDiv');
            var widthD = div.clientWidth;
            var heightD = div.clientHeight;

            if(widthI > (widthD * 0.25)) {
              widthI = 0.25 * widthD;
              heightI = widthI * ratioI;
            }


            img.width(widthI); // Units are assumed to be pixels
            img.height(heightI);
          };
          image.src = _URL.createObjectURL(file);
        }
      });

    });
  </script>
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
        <div class='_2-3rd left column'>

          <form class='card playing-card' id='post_form' method='post' action='' enctype="multipart/form-data">
            <h1>Create A Post!</h1>
            <div class='row form_input'>
              <label class='left' for='post_title'>Title:</label>
              <input class='right' type='text' name='post_title' id='post_title' required>
            </div>
            <br>
            <div class='row form_input'>
              <label class='left' for='post_subtitle'>Subtitle:</label>
              <input class='right' type='text' name='post_subtitle' id='post_subtitle'>
            </div>
            <br>
            <div class='row form_input'>
              <label class='left' for='post_date'>Date:</label>
              <input class='right' type='text' name='post_date' id='post_date' value='<?php echo getToday(); ?>' readonly>
            </div>
            <br>
            <div class='row form_input'>
              <label class='left' for='post_author'>Author:</label>
              <input class='right' type='text' name='post_author' id='post_author' value='<?php echo "HG King"; ?>' readonly>
            </div>
            <br>
            <div class='row form_input' id='imgDiv'>
              <label for='file' class='left'>Image:</label>
              <div class='right'>
                <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
                <label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span id='fileLabel' class='font2'>Choose a file&hellip;</span></label>
                <br>
                <input type='hidden' id='width' name='width'>
                <input type='hidden' id='height' name='height'>
                <br>
                <img src='' id='imageSpot'>
              </div>
            </div>
            <br>
            <div class='row form_input'>
              <label class='left' for='post_body'>Body:</label>
              <textarea class='right' form='post_form' name='post_body' id='post_body' required></textarea>
            </div>
            <br>
            <div class='row form_input'>
              <p><?php echo $errorMsg; ?></p>
              <p><?php echo $statusMsg; ?></p>
              <input type='submit' name='post_create' value='Create Post'>
            </div>
          </form>
          <?php getPosts($pathToRoot); ?>
        </div>
		 	  <?php include $pathToRoot . $incLocation . "sidebar.php"; ?>
			</div>
		</main>
		<?php include $pathToRoot . $incLocation . "footer.php"; ?>
  </body>
</html>
