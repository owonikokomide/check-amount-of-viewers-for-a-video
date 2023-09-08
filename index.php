<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>upload video</title>
</head>
<body>
  <div class="container">
    <h1>Upload a video</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="file" name="video" accept="video/">
      <input type="submit" name="submit">
    </form>
  </div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
  $video = $_FILES['video']['name'];
  $folder = "folder/";
  $destination = $video.$folder;
  $tmp = $_FILES['video']['tmp_name'];
$n = move_uploaded_file($tmp, $destination);

$update = mysqli_query($connection,"UPDATE link SET video_name ='$video' WHERE id ='1'");

  if($update){
   echo "<script> alert('Video Successfully Uploaded')
   location.href='video.php'
   </script>";
   
  }
  else{
    echo "error uploading video";
  }
}

?>