<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $folderId = test_input($_POST["folderId"]);

  $folder_path = "../user/".$folderId."/profile/";
  if (!file_exists($folder_path)) {
    mkdir($folder_path, 0777, true);
  }else{
    $files = glob($folder_path.'*'); // get all file names
    foreach($files as $file){ // iterate files
      if(is_file($file))
        unlink($file); // delete file
    }
  }

  $filename = basename($_FILES['fileToUpload']['name']);
   $newname = $folder_path . $filename;
   $fileOk = 1;
   $types = array('image/jpeg', 'image/jpg', 'image/png');

   if (($_FILES["fileToUpload"]["type"] == "image/jpeg") || ($_FILES["fileToUpload"]["type"] == "image/jpg") || ($_FILES["fileToUpload"]["type"] == "image/png"))
   {
       if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $newname))
       {
         $fileOk = 1;
         echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='../';
            </SCRIPT>");
       }
       else
       {
         echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Solo se permiten archivos PNG & JPG.')
           window.location.href='../';
           </SCRIPT>");
       }
   }
   else
   {
     $fileOk = 0;
     echo ("<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Solo se permiten archivos PNG & JPG.')
       window.location.href='../';
       </SCRIPT>");
   }

}else{
  echo ("<SCRIPT LANGUAGE='JavaScript'>
     window.location.href='../';
     </SCRIPT>");
  }


  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
