function all() {

	$.ajax({
		type: "GET",
		url: '../controlador/allevent.php',
		success: function (response) {
			console.log(response);

			response = $.parseJSON(response);


			var html = "";

			var x = '';

			var i = 0;

			let desc = false;

			var newresponse = ordenar(response, 'idDeporte', desc);

			if (response.length) {
				$.each(newresponse, function (key, value) {

					console.log(value.teamimg);
					
html +=	'<div class="container">'+
	value.nDeporte+
	'<div class="match">'+
		'<div class="match-header">'+
			'<div class="match-status">Live</div>'+
			'<div class="match-tournament"><img src="https://assets.codepen.io/285131/pl-logo.svg" />English Premier League</div>'+
			'<div class="match-actions">'+
				'<button class="btn-icon"><i class="material-icons-outlined">grade</i></button>'+
				'<button class="btn-icon"><i class="material-icons-outlined">add_alert</i></button>'+
			'</div>'+
		'</div>'+
		'<div class="match-content">'+
			'<div class="column">'+
				'<div class="team team--home">'+
					'<div class="team-logo">'+
						
						'<img src="../assets/teamimgs/'+ value.teamimg +'" />'+
					'</div>'+
					'<h2 class="team-name">'+ value.team0 +'</h2>'+
				'</div>'+
			'</div>'+
			'<div class="column">'+
				'<div class="match-details">'+
					'<div class="match-date">'+
						'3 May at <strong>17:30</strong>'+
					'</div>'+
					'<div class="match-score">'+
						'<span class="match-score-number match-score-number--leading">3</span>'+
						'<span class="match-score-divider">:</span>'+
						'<span class="match-score-number">1</span>'+
					'</div>'+
					'<div class="match-time-lapsed">'+
						'72'+
					'</div>'+
					'<div class="match-referee">'+
						'Referee: <strong>Mike dean</strong>'+
					'</div>'+
					
				'</div>'+
			'</div>'+
			'<div class="column">'+
				'<div class="team team--away">'+
					'<div class="team-logo">'+
				
						'<img src="https://resources.premierleague.com/premierleague/badges/t1.svg" />'+
					'</div>'+
					'<h2 class="team-name"> Man Utd</h2>'+
				'</div>'+
			'</div>'+
		'</div>'+
	'</div>'+
	'</div>'

					i++;


				});

			} else {
				html += '<div class="alert alert-warning">';
				html += 'No records found!';
				html += '</div>';
			}


			// Insert the HTML Template and display all employee records

			document.getElementById("eventosmostrados").innerHTML = html;
		}
	});


}




$(document).ready(function () {

	// Get all employee records
	all();


});


function ordenar(array, sort, desc) {

	array.sort(function (a, b) {

		if (a[sort] < b[sort]) return -1;
		if (a[sort] > b[sort]) return 1;
		return 0;
	});

	if (desc) array.reverse();
	return array;



}