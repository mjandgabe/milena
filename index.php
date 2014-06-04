<?
/******************************************************
* index.php 
* Glowny plik strony www
******************************************************/

/**
* Glowan klasa projektu - Lwy
*/
class Lwy{

	/**
	* Generowanie Menu
	*/
	public function menu(){
		echo"<div id='menu'>";
		echo "<span class='el_menu'><a href='index.php'>Strona Główna</a></span>";
		echo "<span class='el_menu'><a href='index.php?page=dodaj'>Dodaj Lwa</a></span>";
		echo "<span class='el_menu'><a href='index.php?page=zobacz'>Zobacz Lwy</a></span>";
		echo "</div>";
	}
	
	/**
	* Akcje Menu
	*/
	public function zadania(){
		include ("config.php");
		require('polaczenie.php');
		/**
		* PLik opisujacy ma ma sie dziac zaleznie od adresu
		*/
		include ("zadania.php");

	}
}
?>

<!-- Glowny HTML -->
<!DOCTYPE  html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Biale Lwy</title>

		<!-- Wyglad CSS -->
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	</head>
	
	<body>
		<?php
			/**
			* Wrzucenie plikow potrzebych do polaczenia z baza dannych MySQL
			*/
			include ("config.php");
			require('polaczenie.php');
		?>
				
		<!-- W skorcie - main "programu" -->
		<?php
			$lew = new Lwy;
			$lew->menu();
		?>
		<h1>Biale Lwy ;-)</h1>
		<?
			$lew->zadania();
		?>

		<!-- Obrazek lwa -->
		<div id='lew'>
			<img src="img/lew.png" alt="lew">
		</div>

		<!-- Stopka na dole strony -->
		<div id='stopka'>
			Wykonała: Władzia Milena Topka
		</div>
	</body>
</html>