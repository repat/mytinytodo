<?php
/**
\file: getNumberOfLists/index.php
\author: repat<repat@repat.de>
\date: October 2013
\version: 1.0
\brief: Connects to MTT database and COUNTs the number of lists, then returns it as JSON
*/

require_once('../../init.php');

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
$qry = $db->dq("SELECT COUNT(*) FROM {$db->prefix}lists");
if(!$qry) {
	die("No such data or access denied");
}

// build arrays from SQL-query and output as JSON
if (Config::get('db') == 'sqlite') {
	$row=$qry->fetch_row($qry);
	echo json_encode(array('numberOfLists' => $row[0]));
} elseif (Config::get('db') == 'mysql') {
	$row=$qry->fetch_row();
	echo json_encode(array('numberOfLists' => $row[0]));
} else {
	echo "{}";
}
?>

