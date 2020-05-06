<?php
if (!array_key_exists('P', $_GET) || empty($_GET['P'])) 
    $active = 'home';
else
    $active = $_GET['P'];
?>

<?php if(IsUserLoggedIn()) : ?>
    Logged in as <?=$_SESSION['username']?> <span class="status"><?=$_SESSION['permission']>=1 ? "[ADMIN]" : ""?></span>
    <br>
<?php endif; ?>

<span class="menuItem <?=$active=='home'?"active":""; ?>">
    <a href="index.php">Home</a>
</span>

<?php if (IsUserLoggedIn()) : ?>
    <span class="menuItem <?=$active=='browse'?"active":""; ?>">
        <a href="index.php?P=browse">Browse</a>
    </span>
    <span class="menuItem <?=$active=='favorites'?"active":""; ?>">
        <a href="index.php?P=favorites">Favorites</a>
    </span>

    <?php if (isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?> 
        <span class="menuItem adminItem <?=$active=='add_game'?"active":""; ?>">
            <a href="index.php?P=add_game">Add game</a>
        </span>

        <span class="menuItem adminItem <?=$active=='user_list'?"active":""; ?>">
            <a href="index.php?P=user_list">List users</a>
        </span>
    <?php endif; ?>

    <span class="menuItem profile <?=$active=='logout'?"active":""; ?>">
        <a href="index.php?P=logout">Logout</a>
    </span>

<?php else: ?>
    <span class="menuItem <?=$active=='register'?"active":""; ?>">
        <a href="index.php?P=register">Register</a>
    </span>
    <span class="menuItem <?=$active=='login'?"active":""; ?>">
        <a href="index.php?P=login">Login</a>
    </span>
    
<?php endif; ?>