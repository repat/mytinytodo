<?php
/**
\file: getLists/index.php
\author: repat<repat@repat.de>
\date: October 2013
\version: 1.0
\brief: Connects to MTT database and SELECTs id and names of lists, then returns it as JSON
*/

require_once('../../init.php');

// Test if PW is set
if (Config::get('password') != "") {
	if(array_key_exists('md5pw', $_GET)) {
		if (md5(Config::get('password')) != $_POST["md5pw"]) 
			die("MD5 password missmatch");
	} else if(array_key_exists('sha1pw', $_POST)) {
		if (sha1(Config::get('password')) != $_POST["sha1pw"]) 
			die("SHA1 password missmatch");
	} else
	 	die("Password set in this MTT-instance but no password specified in GET");
}

// Build SQL-query with $listname from above
$qry = $db->dq("INSERT INTO {$db->prefix}lists (field1, field2, field3, ...) 
		VALUES ('value1', 'value2','value3', ...)
		ON DUPLICATE KEY UPDATE
		field1='value1', field2='value2', field3='value3'");

if(!$qry) {
	die("No such data or access denied");
}


?>

