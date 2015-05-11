<?php namespace Config;

class Storage
{
    public function uploadImg()
    {
        $target_dir = ROOT . '../public/img/';
        $target_file = $target_dir . basename($_FILES['file']['name']);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check file size
        if ($_FILES['file']['size'] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != 'jpg' && $imageFileType != 'png' &&
            $imageFileType != 'jpeg' && $imageFileType != 'gif'
        ) {
            $uploadOk = 0;
        }

        // If no errors
        if ($uploadOk != 0) {
            move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
        }
    }
}