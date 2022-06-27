<?php
session_start(); //-- két kérés között a $_SESSION globális változóban őrizzük a munkamenetre vonatkozó adatokat
header('Content-Type: text/html; charset=utf-8'); //-- meghatározzuk a PHP script-el létrehozandó fájl jellegét
$pages = array(
       array('item' => "nyito", 'fa' => "fa-solid fa-house-chimney", 'text' => "Home", 'page' => "nyito.php", 'title' => "Home"),
       array('item' => "payment", 'fa' => "fa-solid fa-money-bill", 'text' => "Új befizetés", 'page' => "befizetes.php", 'title' => "Új befizetés"),
       array('item' => "adataim", 'fa' => "fa-solid fa-user-check", 'text' => "Adataim", 'page' => "adataim.php", 'title' => "Felhasználói adatok"),
       array('item' => "about", 'fa' => "fa-solid fa-book-open", 'text' => "A programról", 'page' => "about.php", 'title' => "A programról"),
       array('item' => "logout", 'fa' => "fa-solid fa-right-from-bracket", 'text' => "Kilépés", 'page' => "kilepes.php", 'title' => "Kilépés"),
);
$menupont= filter_input(INPUT_GET, "menu", FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_STRING);
$title = $title === null?"Home":$title;
require_once './DataBase.php';
$db = new DataBase();
require_once './tools.inc';
if($login = isset($_SESSION['user'])){
    $user = unserialize(serialize($_SESSION['user']));
}
?>
<!DOCTYPE html>
<!--
Keretrendszer nélküli PHP alkalmazás.
A kliens HTTP kérésekkel -- HttpRequest --  fordul a szerverhez, amelyekre a szerveren elhelyezett
szkript válaszol. A válasz következtében másik "állapot"-ba kerül a kliens.
pl.: befizetés menüpontra kattintva a befizetési lehetőséget tartalmazó oldal töltődik a kliens gépére.
A kérések rövidek és teljesítésükhöz szükséges adatok egy részét a szkript tartalmazza, tartalmazhatja
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/phpnativ.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/svg+xml" href="favicon.svg">
    </head>
    <body>
        <?php
        if($menupont=="regisztracio") {
            require_once './pages/regisztracio.php';
        } else if(!$login){
            require_once './pages/login.php';
        } else {
        ?>
        <nav>
            <ul>
                <?php
                    if(filter_var($menupont, FILTER_VALIDATE_URL)){
                        header("Location: ".$menupont);
                    }
                    $menupont = ($menupont == null)? "nyito" : $menupont;
                    foreach ($pages as $value) {
                    if (filter_var($value['item'], FILTER_VALIDATE_URL)) {
                        echo '<li><a href="'.$value['item'].'" target="_blank">'.($value['fa']?'<i class="'.$value['fa'].'"></i> ':'').$value['text'].'</a></li>';
                    }
                    else {
                        echo '<li'.($menupont==$value['item']?' class="active"':"").'><a href="index.php?menu='.$value['item'].'&title='.$value['title'].'">'.($value['fa']?'<i class="'.$value['fa'].'"></i> ':'').$value['text'].'</a> </li>';
                    }
                }
                ?>
            </ul>
        </nav>            
        <div class="page">
            <?php
                switch ($menupont) {
                    case "nyito":
                        require_once './pages/home.php';
                        break;
                    case "payment":
                        require_once './pages/befizetes.php';
                        break;
                    case "about":
                        require_once './pages/about.php';
                        break;
                    case "logout":
                        require_once './pages/kilepes.php';
                        break;
                    case "adataim":
                        require_once './pages/adataim.php';
                        break;
                    case "regisztracio":
                        require_once './pages/regisztracio.php';
                        break;
                    default :
                        break;
                }
            ?>
        </div>
        <footer> &COPY; 2022</footer>
        <?php
                } //-- body content vége --
        ?>
    </body>
</html>
