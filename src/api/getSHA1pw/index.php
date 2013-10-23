<?php
/**
\file: getSHA1pw/index.php
\author: repat<repat@repat.de>
\date: October 2013
\version: 1.0
\brief: Returns the Passwd as SHA1-Hash, just debugging, don't use this in production with getLists or getTitles
*/
require_once('../../init.php');

if (Config::get('password') != "")
	echo json_encode(array('sha1pw' =>sha1(Config::get('password'))));
?>
