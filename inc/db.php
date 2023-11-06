<?php
if (!session_id()) session_start();  // So every user has a seperate database connection.

final class dbdriver
{         // No Inheritance.
	public static $connection;      // Static so it does not get initialized again and again.

	/* Database Connector Function. */

	function connect($host, $username, $password, $dbname)
	{
		if ($host == "" || $username == "" || $password == "" || $dbname == "") {
			echo "<br/><br/>Information insufficient for connection.";
			return false;
		} else {
			dbdriver::$connection = mysqli_connect($host, $username, $password, $dbname) or die("<br/><br/>Could not connect to database.");
			return (dbdriver::$connection);
		}
	}

	/* Database Query Function. */

	function query($querystring, $printerror = false)
	{
		if ($querystring != "" && dbdriver::$connection) {
			$querystring = mysqli_query(dbdriver::$connection, $querystring);

			if ($querystring)
				return $querystring;
			else {
				if ($printerror) echo mysqli_error(dbdriver::$connection);
				return false;
			}
		} else	echo "<br/><br/>Information insufficient for Query.";
	}

	/* Database Fetch Function. */

	function fetch($queryob)
	{
		if ($queryob) {
			$resobject = mysqli_fetch_assoc($queryob);
			return $resobject;
		} else return false;
	}

	/* Escaping Malicious Strings Function */

	function escape($string)
	{
		if ($string) {
			$string = mysqli_real_escape_string(dbdriver::$connection, $string);
			return $string;
		} else return false;
	}

	function numrows($query)
	{
		if ($query) return mysqli_num_rows($query);
		else return 0;
	}
}
