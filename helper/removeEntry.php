<?php
session_start();
if($_GET['entry_id']){
    $_SESSION['entry_id']=$_GET['entry_id'];
}
header("Location: removeEntryFinal.php");