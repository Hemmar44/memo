<?php require "layouts/header.php"; ?>

<body>
	<a href="memo.php">Memo</a>
	<div id="startGame">
		<button>Start</button>
		Stage: <span id="stage"> </span> / <?= count($file->directories()) ?>
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
				<?= $game->drawTable("challenge");?>
			</tbody>
		</table>
	</div>

	<div id="board"></div>



<?php require "layouts/footer.php"; ?>