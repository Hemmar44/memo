<?php require "layouts/header.php"; ?>

<body>

	<a href="challenge.php">Challenge</a>
	<div id="selectGame">
		<?= $buttonsSet; ?>
	</div>
	
	<div id="moves"></div>
	<div id="score"></div>
	<div id="message">
		
	</div>
	<div id="name">
		<form>
			<input type="text" name="name" id="playerName" placeholder="Enter your name"/>
			<button name="submit" id="submitScore">Submit</button>
		</form>
	</div>
	<div id="submitMessage"></div>
	<div id="table">
		<table>
			<thead>
				<th>Rank</th>
				<th>Name</th>
				<th>Score</th>
				<th>Date</th>
			</thead>
			<tbody>
				<?= $game->drawTable("memo");?>
			</tbody>
		</table>
	</div>

	<div id="board">

	

	</div>



<?php require "layouts/footer.php"; ?>


