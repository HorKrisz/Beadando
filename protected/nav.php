<?php
if (!array_key_exists('P', $_GET) || empty($_GET['P'])) 
    $active = 'home';
else
    $active = $_GET['P'];
?>

<span class="menuItem <?=$active=='home'?"active":"" ?>">
    <a href="index.php?P=home">Home</a>
</span> &nbsp;
<span class="menuItem <?=$active=='browse'?"active":"" ?>">
    <a href="index.php?P=browse">Browse</a>
</span> &nbsp;
<span class="menuItem <?=$active=='favorites'?"active":"" ?>">
    <a href="index.php?P=favorites">Favorites</a>
</span>