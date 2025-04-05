<?php session_start(); ?>
<!DOCTYPE html>
<html>
<body>
    <form method="POST" action="task4_data.php">
        ФИО: <input type="text" name="fio"><br>
        Адрес: <input type="text" name="address"><br>
        Индекс: <input type="text" name="zip"><br>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>