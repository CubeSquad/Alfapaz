<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if($imageFileType != "ZIP" && $imageFileType != "RAR" && $imageFileType != "7ZIP"
&& $imageFileType != "pdf" ) {
  echo "Lo sentimos, el archivo no está dentro de un origen comprimido.";
  $uploadOk = 0;
}
}
?>