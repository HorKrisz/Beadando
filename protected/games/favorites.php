<?php if(array_key_exists('d', $_GET) && isset($_GET['d'])) {
            $query = "DELETE FROM favorites WHERE game_id = :id AND user_id = :usid";
            $params = [
                ':id' => $_GET['d'],
                ':usid' => $_SESSION['uid']
            ];
            require_once DATABASE_CONTROLLER;
            if(!executeDML($query, $params)) {
                echo "Hiba törlés közben!";
            }
        } ?>

<?php 
$query = "SELECT id, title, category, developer, image FROM games WHERE id IN (SELECT game_id FROM favorites WHERE user_id =".$_SESSION['uid'].") ORDER BY title ASC";
require_once DATABASE_CONTROLLER;
$games = getList($query);
?>

<div class="main-container">
    <?php if(count($games) <= 0): ?>
        There are no games!
    <?php else: ?>
        <?php $i=0; ?>
        <?php foreach($games as $g): ?>
            <?php $i++; ?>
            <div class="gamecard">
                <img src="<?=PUBLIC_DIR.'images/'.$g['image']; ?>" alt="Borítókép">
                <div class="btns">
                    <a class="btn btn-primary" name="remFromFav" href="?P=favorites&d=<?=$g['id']; ?>">Remove</a>
                </div>
                <div class="gc-info-b">
                    <center><h4><?=$g['title']; ?></h4></center>
                    <br>
                    <?=$g['category']; ?>
                    <br>
                    <?=$g['developer']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>