class Sliders {

	constructor(pageTourne, btnPrecedent, btnSuivant, blocDiapos) {

		//récupération du bloc diapos + boutons
		this.pageTourne = pageTourne[0];
		this.btnPrecedent = btnPrecedent;
		this.btnSuivant = btnSuivant; 

		this.blocDiapos = blocDiapos;
	}

	pageSuivante(e) {
		e.preventDefault();
		document.querySelector('.pages > div:nth-child(3)').className = "bordureDroite";
		window.requestAnimationFrame(function(time) {
			window.requestAnimationFrame(function(time) {
			  document.querySelector('.pages > div:nth-child(3)').className = "bordureDroite animPageSuivante";
			});
		  });
	}

	pagePrecedente(e) { 
		e.preventDefault();
		document.querySelector('.pages > div:nth-child(3)').className = "bordureGauche";
		window.requestAnimationFrame(function(time) {
			window.requestAnimationFrame(function(time) {
			  document.querySelector('.pages > div:nth-child(3)').className = "bordureGauche animPagePrecedente";
			});
		  });
	}	

	/* actionClavier(e) {

		switch(e.keyCode) {

			case 37:
				this.pagePrecedente();
				break;

			case 39:
				this.pageSuivante;
				break;
		}
	} */

	gestionEvenements() {
		$(this.btnSuivant).click(this.pageSuivante);
		$(this.btnPrecedent).click(this.pagePrecedente);
	//	$(document).keydown(this.actionClavier);
	}
}