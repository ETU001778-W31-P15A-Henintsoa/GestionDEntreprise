<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulaire de Besoin</title>
</head>

<body>
	<h3>Formulaire des Besoins du Departement</h3>
	<?php //var_dump($departement); ?>
	<form action="<?php echo site_url("welcome/formulaireBesoin"); ?>" method="POST">
		<select name="iddepartement" id="maListeDeroulante">
			<option value="">Departement</option>
			<?php for($i=0; $i<count($departement); $i++){ ?>
				<option value="<?php echo $departement[$i]->iddepartement; ?>"><?php echo $departement[$i]->nomdepartement; ?></option>
			<?php } ?>
		</select>
		<div id="check"><div>
	</form>

<script>

////////
function myFunction(table){
	let argument = table.split("//");
	var div = document.getElementById(argument[1]);
	div.innerHTML = "Besoins "+ argument[0] +" <input type='text' name='B"+argument[1]+"'>";
}

	////// Apparaitre CheckBox
	function sendData(valeur) {
		var xhr;
        try {
            xhr = new ActiveXObject('Msxml2.XMLHTTP');
        } catch (e) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e2) {
                try {
                    xhr = new XMLHttpRequest();
                } catch (e3) {
                    xhr = false;
                }
            }
        }
			
		// Définissez ce qui se passe si la soumission s'est opérée avec succès
		xhr.addEventListener("load", function(event) {
			let msg=(event.target.responseText!="")?event.target.responseText:"OK";

			// alert(msg);
			// alert(JSON.parse(msg)[0].idbranchedepartement);

			var tab = JSON.parse(msg);
			var nouveau = "<h5>Les Personnelles Necessaires </h5>";
			var div = "<h5>Besoins Personnelles </h5>"

			for(var i=0; i<tab.length; i++){
				nouveau = nouveau + "<div><input type='checkbox' name='"+tab[i].idbranchedepartement+"' id='"+tab[i].branche+"' onchange=myFunction('"+ tab[i].branche.split(" ").join("").concat("//")+tab[i].idbranchedepartement +"')>"+tab[i].branche+"</div>";
				div = div + "<div id='"+ tab[i].idbranchedepartement +"'></div>";
			}
			nouveau = nouveau + div + "<div><input type='submit' value='OK'</div>";
			// alert(nouveau);
			var boxcheck = document.getElementById('check');
			boxcheck.innerHTML = nouveau;
		});
	
		// Definissez ce qui se passe en cas d'erreur
		xhr.addEventListener("error", function(event) {
			alert('Oups! Quelque chose s\'est mal passé.');
		});
	
		// Configurez la requête
		xhr.open("GET","<?php echo site_url("formulairebesoins/brancheDepartement?valeur="); ?>"+valeur);
	
		// Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
		xhr.send("valeur="+valeur);
	}
	
	// Récupérez la liste déroulante par son ID
	var listeDeroulante = document.getElementById("maListeDeroulante");
		
	// Ajoutez un gestionnaire d'événements de clic à la liste déroulante
	listeDeroulante.addEventListener("change", function() {
		// Récupérez la valeur sélectionnée
		var optionSelectionnee = listeDeroulante.options[listeDeroulante.selectedIndex].value;
		sendData(optionSelectionnee);
	});

	//// Faire apparaitre Besoins
	function mabesoin(idbranchedepartement){
		alert(idbranchedepartement);
		// var apina = document.getElementById(idbranchedepartement);
	}
</script> 
    <!-- <div id="result"></div> -->
</body>
</html>
</body>
</html>