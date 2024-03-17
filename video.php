<?php include('config.php'); ?>
<?php
if(isset($_POST['play'])){   
    $id = $_POST['hide'];
    $select = "SELECT * FROM link  WHERE id ='$id'";
    $select_query = mysqli_query($connection, $select); 
    $row = mysqli_fetch_array($select_query);
    $r = $row['views']+1;
$update = mysqli_query($connection,"UPDATE link SET views ='$r' WHERE id ='$id'");
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

    <table>
<tr>
<!-- <th>Video name</th> -->
<th>Views</th>
<th>Video</th>
<th>Play</th>
</tr>

    <?php
    $select = "SELECT * FROM link";
    $select_query = mysqli_query($connection, $select);
     while($e=mysqli_fetch_array($select_query)){
    ?>
<tr>
    <!-- <td><?php echo $e['id']; ?></td> -->
    <!-- <td><?php echo $e['video_name']; ?></td> -->
    <td><?php echo $e['views']." views"; ?></td>
    <td>
    <video id="video" width="640" height="360" controls>
    <source src="vid/<?php echo $e['video_name']; ?>" type="video/mp4">
     </video>
    </td>
    <td>
    <form method="post">
 
        <input type="hidden" name="hide" value="<?php echo $e['id']; ?>" >
    <button type="submit" name="play" id="play-button" class="but">Play</button>
     </form>
    </td>
</tr>

<?php
     }
?>
    </table>
</div>
   


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
