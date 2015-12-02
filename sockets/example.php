<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 20.10.2015
 * Time: 23:13
 */
$fp = fsockopen ("lessons", 80);

if ($fp) {
    fwrite($fp, "GET /test.html HTTP/1.1\r\nHOST: lessons\r\n\r\n");

    while (!feof($fp)) {
        print fread($fp,256);
    }

    fclose ($fp);
} else {
    print "Fatal error\n";
}
