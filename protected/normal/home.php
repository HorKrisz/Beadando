<?php
$query = "SELECT id, title, category, developer, image FROM games WHERE id IN (SELECT max(id) FROM games)";
require_once DATABASE_CONTROLLER;
$record = getRecord($query);
?>

<div class="main-container">
    <center><h2>Welcome <?=IsUserLoggedIn() ? ", ".$_SESSION['username'] : ""?></h2></center>
    <div class="home-info">
        <h3>Recently added game</h3>
        <?php if (!empty($record)): ?>
            <div class="gamecard">
                <img src="<?=PUBLIC_DIR.'images/'.$record['image']; ?>" alt="Borítókép">
                <div class="gc-info">
                    <center><h4><?=$record['title']; ?></h4></center>
                    <br>
                    <?=$record['category']; ?>
                    <br>
                    <?=$record['developer']; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>