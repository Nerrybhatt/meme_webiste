<html>
    <head>
        <title>file upload</title>
        <body>
        <form enctype="multipart/form-data"  method="POST">
        <p>Upload your file</p>
        <input type="file" name="upload_file"></input><br>
        <input type="submit" value="Upload"></input>
        </form>
        </body>
    </head>
</html>

<?php
 if(!empty($_FILES['upload_file'])){
    $path="upload/";
    $path=$path.basename($_FILES['upload_file']['name']);

    if (move_uploaded_file($_FILES['upload_file']['tmp_name'],$path)){
        echo "The file". basename($_FILES['upload_file']['name'])."has uploaded";
    }else{
        echo " there was a error while uploading the file, try again";
    }
 }

?>