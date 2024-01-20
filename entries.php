<section>
    <?php
        if($database->getEntries()->rowCount() > 0){
            foreach($database->getEntries() as $entry){
    ?>
                <article class="entry_post card mx-2 my-4">
                    <div class="card-body">
                        
                        <div class="card-title">Data:  <?= $entry['created_at']?> - Dodał:<b> <?= $entry['nick'].'</b> ('.$entry['ip_address'].')'?></div>
                    </div>
                    <p class="card-text px-3">
                        <?= $entry['content']?>
                    </p>
                    <p class="mx-2"><span>Tagi:</span><?= $entry['tags'];?></p>
                    <a class="btn btn-success mx-3" href="helper/removeEntry.php?entry_id=<?= $entry['id'];?>">Usuń wpis</a>
                    <a class="btn btn-success mx-3" href="editEntry.php?entry_id=<?= $entry['id'];?>">edit</a>
                </article>
    <?php
            }
        }else{  
            echo "Obecnie brak wpisów";
        }
    ?>
</section>