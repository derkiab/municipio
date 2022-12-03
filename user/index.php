<?php  

$page= isset($_GET['p'])?strtolower($_GET['p']): 'home';

//este fragmento de html contiene el head de nuesttra pagina web
require_once 'templates/header.php';

require_once 'pages/'.$page.'.php';

require_once 'templates/footer.php';
?>
