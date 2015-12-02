<?php
/**
 * Database connection.
 *
 * @param string $hostname
 * @param string $username
 * @param string $password
 * @param string $database
 * @param int    $port
 *
 * @return mysqli
 */
function dbConnect($hostname = 'localhost', $username = 'root', $password = 'root', $database = 'mydb', $port = 3306) {
    if ($port != null) {
        return mysqli_connect($hostname, $username, $password, $database, $port);
    } else {
        return mysqli_connect($hostname, $username, $password, $database);
    }
}

/**
 * Get user by email.
 *
 * @param        $email
 * @param string $password
 *
 * @return array|null
 */
function getUser($email, $password = '')
{
    $resource = dbConnect();
    $query = "SELECT id, name, email, phone FROM users WHERE email = '$email'";
    if (!empty($password)) {
        $query .= " AND password = '$password'";
    }
    $query = mysqli_query($resource, $query);

    return mysqli_fetch_row($query);
}

/**
 * @param $username
 * @param $password
 * @param $email
 * @param $phone
 *
 * @return bool|string
 */
function saveUser($username, $password, $email, $phone)
{
    $resource = dbConnect();
    $query = "INSERT INTO users VALUES ('0','$username', '$password', '$email', '$phone', NOW());";
    if(mysqli_query($resource, $query)) {
        return true;
    } else {
        return mysqli_error($resource);
    }
}