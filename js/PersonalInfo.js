function validerChampsNUsager() {

	var leNom = document.getElementById("leNom").value;
	if (leNom === null || leNom === "") {
		alert("Veuillez compléter le champs Nom.");
		return false;
	}
	var lAdresse = document.getElementById("lAdresse").value;
	if (lAdresse === null || lAdresse === "") {
		alert("Veuillez compléter le champs Adresse.");
		return false;
	}

	var nombreInterets = 0;

	if (document.getElementById("Act").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Ang").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Arc").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Chi").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Des").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Gen").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Ing").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Ped").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Psy").checked === true) {
		nombreInterets++;
	}
	if (document.getElementById("Ser").checked === true) {
		nombreInterets++;
	}

	if (nombreInterets !== 4) {
		alert("Veuillez choisir exactement 4 intérêts.");
		return false;
	}

	var publicPrive = 0;

	if (document.getElementById("Public").checked === true) {
		publicPrive++;
	}
	if (document.getElementById("Prive").checked === true) {
		publicPrive++;
	}

	if (publicPrive !== 1) {
		alert("Veuillez choisir votre type de perfil: public ou privé.");
		return false;
	}

	var login = document.getElementById("tdDesc").value;
	if (login === null || login === "") {
		alert("Le champs Adresse courriel est obligatoire.");
		return false;
	}

	var password = document.getElementById("tdDesc2").value;
	if (password === null || password === "") {
		alert("Le champs Mot de passe est obligatoire.");
		return false;
	}

}

function validerChamps() {

	var login = document.getElementById("tdDesc").value;
	if (login === null || login === "") {
		alert("Le champs Adresse courriel est obligatoire.");
		return false;
	}
	var password = document.getElementById("tdDesc2").value;
	if (password === null || password === "") {
		alert("Le champs Mot de passe est obligatoire.");
		return false;
	}
}

function validationCourriel() {

	$.get('validationCourriel.php', {
		Data : document.getElementById("tdDesc").value
	}, function(donneesReponse) {
		if (donneesReponse > 0) {
			alert("Ce courriel existe déjà.");
		}
	});
}

