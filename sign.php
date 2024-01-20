<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Wpisz się</title>
</head>
<body>

    <?php require_once('config.php');?>
    <?php

        if($_POST)
        {
            if("" == trim($_POST['name']) || ""==trim($_POST['content'])){
                echo '<div class="alert-danger">Podano puste pola</div>';
            }else{
                $imie = trim($_POST['name']);
                $content = trim($_POST['content']);
                $created_at = date("Y-m-d H:i:s");
                $ip_addr = $_SERVER['REMOTE_ADDR'];
                if(strlen($imie) <64 && strlen($content) < 5000){
                    if($database->addEntry($imie,$content,$created_at,$ip_addr)){
                        echo "<div class='alert-success'>Dodano wpis</div>";
                    }else{
                        echo "<div class='alert-danger'>Nie dodano</div>";
                    }
                }
            }
        }
    ?>
    <a href="index.php">Strona główna</a>
    <form action="" method="post">
        <div>
        <input type="text" name="name" id="">
        </div>
        <div>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="Wpisz się">
        </div>
    </form>
</body>
</html>