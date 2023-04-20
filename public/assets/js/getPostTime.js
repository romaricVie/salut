// Récupération et mise-à-jour de le date des articles

$(document).ready(function() {
	$(".timeago").timeago();
});

//Actualisation automatique de la date
$(".timeago").livequery(function(){
	$(this).timeago();
});