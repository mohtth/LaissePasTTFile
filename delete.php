<?php

$id=$_GET['id'];
$fichier = 'upload/'.$id;

if( file_exists ( $fichier)){
    unlink( $fichier ) ;
    header('Location:index.php');
}
