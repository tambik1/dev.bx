<?php

function dbConnect(array $config)
{
	$charset = "utf8";
	$db_init = mysqli_init();
	$db_connect = mysqli_real_connect($db_init, $config['dbInfo']['host'], $config['dbInfo']['userName'],
		$config['dbInfo']['password'], $config['dbInfo']['dbName']);
	$db_charset = mysqli_set_charset($db_init, $charset);
	if ($db_connect === false || $db_charset === false)
	{
		trigger_error("Не удалось подключиться к базе данны");
	}
	return $db_init;
}
