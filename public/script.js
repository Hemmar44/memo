$(function(){
	var compare_array = [];
	var streak_array = [];
	var matches = 0;
	var moves = 0; 
	var score = 0;
	var streak = 0;
	var quantity;
	var start = true;
	//challenge 
	var counter = 1
	var challenge = false;
	var sets;
	$("#stage").text(counter);

	//create 
	/*
	$("#creator").on("keyup", "#nameOfTheGame", function(){
		var value = $(this).val();
		if(value !=='') {
			$("#saveName").removeAttr("disabled");
		}
		else {
			$("#saveName").attr("disabled", "disabled");
		}
	});
	*/

	//select game

	$("#selectGame").on("click", "button", function(){
		var set = $(this).val();
		var name = $(this).text();
		matches = 0;
		moves = 0; 
		score = 0;
		streak_array = [];
		streak = 0;
		$("#message").html("");
		//console.log(streak);
		//$("#points").html("Matches: " + matches);
		$("#moves").html("Moves: " + moves);
		$("#score").html("Score: " + score);
		$("#name").hide();
		//$("#board").removeClass("disableDiv");
		
		//$(".cards").removeClass("disableDiv")
		$.ajax({
  			method: "POST",
  			url: "ajax/Select.php",
  			context: this,
  			data: { set: set, name: name},
			success: function( msg ) {
			var array = [];
			array = msg.split("||");
			//console.log(array);
			$("#board").html(array[0]);
			quantity = Number(array[1]);
    		}
    	});
	});

	$("#startGame").on("click", "button", function(){
		matches = 0;
		moves = 0;
		streak_array = [];
		streak = 0;
		if(!challenge) {
			counter = 1;
			score = 0;
			$("#stage").text(counter);
			$("#name").hide();
		}
		//alert(challenge);
		//$("#points").html("Matches: " + matches);
		$("#moves").html("Moves: " + moves);
		$("#score").html("Score: " + score);
		$("#message").html("");
		$.ajax({
  			method: "POST",
  			url: "ajax/Start.php",
  			context: this,
  			data: { counter: counter},
			success: function( msg ) {
			var array = [];
			array = msg.split("||");
			$("#board").html(array[0]);
			quantity = Number(array[1]);
			sets = Number(array[2]);
			challenge = true;
			$(this).attr("disabled","disabled").text("Start");
    		}
    	});
	});

	//score submit

	$("#submitScore").on("click", function(e){
		e.preventDefault();
		var name = $("#playerName").val();
		var table;
		if(counter!=1) {
			table = "challenge";
		}
		else {
			table = "memo";
		}
		challenge = false;
		$.ajax({
  			method: "POST",
  			url: "ajax/Submit.php",
  			context: this,
  			data: { name: name, score: score, table: table},
			success: function( msg ) {
			var array = [];
			array = msg.split("||");
    		$("#table table tbody").html(array[0]);
    		$("#submitMessage").html(array[1]).show().delay(5000).fadeOut(3000);
    		if(array.length < 3) {
			$("#name").hide();
			}
    		}
    	});
	})


	//game engine
	$("#board").on("click", ".cards", function() {
		var value = $(this).attr('data');
		//console.log(streak);
		
		compare_array.push(value);

		$(this).find(".frontImage").hide();
		$(this).find(".cardsImages").show();
    	$(this).addClass("disableDiv").delay(2000).queue(function(next){
    	next();
    	$(this).removeClass("disableDiv");
		});

		if(compare_array.length === 2) {
			if(compare_array[0] === compare_array[1]) {
				streak_array.push("yes");
				$(".cards").each(function(){
					$data = $(this).attr("data");
					if($data==compare_array[0] && $data == "1") {
						matches = quantity - 1;
					}
					else if($data==compare_array[0]) {
						$(this).addClass("done").off("click");
						}
					});
					matches++;
					score = score + 10;
					
					//$("#points").html("Matches: " + matches);
				}
			else{
				$(this).find(".cardsImages").show();
				streak_array.push("no");
				//alert(streak);
				$(".cards").each(function(){
					if(!$(this).hasClass("done")){
						$(this).find(".cardsImages").delay(1000).fadeOut(200).css("background-color","black");
						$(this).find(".frontImage").delay(1200).fadeIn().css("background-color","black");
						}
					});
				}
			moves++;
			$("#moves").html("Moves: " + moves);
			for(var i = 0; i<streak_array.length; i++) {
				streak = 0;
				if(streak_array[i] === "no") {
					//streak_array.pop();
					streak_array = [];
				}

				else{
					streak = streak_array.length - 1;
				}

			}

			if(moves <= 10) {
				if(streak === 1){
					score += 10 * 1.5;
				}
				else {
					score += 10 * streak;
				}

				
			}
			else if(moves <=20) {
				if(streak === 1){
					score += 10 * 1.3;
				}
				else {
					score += (10 * streak)/2;
				}
			}
			else {
				if(streak === 1){
					score += 10 * 1.1;
				}
				else {
					score += (10 * streak)/5;
				}
			}
			//console.log(streak_array);
			$("#score").html("Score: " + score);
			//console.log(compare_array);
			disableForaMoment("#board", 1200)
			var first = compare_array.length;
			compare_array = [];
		}

		if(matches==quantity) {
			if(challenge){
				if(counter<sets){
					alert("next round");
					counter++;
					$("#startGame").find("button").removeAttr("disabled");
					$("#stage").text(counter)
				}
				else{
					alert("game over");
					$("#name").show();
					challenge = false;
					$("#startGame").find("button").removeAttr("disabled").text("One more try?");
					$("#stage").text(counter)
				}
			}
		else {
			alert("game over");
			$("#name").show();
			}

		$(".cards").addClass("disableDiv");
		}

		$.ajax({
			method: "POST",
			url: "ajax/Message.php",
			context: this,
			data: { value: value, score: score, streak: streak, matches: matches, first: first, quantity: quantity },
			success: function( msg ) {
			$("#message").html(msg);
			}
    	})

	});

	function disableForaMoment(disClass, time) {
		$(disClass).addClass("disableDiv").delay(time).queue(function(next){
    	$(disClass).removeClass("disableDiv");
    	next();
    	});
	}
});