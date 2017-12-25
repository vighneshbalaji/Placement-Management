<?php

	function ranstring($len = 10,$char = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")
	{
		$charlen = strlen($char);
		$randstring = "";
		
		for($i = 0; $i < $len; $i++)
		{
			$randstring .= $char[rand(0,($charlen - 1))];
		}
		
		return $randstring;
	
	}

?>