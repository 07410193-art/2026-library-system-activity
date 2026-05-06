<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Config\LibraryConfig;

$config = new LibraryConfig();



if (isset($_GET['act'])) {
    if ($_GET['act'] == 'add') {
        $lib->addBook($_POST['title'], $_POST['author'], $_POST['year'], $_POST['genre']);
    } elseif ($_GET['act'] == 'list') {
        $lib->listBooks();
    } elseif ($_GET['act'] == 'report') {
        $lib->generateReport();
    }
}

?>


@author — Kit Brian D. Banzuela
@since — Today's date (2006-05-06)
