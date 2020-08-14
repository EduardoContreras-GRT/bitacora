<?php


if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir'){
  if (isset($_FILES['filePagos']) && $_FILES['filePagos']['error'] === UPLOAD_ERR_OK){
    // get details of the uploaded file
    $fileTmpPath = $_FILES['filePagos']['tmp_name'];
    $fileName = $_FILES['filePagos']['name'];
    $fileSize = $_FILES['filePagos']['size'];
    $fileType = $_FILES['filePagos']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    // check if file has one of the following extensions
    $allowedfileExtensions = array('xls', 'xlsx', "csv");

    if (in_array($fileExtension, $allowedfileExtensions)){
      // directory in which the uploaded file will be moved   
      $uploadFileDir =  dirname(__FILE__) . '/../../payFiles/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)){
             $status ='success';
             $html = "<script>";
             $html .= "window.parent.uploadFile(1,'" . $newFileName . "');";
             echo $html .= "</script>";

      } else {
            $status = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            $html = "<script>";
            $html .= "window.parent.uploadFile(2,'');";
            echo $html .= "</script>";
      }
    } else {
        $status = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        $html = "<script>";
        $html .= "window.parent.uploadFile(3,'');";
        echo $html .= "</script>";
    }
  } else {
    $status = 'There is some error in the file upload. Please check the following error.<br>';
    $status .= 'Error:' . $_FILES['uploadedFile']['error'];
    $html = "<script>";
    $html .= "window.parent.uploadFile(4,'');";
    echo $html .= "</script>";
  }
}