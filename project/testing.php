<?php
	function arrayToXML($arry, $rootElement = null, $xml = null)
	{
		$_xml = $xml;
		if ($_xml === null) 
		{
			$_xml = new SimpleXMLElement($rootElement != null ? $rootElement : '<root/>');
		}

		foreach($arry as $k => $v)
		{
			if (is_array($v)) 
			{
				arrayToXML($v, $k, $_xml->addChild($k));
			}
			else 
			{
				$_xml->addChild($k, $v);
				# code...
			}
		}
		return $_xml->asXML();
	}

	echo "Array to XML </br>" ;
	$my_array = array(array("name" => "Peter Parker", "email" => "peterparker@mail.com"), array("name" => "Clark Kent", "email" => "clarkkent@mail.com"), array("name" => "Harry Potter", "email" => "harrypotter@mail.com"));
	echo "</br>";
	print_r($my_array);
	echo arrayToXML($my_array);
?>