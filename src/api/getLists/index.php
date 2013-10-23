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
		if (md5(Config::get('password')) != $_GET["md5pw"]) 
			die("MD5 password missmatch");
	} else if(array_key_exists('sha1pw', $_GET)) {
		if (sha1(Config::get('password')) != $_GET["sha1pw"]) 
			die("SHA1 password missmatch");
	} else
	 	die("Password set in this MTT-instance but no password specified in GET");
}

// Build SQL-query with $listname from above
$qry = $db->mysql_query("SELECT id,name FROM {$db->prefix}lists");
if(!$qry) {
	die("No such data or access denied");
}

// identifier
$i = 0;

while($row=mysql_fetch_array($qry)) {
	echo json_encode(array('id' . $i => $row[0],'name' . $i => $row[1]));
	$i++;
}
?>

