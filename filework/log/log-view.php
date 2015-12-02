<?php
if (file_exists(PATH_LOG)) {
    $log = file(PATH_LOG);
    if (is_array($log)) {
        echo '<ol>';
        foreach ($log as $line) {
//            list($tile, $page, $ref) = unserialize($line);
            list($time, $page, $ref) = explode('|', $line);
            $time = date('d-m-Y H:i:s', $time);
            ?>
            <li>
                <?php echo $time ?>: <?php echo $ref ?>  --->  <?php echo $page ?>
            </li>
<?php
        }
        echo '</ol>';
    }
}
