<!DOCTYPE html>
<html lang="pl">
<head>
	<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
		<div class="title">Rejestracja</div>
		</header>
    <main>
		<form action = "zapisani.php" method = "post">
			<div class="player1">
			<div class="name">Zawodnik #1</div>
			Imię i Nazwisko: 
			<input type = "text" name = "name1">
			WK: 
			<input list = "WK" name = "WK1">
			<datalist id="WK">
				<option value=0>
				<option value=0.5>
				<option value=1>
				<option value=1.5>
				<option value=2>
				<option value=2.5>
				<option value=3>
				<option value=4>
				<option value=5>
				<option value=7>
				<option value=9>
				<option value=11>
				<option value=12>
				<option value=13>
				<option value=15>
				<option value=17>
				<option value=18>
				<option value=19>
				<option value=21>
				<option value=24>
			  </datalist>
			PID: 
			<input type = "text" name = "PID1" maxlength="5">
			</div>
			<div class="player2">
			<div class="name">Zawodnik #2</div>
			Imię i Nazwisko: 
			<input type = "text" name = "name2">
			WK: 
			<input list = "WK" name = "WK2">
			PID: 
			<input type = "text" name = "PID2" maxlength="5">
			</div>
			<button class = "saveButton" type="submit" value="Submit">Zapisz</button>
		</form>
    </main> 
</body>
</html>