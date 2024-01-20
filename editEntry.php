<?php
require_once('config.php');
$database = new Database();
$entry_id = $_GET['entry_id'];
echo $entry_id;

$result = $database->getEntry($entry_id)->fetch();
?>
<form action="" method="post">
    <textarea name="content" id="content" cols="30" rows="10">
        <?php
            echo trim($result[1]);
        ?>
    </textarea>
    <input type="submit" value="edit">
</form>

<?php

if($_POST){
    $content = $_POST['content'];
    
if($database->editEntry($entry_id,$content)){
    echo '<div class="alert-success">Post edytowano poprawnie</div>';
}else{
    echo '<div class="alert-danger">Błąd edycji </div>';
}
}else{
    echo '<div class="alert-danger">Nie wysłano formularza </div>';
}
?>
<a href="index.php">Home</a>