<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
    <?php if(array_key_exists('d', $_GET) && isset($_GET['d'])) {
            $query = "DELETE FROM games WHERE id = :id";
            $params = [':id' => $_GET['d']];
            require_once DATABASE_CONTROLLER;
            if(!executeDML($query, $params)) {
                echo "Hiba törlés közben!";
            }
        } ?>
<?php endif; ?>

<?php if (array_key_exists('a', $_GET) && isset($_GET['a'])) {
    $query = "INSERT INTO favorites (user_id, game_id) VALUES (:user_id, :game_id)";
    $params = [
        ':user_id' => $_SESSION['uid'],
        ':game_id' => $_GET['a']
    ];
    require_once DATABASE_CONTROLLER;
    if(!executeDML($query, $params)) {
        echo "Hiba a hozzáadás közben!";
    }
}
?>
<?php 
$query = "SELECT id, title, category, developer, image FROM games ORDER BY title ASC";
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
                    <a class="btn btn-primary" name="addToFavBtn" href="?P=browse&a=<?=$g['id']?>">Add to favorite</a>
                    <?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1): ?>
                        <a class="btn btn-secondary del-btn" name="delGameBtn" href="?P=browse&d=<?=$g['id']?>">Delete</a>
                    <?php endif; ?>
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