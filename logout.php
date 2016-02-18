

<?php include('includes/config.php');

if(!isset($_SESSION['pseudo'])) {
header('Location: index.php');
}

?>


<?php
session_destroy();
header('Location: index.php');
?>
