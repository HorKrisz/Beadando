<?php
if (!array_key_exists('P', $_GET) || empty($_GET['P'])) 
    $active = 'home';
else
    $active = $_GET['P'];
?>

<span class="menuItem <?=$active=='home'?"active":""; ?>">
    <a href="index.php?P=home">Home</a>
</span> &nbsp;

<?php if (IsUserLoggedIn()) : ?>
    <span class="menuItem <?=$active=='browse'?"active":""; ?>">
        <a href="index.php?P=browse">Browse</a>
    </span> &nbsp;
    <span class="menuItem <?=$active=='favorites'?"active":""; ?>">
        <a href="index.php?P=favorites">Favorites</a>
    </span> &nbsp;
    <span class="menuItem important <?=$active=='logout'?"active":""; ?>">
        <a href="index.php?P=logout">Logout</a>
    </span> &nbsp;

<?php else: ?>

    <span class="menuItem <?=$active=='register'?"active":""; ?>">
        <a href="index.php?P=register">Register</a>
    </span> &nbsp;
    <span class="menuItem <?=$active=='login'?"active":""; ?>">
        <a href="index.php?P=login">Login</a>
    </span> &nbsp;
    
<?php endif; ?>