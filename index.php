<?
/**
* Glowan klasa projektu - Lwy
*/
class Lwy{

	/**
	* Generowanie Menu
	*/
	public function menu(){
		echo"<div id='menu'><ul>";
		echo "<li><a href='index.php?page=dodaj'>Dodaj Lwa</a></li><li><a href='index.php?page=zobacz'>Zobacz Lwy</a></li>";
		echo "</ul></div>";
	}
	
	/**
	* Akcje Menu
	*/
	public function zadania(){
		include ("config.php");
		require('polaczenie.php');

		/**
		* Pola do dodania lwa
		*/
		if($_GET['page'] == 'dodaj'){
			echo "<h2>Dodaj Lwa</h2>";
			echo "<form method='post' action='index.php?page=dodaje'>";
			echo "<br />Imie: <input type='text' name = 'imie' value='$imie' /><br />";
			echo "Wiek: <input type='text' name = 'wiek' value='$wiek' /><br />";
			echo "Cena: <input type='text' name = 'cena' value='$cena' /><br />";
			echo "<input type='submit' value='dodaj' /></form>";	
		}

		/**
		* Wyswietlenie wszytskich lwow
		*/
		else if($_GET['page'] == 'zobacz'){
			echo "<h2>Wszytskie Lwy</h2>";
			if($sukces == 1){
					$stmt = $pdo -> query('SELECT * FROM lwy;');
					echo "<table><tr><td>Imie</td><td>Wiek</td><td>Cena</td><td>Edytuj</td><td>Usun</td></tr>";
					foreach($stmt as $kolumna){
						$imie=$kolumna['imie'];
						$wiek=$kolumna['wiek'];
						$cena=$kolumna['cena'];
						echo "<tr>";
						echo "<td>$imie</td>";
						echo "<td>$wiek</td>";
						echo "<td>$cena</td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "</tr>";
					}
					$stmt->closeCursor();	
			}
			else{
				echo "Blad polaczenia z baza";
			}
		}

		/**
		* Wpisanie lwa do bazy
		*/
		else if($_GET['page'] == 'dodaje'){
			$imie = $_POST['imie'];
			$wiek = $_POST['wiek'];
			$cena = $_POST['cena'];
			if($sukces == 1){
				$stmt = $pdo -> query('INSERT INTO lwy (imie, wiek, cena) VALUES (\''.$imie.'\',\''.$wiek.'\',\''.$cena.'\')');   
				$stmt->closeCursor();
				echo "Lew dodany";
			}
			else{
				echo "Blad polaczenia z baza";
			}
		}		
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
			$lew->zadania();
		?>
	</body>
</html>