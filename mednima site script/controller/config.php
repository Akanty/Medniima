<?php

 
	define("SERVER", getenv('DB_HOST') ?: "127.0.0.1");
	define("DB_PORT", (int) (getenv('DB_PORT') ?: 3306));
	define("DB_USER", getenv('DB_USER') ?: "root");
	define("DB_PASS", getenv('DB_PASS') ?: "");
	define("DB_NAME", getenv('DB_NAME') ?: "medniima_school");
	
	$db = new mysqli(SERVER, DB_USER, DB_PASS, DB_NAME, DB_PORT);
	
 

 ?>