<?php
define('PATH_LOG', '../filework/log/log');
//include '../filework/log/log.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <table width="10%" align="right">
        <tr align="right">
            <td>
                <a href="sign_in.php">Sign in</a>
            </td>
            <td>
                <a href="registration.php">Sign up</a>
            </td>
        </tr>
    </table>
    <table border="1" width=100%>
    <?php
        $contents = ['header', 'content', 'footer'];
        $menu = [
            'index' => ['href' => 'index.php', 'title' => 'Home'],
            'about' => ['href' => 'index.php?page=about', 'title' => 'About'],
            'contact' => ['href' => 'index.php?page=contact', 'title' => 'Contact'],
            'multi_table' => ['href' => 'index.php?page=multi_table', 'title' => 'Multiplication Table'],
            'calculator' => ['href' => 'index.php?page=calculator', 'title' => 'Calculator'],
    //        'log' => ['href' => 'index.php?page=log', 'title' => 'Logs'],
        ];
        foreach ($contents as $content) {
    ?>
            <tr align='center'>
    <?php
            if ($content == 'content') { ?>
            <td width="20%">
                <table border="1" width="100%">
            <?php
                foreach($menu as $option) {
            ?>
                    <tr>
                        <td align='center'>
                            <a href="<?php echo $option['href'] ?>"><?php echo $option['title'] ?></td></a>
                    </tr>
            <?php
            }
            ?>
                        </table>
                    </td>
                    <td>
                        <?php
                        if (isset($_GET['page'])) {
                            include $_GET['page'] . '.php';
                        } else {
                            echo 'Content';
                        }
                        ?>
                    </td>
                <?php
                } else {
                    ?>
                    <td colspan='2'><?php echo $content; ?></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>