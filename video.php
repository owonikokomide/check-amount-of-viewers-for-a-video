<?php include('config.php'); ?>
<?php
if(isset($_POST['play'])){
    $select = "SELECT * FROM link WHERE id = '1'";
    $select_query = mysqli_query($connection, $select);
    $row = mysqli_fetch_array($select_query);
    $r = $row['views']+1;
$update = mysqli_query($connection,"UPDATE link SET views ='$r' WHERE id ='1'");
if($update){
//  echo "succesful";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="video.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>link count</title>
</head>
<body>
  <div class="container">
  <?php
    $select = "SELECT * FROM link WHERE id = '1'";
 $select_query = mysqli_query($connection, $select);
 $row = mysqli_fetch_array($select_query);
 $r = $row['video_name'];
        ?>
  <form action="" method="post">

 <h2><span>Video</span> Player</h2>

    <video id="video" width="640" height="360" controls>
     
    <source src="vid/<?php echo $r?>" type="video/mp4">
    </video>
</br>

        <button type="submit" name="play" id="play-button" class="but">Play</button>

  </form>

    </div>

    <script>
        var video = document.getElementById("video");
        var playButton = document.getElementById("play-button");

        playButton.addEventListener("click", function() {
            if (video.paused) {
                video.play();
                playButton.textContent = "Pause";
            } else {
                video.pause();
                playButton.textContent = "Play";
            }
        });
    </script>

</body>
</html>