<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $file = test_input($_POST["file"]);
   $folderId = test_input($_POST["folderId"]);

  $folder_path = "../user/".$folderId."/delete";
  if (!file_exists($folder_path)) {
    mkdir($folder_path, 0777, true);
  }
  $filename = substr($file, strrpos($file, '/') + 1);
  rename($file, $folder_path."/".$filename);
  echo ("<SCRIPT LANGUAGE='JavaScript'>
     window.location.href='../';
     </SCRIPT>");

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

?>
