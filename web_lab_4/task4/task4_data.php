<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['fio'] = $_POST['fio'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['zip'] = $_POST['zip'];
}
?>
<!DOCTYPE html>
<html>
<body>
    <?php if (isset($_SESSION['fio'])): ?>
        <h3>Данные:</h3>
        <p>ФИО: <?= $_SESSION['fio'] ?></p>
        <p>Адрес: <?= $_SESSION['address'] ?></p>
        <p>Индекс: <?= $_SESSION['zip'] ?></p>
    <?php else: ?>
        <p>Данных нет. <a href="task4_form.php">Дайте мне еще попытку ввести данные!!!!!!</a></p>
    <?php endif; ?>
</body>
</html>