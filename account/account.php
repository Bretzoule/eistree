<?php
$active = "account";
$title = "EISTree - Mon compte.";
include($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php');
if (!isset($_SESSION['user'])) {
    $_SESSION['errorThrow'] = 'loginFirst';
    header('Location: /index.php');
    exit();
} else {
?>
<div id="page">
    <div id="centerPanel">
        <p id="mainTitle"><b>Mon compte</b></p>
    </div>
</div>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php');
}
?>