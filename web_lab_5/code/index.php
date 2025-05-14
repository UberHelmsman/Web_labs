<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>not_avito</title>
</head>
<body>
    <form action="save.php" method="post">

        <label for="email">Email</label>
        <input type="email", name="email" required>
        <br>

        <label for="category">Category</label>
        <select name="category" required>
            <?php
            if ($dir = opendir('categories/')) {
                while (($file = readdir($dir)) !== false) {
                    if ($file != "." && $file != ".." && is_dir('categories/' . $file)) {
                        echo '<option value="' . htmlspecialchars($file) . '">' . htmlspecialchars(ucfirst($file)) . '</option>' . "\n";
                    }
                }
                closedir($dir);
            }
            ?>
        </select>
        <br>

        <label for="title">Title</label>
        <input type="text", name="title" required>
        <br>

        <label for="description"></label><br>
        <textarea rows="5" name="description" required></textarea>
        <br>

        <input type="submit" value="Save!">
    </form>
    <br>


    
    <table border="1">
        <thead>
            <th>Category</th>
            <th>Title</th>
            <th>Description</th>
        </thead>
        <tbody>
            <tr>
                <?php
                if ($op_d = opendir('categories/')) {
                    while (($ctg = readdir($op_d)) !== false) {
                        if ($ctg != "." && $ctg != ".." && is_dir('categories/' . $ctg)) {
                            if ($op_subd = opendir('categories/' . $ctg . '/')) {
                                while (($file = readdir($op_subd)) !== false) {
                                    if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
                                        
                                        $title = htmlspecialchars(pathinfo($file, PATHINFO_FILENAME));
                                        $category = htmlspecialchars(ucfirst($ctg));
                                        $description = htmlspecialchars(file_get_contents('categories/' . $ctg . '/' . $file));

                                        echo '<tr>';
                                        echo    '<td>' . $category . '</td>';      # Category
                                        echo    '<td>' . $title . '</td>';         # Title
                                        echo    '<td>' . $description . '</td>';   # Description
                                        echo '</tr>';
                                    }
                                }
                                closedir($op_subd);
                            }
                        }
                    }
                    closedir($op_d);
                    }
                ?>
            </tr>
        </tbody>
    </table>
</body>
</html>