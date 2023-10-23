
     <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Les Besoins de L'</span> entreprise</h4>

 			<div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Formulaire de Besoins</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
					<div class="card-body">
					<?php //var_dump($departement); ?>
					<form action="<?php echo site_url("welcome/formulaireBesoin"); ?>" method="POST">
						<div class="mb-3">	
							<label for="defaultSelect" class="form-label">Departement</label>
							<select class="form-select" name="iddepartement" id="maListeDeroulante">
								<option value="">Departement</option>
								<?php for($i=0; $i<count($departement); $i++){ ?>
									<option value="<?php echo $departement[$i]->iddepartement; ?>"><?php echo $departement[$i]->nomdepartement; ?></option>
								<?php } ?>
							</select>
							<div id="check"><div>
						</form>
				  </div>
				</div>
				</div>
			</div>
			</div>
	</div>

<script>

////////
function myFunction(table){
	let argument = table.split("//");
	var div = document.getElementById(argument[1]);
	div.innerHTML = "<label class='form-label' for='basic-default-fullname'>Besoins "+ argument[0] +"</label><input type='number' class='form-control' id='basic-default-fullname' name='B"+argument[1]+"'>";
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
				nouveau = nouveau + "<div class='mb-3'><input type='checkbox' name='"+tab[i].idbranchedepartement+"' id='"+tab[i].branche+"' onchange=myFunction('"+ tab[i].branche.split(" ").join("").concat("//")+tab[i].idbranchedepartement +"')><label>"+tab[i].branche+"</label></div>";
				div = div + "<div class='mb-3' id='"+ tab[i].idbranchedepartement +"'></div>";
			}
			nouveau = nouveau + div + "<button type='submit' class='btn btn-primary'>Soumetre</button>";
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