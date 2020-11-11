<?php
/**
 * Open the database connection with the credentials from application/config/config.php
 */
function openDatabaseConnection()
{
	// set the (optional) options of the PDO connection. in this case, we set the fetch mode to
	// "objects", which means all results will be objects, like this: $result->user_name !
	// For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
	// @see http://www.php.net/manual/en/pdostatement.fetch.php
	$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME_APP, DB_PORT, DB_SOCKET);
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	return $link;
}

function getParameter($name) {
	if(isset($_GET[$name]) && $_GET[$name]!="")
		return $_GET[$name];
	return null;
}

function postParameter($name) {
	if(isset($_POST[$name]) && $_POST[$name]!="")
		return $_POST[$name];
	return null;
}
