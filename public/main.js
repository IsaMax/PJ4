$(document).ready(function(){


  // instanciation du livre via l'objet Sliders

	const livre = new Sliders($('.pages > div:nth-child(3)'),$('.boutonGauche'), $('.boutonDroit'), $('#livre'));

	livre.gestionEvenements();

	
	



});

