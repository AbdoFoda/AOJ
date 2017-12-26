
<?php
    if(isset($_GET["file"])){
        $file =$_GET["file"];
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        // read the file from disk
        readfile($file);
    }else{
	   echo "NO SUCH FILE";
    }
    
?>
