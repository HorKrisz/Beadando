<?php 
$query = "SELECT title, category, description, image FROM games";
require_once DATABASE_CONTROLLER;
$games = getList($query);
?>

<div class="gc-container">
    <?php if(count($games) <= 0): ?>
        There are no games!
    <?php else: ?>
        <?php $i=0; ?>
        <?php foreach($games as $g): ?>
            <?php $i++; ?>
            <div class="gamecard">
                <img src="<?=PUBLIC_DIR.'images/'.$g['image']?>" alt="Borítókép">
                <center>
                <div>
                    <?=$g['title']; ?>
                    <br>
                    <?=$g['category']; ?>
                    <br>
                    <?=$g['description']; ?>
                </div>
                <a class="btn btn-primary" href="#">Add to favorites</a>
                </center>
            </div>
            <?php if($i % 6 == 0): ?>
                <br>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>