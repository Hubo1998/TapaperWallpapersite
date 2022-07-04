<?php

	// =======================================
	// funkcja zwraca wynik prostego zapytania (zwracajacego DOKLADNIE jedno pole - jak funkcja COUNT(*)
	// Ravenheart
	//
	function DBShortQuery($query) {
		global $link;
		$res = "";
		if (!$link) die ('Connection broken'); else {
			$result = mysqli_query($link, $query);
			if ($result===false) {
				echo "<p>".mysqli_error($link)."</p>";
//				die ("Query failed: [$query]");
			}
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$res = $row[0];								
		}
		return $res;
	};

	
	// =======================================
	// funkcja zwraca wynik zapytania w postaci tabeli [n, ilosc_pol]
	// UWAGA: przy przetwarzaniu w pliku glównym nalezy stosowac postac {$table[x][y]}
	// Ravenheart
	//
	function DBArrayQuery($query) {	
		global $link;
		if (!$link) die ('Connection broken'); else {
			$result = mysqli_query($link, $query);
			if ($result===false) {
				echo "<p>".mysqli_error($link)."</p>";
//				die ("Query failed: [$query]");
			}
			$rows = mysqli_fetch_all($result, MYSQLI_NUM);		
		}
		if ($rows==NULL) $rows = array();
    	return $rows;	
	};

	function DumpResult($x) {
		echo "<table>";
		foreach ($x as $wiersz) {
		  echo "<tr>";
  		  foreach ($wiersz as $kom)
		    echo "<td>$kom</td>";
  		  echo "<tr>";			
		}
		echo "</table>";			
	}

	// =======================================
	// ta funkcja wysyla do bazy zapytanie nie zwracajace wyniku
	// Ravenheart
	//
	function DBExecQuery ($query)	{
		global $link;
		$result = @mysqli_query($link,$query)  or die ("<br/>Zapytanie do bazy query nie jest poprawne.");			
		//$rest = @mysqli_insert_id();
	   	return $rest;		   
	}; 

	$link = mysqli_connect($host, $user, $pass, $db);
	if (!$link) {
		echo "Using: $user, $host, $pass, $db";
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		//die();
		//echo '<meta http-equiv="refresh" content="0; url=error.php">';
	}  //else echo "Connection OK!";
	
?>