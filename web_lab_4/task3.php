<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        <textarea name="text" rows="5" cols="50"></textarea><br>
        <button type="submit">посчитать</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $text = trim($_POST['text'] ?? '');
        
        if ($text !== '') {
            $words = [];
            foreach (preg_split('/\s+/', $text) as $word) {
                $cleanWord = strtolower(preg_replace('/[^a-zA-Zа-яё0-9]/u', '', $word));
                if ($cleanWord !== '') $words[] = $cleanWord;
            }
            
            echo "<p>всего слов: " . count($words) . "</p>";
            echo "<p>из них уникальных: " . count(array_unique($words)) . "</p>";
        } else {
            echo "<p>не введен текст</p>";
        }
    }
    ?>
</body>
</html>