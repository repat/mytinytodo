<?php
/**
\file: getTitles/index.php
\author: repat<repat@repat.de>
\date: October 2013
\version: 1.0
\brief: Connects to MTT database and SELECTs titles from given list name, then returns it as JSON
*/
require_once('../../init.php');

// Parameter via GET/default is "Todo"
if(array_key_exists('listname', $_GET))
	$listname = $_GET["listname"];
else
	$listname = "Todo";

// Test if PW is set
if (Config::get('password') != "") {
	if(array_key_exists('md5pw', $_GET)) {
		if (md5(Config::get('password')) != $_GET["md5pw"]) 
			die("MD5 password missmatch");
	} else if(array_key_exists('sha1pw', $_GET)) {
		if (sha1(Config::get('password')) != $_GET["sha1pw"]) 
			die("SHA1 password missmatch");
	} else
	 	die("Password set in this MTT-instance but no password specified in GET");
}

// Build SQL-query with $listname from above
$qry = $db->dq("SELECT title FROM {$db->prefix}todolist tdl, {$db->prefix}lists l WHERE l.id = (SELECT id FROM {$db->prefix}lists WHERE name = \"" . $listname . "\")");
if(!$qry) {
	die("No such data or access denied");
}

// identifier
$i = 0;

// Output as JSON
if (Config::get('db') == 'sqlite') {
	while($row=$qry->fetch_row($qry)) {
		echo json_encode(array('title' . $i => $row[0]));
		$i++;
	}
} elseif (Config::get('db') == 'mysql') {
	while($row=$qry->fetch_row()) {
		echo json_encode(array('title' . $i => $row[0]));
		$i++;
	}
} else {
	echo "{}";
}
?>



