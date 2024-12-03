<?php
if(isset($_POST['upload'])){
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
$file_tem_loc = $FILES['file']['tmp_name'];
$file_store ="upload/".$file_name;

if (move_uploaded_file($file_tem_loc, $file_store)){
    echo "File upload";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="?" method="POST" enctype="multipart/form-data">
    <label>File Update</label>
    <p><input type="file" name="file"/></p>
    <p><input type="submit" name="upload" value="upload file"></p>
    </form>
</body>
</html>