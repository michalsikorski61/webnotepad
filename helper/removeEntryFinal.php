<?php
session_start();
if(!$_POST)
{
?>

<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <label for="password">Hasło:</label><input type="text" name="password" id="password">
</form>
<?php
}else{
    if($_POST['password']=="Widmo3103@"){
        require_once("../config.php");
        $database->removeEntry($_SESSION['entry_id']);
        header('Location: ../index.php');
    }else{
        echo "<h1>Niepoprawne hasło</h1><a href='http://php.dotpy.pl/0_1_'>Home</a>";
    }
}
