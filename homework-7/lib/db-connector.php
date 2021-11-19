<?php

function dbConnect (array $s): void
{
	$db_init = mysqli_init();
	mysqli_real_connect($s);
	if ($db_init === false)
	{
		trigger_error();
	}
	mysqli_set_charset(utf8);
}
