<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions/Reponses</title>
</head>
<body>
<h2>Questions pour le testes</h2>

<?php  // var_dump($besoin); ?>
            <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Formulaire de demande de conge</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                    <form action="<?php echo site_url("welcome/formulaireDemandeConge"); ?>" method="post">
  
                    <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Employe</label>
                            <select id="defaultSelect" class="form-select" name="idtypeconge">
                            <option>Choisir</option>
                            <?php for ($i=0; $i < count($employe); $i++) { ?>
                                <option value="<?php echo $employe[$i]->idemploye; ?>"><?php echo $employe[$i]->nom; ?> <?php echo $employe[$i]->prenom; ?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <?php for ($i=0; $i < count($prime); $i++) { ?>
                    <div class="mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> <?php echo $prime[$i]->libelle; ?> </label>
                    </div>
                    <?php } ?>
                    </form>
                    </div>
                  </div>
                </div>
            </div>

<script>
    function plusautrereponse(idbesoins, numeroquestion, numeroreponse) {
        var string = 'question' + numeroquestion + 'autre' + numeroreponse;
        // alert(string);
        var element = document.getElementById(string);
            if (element.value == "") {
                alert("Suggestion vide");
            } else {

                numeroreponseavant = numeroreponse;
                numeroreponse = numeroreponse + 1;
                numeromanaraka = numeroreponse + 1;

                var idspan = "" + idbesoins + numeroquestion+numeroreponse

                var nouveau = "<div class="mb-3"><input id="basic-default-fullname" class="form-control" type=text name='"+idbesoins+"question" + numeroquestion + "autre" + numeroreponse + "' id='question"+numeroquestion+"autre"+numeroreponse+"' placeholder='Autre " + numeroreponse + "'  "+"/> <span id='"+ idspan +"'><button type='button' id='"+ idspan +"'  onclick=plusautrereponse('" +idbesoins+ "'," + numeroquestion + "," + numeroreponse + ")>+</button></span>" +
                    "<div id='question" + numeroquestion + "autre" + numeromanaraka + "'></div>";

                string = 'question' + numeroquestion + 'autre' + numeroreponse;
                // alert(nouveau);

                var conteneur = document.getElementById(string);
                conteneur.innerHTML = nouveau;

                //Creation du bouton
                // let btn = document.createElement("button");
                // btn.innerHTML = "+";
                // btn.type = "button";

                // btn.addEventListener("click",()=>{
                //     plusautrereponse(idbesoins , numeroquestion,numeroreponse); 
                // });

                // var span = document.getElementById(idspan);
                // span.appendChild(btn);

                // alert("" + idbesoins + numeroquestion + "" + numeroreponseavant);

                // Suppression du span
                var ancienSpan = document.getElementById("" + idbesoins + numeroquestion + "" + numeroreponseavant);
                ancienSpan.remove();
            }   
    }
</script>
</html>