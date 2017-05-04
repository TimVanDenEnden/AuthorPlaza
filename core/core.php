<?php

function openDatabaseConnection($dbname) 
{
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
	
	$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . $dbname . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
	
	return $db;
}

function render($filename, $data = null) 
{
	// Added multi projects functions
	$location = explode('/', $filename);

	if ($data) {
		foreach ($data as $key => $value) {
			$$key = $value;
		}
	}

	require(ROOT . 'view/'.$location[0].'/templates/header.php');
	require(ROOT . 'view/' . $filename . '.php');
	require(ROOT . 'view/'.$location[0].'/templates/footer.php');
}