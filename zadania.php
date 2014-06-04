<?
/******************************************************
* zadania.php 
* Plik odpowiadająca za CRUD do bazy danych
******************************************************/
		/**
		* Pola do dodania lwa
		*/
		if($_GET['page'] == 'dodaj'){
			echo "<h2>Dodaj Lwa</h2>";
			echo "<form method='post' action='index.php?page=dodaje'>";
			echo "<br />Imie: <input type='text' name = 'imie' value='$imie' /><br />";
			echo "Wiek: <input type='number' name = 'wiek' value='$wiek' /><br />";
			echo "Cena: <input type='number' name = 'cena' value='$cena' /><br />";
			echo "<input type='submit' value='dodaj' /></form>";	
		}

		/**
		* Wyswietlenie wszytskich lwow
		*/
		else if($_GET['page'] == 'zobacz'){
			echo "<h2>Wszystkie Lwy</h2>";
			if($sukces == 1){

					/**
					* Povranie z bazy i generowanie tabelki z lwami
					*/
					$stmt = $pdo -> query('SELECT * FROM lwy;');
					echo "<table>";
					echo "<tr>";
					echo "<th>Imie</th>";
					echo "<th>Wiek</th>";
					echo "<th>Cena</th>";
					echo "<th>Edytuj</th>";
					echo "<th>Usun</th>";
					echo "</tr>";

					foreach($stmt as $kolumna){
						$id=$kolumna['id'];
						$imie=$kolumna['imie'];
						$wiek=$kolumna['wiek'];
						$cena=$kolumna['cena'];
						echo "<tr>";
						echo "<th>$imie</th>";
						echo "<td>$wiek</td>";
						echo "<td>$cena</td>";
						echo "<td><a href='/milena/index.php?edytuj=".$id."' ><img class='buttons' src='img/ok.png' alt='ok' /></a></td>";
						echo "<td><a href='/milena/index.php?usun=".$id."' ><img class='buttons' src='img/no.png' alt='no' /></a></td>";
						echo "</tr>";
					}

					echo "</table>";
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
				echo "<h2>Lew dodany</h2>";
			}
			else{
				echo "Blad polaczenia z baza";
			}
		}

		/**
		* Usuniecie z bazy
		*/
		else if($_GET['usun']){
			$usun = $_GET['usun'];
			if($sukces == 1){
				$stmt = $pdo -> query("DELETE FROM lwy WHERE id = $usun");   
				$stmt->closeCursor();
				echo "<h2>Lew usuniety</h2>";
			}
			else{
				echo "Blad polaczenia z baza";
			}
		}

		/**
		* Pola do edycji lwa
		*/
		else if($_GET['edytuj']){
			$edytuj = $_GET['edytuj'];
			if($sukces == 1){
				$stmt = $pdo -> query("SELECT * FROM lwy WHERE id='$edytuj'");

				foreach($stmt as $kolumna){
					$id=$kolumna['id'];
					$imie=$kolumna['imie'];
					$wiek=$kolumna['wiek'];
					$cena=$kolumna['cena'];
				}

				$stmt->closeCursor();
				echo "<h2>Edytuj Lwa</h2>";
				echo "<form method='post' action='index.php?page=updejtuje'>";
				echo "<br />Imie: <input type='text' name = 'imie' value='$imie' /><br />";
				echo "Wiek: <input type='number' name = 'wiek' value='$wiek' /><br />";
				echo "Cena: <input type='number' name = 'cena' value='$cena' /><br />";
				echo "<input type='hidden' name='id' value='$id' />";
				echo "<input type='submit' value='dodaj' /></form>";		
			}
			else{
				echo "Blad polaczenia z baza";
			}
		}

		/**
		* Edycja lwa
		*/
		else if($_GET['page']=='updejtuje'){
			$id=$_POST['id'];
			$imie=$_POST['imie'];
			$wiek=$_POST['wiek'];
			$cena=$_POST['cena'];

			$stmt = $pdo -> query("UPDATE lwy SET imie='$imie', wiek='$wiek', cena='$cena' WHERE id='$id'");   
			$stmt->closeCursor();

			echo "<h2>Lew zaktualizowany</h2>";
		}
?>