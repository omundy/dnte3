<?php


// init session
session_start();

// remove previous data
if (isset($_SESSION['dnt_user'])) {
	unset($_SESSION['dnt_user']);
	print 'previous session found, deleted';
} else {
	print 'no previous session found';
}

?>