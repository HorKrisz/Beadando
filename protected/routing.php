<?php 
    if (!array_key_exists('P', $_GET) || empty($_GET['P']))
        $_GET['P'] = 'home';

    switch ($_GET['P']) {
        case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
        
        case 'browse': require_once PROTECTED_DIR.'games/browse.php'; break;
        case 'favorites': require_once PROTECTED_DIR.'games/favorites.php'; break;

        default: require_once PROTECTED_DIR.'normal/pagenotfound.php'; break;
    }


?>