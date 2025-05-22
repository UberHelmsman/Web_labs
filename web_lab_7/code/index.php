<?php
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
function sanitizeInput($connection, $data) {
    return $connection->real_escape_string(trim($data));
}

if (isset($_POST['submit_form'])) {
    $user_email = sanitizeInput($mysqli, $_POST['user_email']);
    $ad_name = sanitizeInput($mysqli, $_POST['ad_name']);
    $ad_type = sanitizeInput($mysqli, $_POST['ad_type']);
    $ad_text = sanitizeInput($mysqli, $_POST['ad_text']);

    if (!empty($user_email) && !empty($ad_name)) {
        $sql = "INSERT INTO advertisements (user_email, ad_name, ad_text, ad_type, creation_date) 
                VALUES (?, ?, ?, ?, NOW())";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssss", $user_email, $ad_name, $ad_text, $ad_type);
        $stmt->execute();
        $stmt->close();
    }
}

$ads_list = array();
$fetch_query = "SELECT * FROM advertisements ORDER BY creation_date DESC";
if ($data_result = $mysqli->query($fetch_query)) {
    while ($record = $data_result->fetch_assoc()) {
        $ads_list[] = $record;
    }
    $data_result->free();
}
$mysqli->close();
?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Доска объявлений</title>
    <style>
        .form-container { margin-bottom: 20px; }
        .ads-table { border-collapse: collapse; width: 100%; }
        .ads-table td, .ads-table th { border: 1px solid #ddd; padding: 8px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Добавить новое объявление</h2>
        <form action="" method="post">
            <div>
                <label>Электронная почта:</label>
                <input type="email" name="user_email" required>
            </div>
            <div>
                <label>Заголовок объявления:</label>
                <input type="text" name="ad_name" required>
            </div>
            <div>
                <label>Тип объявления:</label>
                <select name="ad_type">
                    <option value="Охота">Охота</option>
                    <option value="Рыбалка">Рыбалка</option>
                    <option value="Туризм">Туризм</option>
                </select>
            </div>
            <div>
                <label>Текст объявления:</label><br>
                <textarea name="ad_text" rows="4" cols="50"></textarea>
            </div>
            <button type="submit" name="submit_form">Опубликовать</button>
        </form>
    </div>

    <div class="ads-container">
        <h2>Последние объявления</h2>
        <table class="ads-table">
            <thead>
                <tr>
                    <th>Контакт</th>
                    <th>Заголовок</th>
                    <th>Содержание</th>
                    <th>Категория</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($ads_list)): ?>
                    <?php foreach ($ads_list as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['user_email']) ?></td>
                        <td><?= htmlspecialchars($item['ad_name']) ?></td>
                        <td><?= nl2br(htmlspecialchars($item['ad_text'])) ?></td>
                        <td><?= htmlspecialchars($item['ad_type']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Нет доступных объявлений</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>