<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $_SESSION['name']  = $_POST['name'];
}
?>
<form method="post">
    name: <input type="text" name="name">
    <br>
    email: <input type="text" name="email"> 
    <input type="submit" value="Submit">
</form>
<?php
if (isset($_SESSION['name'])) {
    echo "Γεια σου, " . htmlspecialchars($_SESSION['name']) . "!";
}
?>
<hr>
<?php
if (isset($_POST['delete'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<form method="post">
    <input type="submit" name="delete" value="Αποσυνδεση / Διαγραφη δεδομενων">
</form>

<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
}
?>
<form method="post">
    Όνομα: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Αποστολή">
</form>
<?php
if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    echo "Όνομα: " . htmlspecialchars($_SESSION['name']) . "<br>";
    echo "Email: " . htmlspecialchars($_SESSION['email']);
}
?>
<hr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) == "admin") {
    $_SESSION["logged_in"] = true;
}
?>
<?php if (isset($_SESSION["logged_in"])): ?>
    <p>Είσαι συνδεδεμένος ως admin.</p>
<?php else: ?>
    <form method="post">
        username: 
        <input type="text" name="username">
        <input type="submit" value="Login">
    </form>
<?php endif; ?>
<hr>