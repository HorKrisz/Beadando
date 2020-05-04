<?php 
$query = "SELECT title, category, creator, image FROM games";
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
                <div class="fav-btn">
                    <a class="btn btn-primary" href="#">Add to favorite</a>
                    <?php if($_SESSION['permission']>=1): ?>
                        <a class="btn btn-secondary del-btn" href="#">Delete</a>
                    <?php endif; ?>
                </div>
                <div class="gc-info">
                    <center><h4><?=$g['title']; ?></h4></center>
                    <br>
                    <?=$g['category']; ?>
                    <br>
                    <?=$g['creator']; ?>
                </div>
            </div>
            <?php if($i % 6 == 0): ?>
                <br>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>