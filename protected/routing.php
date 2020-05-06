<?php 
    if (!array_key_exists('P', $_GET) || empty($_GET['P']))
        $_GET['P'] = 'home';

    switch ($_GET['P']) {
        case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
        
        case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;
        case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;
        case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

        case 'browse': IsUserLoggedIn() ? require_once PROTECTED_DIR.'games/browse.php' : header('Location: index.php'); break;
        case 'favorites': IsUserLoggedIn() ? require_once PROTECTED_DIR.'games/favorites.php' : header('Location: index.php'); break;
        
        case 'add_game': IsUserLoggedIn() ? require_once PROTECTED_DIR.'games/add_game.php' : header('Location: index.php'); break;
        case 'user_list': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/list.php' : header('Location: index.php'); break;
        default: require_once PROTECTED_DIR.'normal/pagenotfound.php'; break;
    }


?>