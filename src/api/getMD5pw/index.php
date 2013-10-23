<?php
/**
\file: getMD5pw/index.php
\author: repat<repat@repat.de>
\date: October 2013
\version: 1.0
\brief: Returns the password as MD5-Hash if set, just debugging, don't use this with getTitles or getLists
*/
require_once('../../init.php');

if (Config::get('password') != "")
	echo json_encode(array('md5pw' =>md5(Config::get('password'))));
?>
