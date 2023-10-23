<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions/Reponses</title>
</head>
<body>
<!-- <h2>Questions pour le testes</h2> -->
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Questions Reponses</span> <?php echo $besoin[0]->branche; ?></h4>

            <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-body">
            <?php  // var_dump($besoin); ?>
                <form action="<?php echo site_url("welcome/formulaireQuestionsReponses"); ?>" method="post">
                <?php for ($i=0; $i<count($besoin); $i++){ ?>
                    <div >
                        <!-- <h3>Question pour le </h3> -->
                 <div class="mb-3">
                    <input id="basic-default-fullname" class="form-control" type="hidden" name="<?php echo $besoin[$i]->idbesoin; ?>" value="<?php echo $besoin[$i]->idbesoin; ?>">
                    <input id="basic-default-fullname" class="form-control" type="hidden" name="iddepartement" value="<?php echo $besoin[$i]->iddepartement; ?>">
            <!-- Question 1 -->
            <div id="question1">
                <h5>Question 1</h5>
                <div class="mb-3">
                    <input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question1" placeholder="Question1"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion1" placeholder="Coefficient"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question1reponse" placeholder="question1reponse1"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question1autre1" id="question1autre1" placeholder="Autre 1"><span id="<?php echo $besoin[$i]->idbesoin; ?>11"><button type="button" id="<?php echo $besoin[$i]->idbesoin; ?>11" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',1,1)">+</button></span></div>
                <p id='question1autre2'></p>
            </div>

            <!-- Question 2 -->
             <div id="question2">
                <h5>Question 2</h5>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question2" placeholder="Question2"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion2" placeholder="Coefficient"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question2reponse" placeholder="question2reponse1"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question2autre1" id="question2autre1" placeholder="Autre 1"><span id="<?php echo $besoin[$i]->idbesoin; ?>21"><button type="button" id="<?php echo $besoin[$i]->idbesoin; ?>21" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',2,1)">+</button></span></div>
                <p id='question2autre2'></p>
            </div>

             <!-- Question 3 -->
            <div id="question3">
                <h5>Question 3</h5>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question3" placeholder="Question3"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion3" placeholder="Coefficient"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question3reponse" placeholder="question3reponse1"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question3autre1" id="question3autre1" placeholder="Autre 1"><span id="<?php echo $besoin[$i]->idbesoin; ?>31"><button type="button" id="<?php echo $besoin[$i]->idbesoin; ?>31" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',3,1)">+</button></span></div>
                <p id='question3autre2'></p>
            </div>

            <!-- Question 4 -->
            <div id="question4">
                <h5>Question 4</h5>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question4" placeholder="Question4"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion4" placeholder="Coefficient"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question4reponse" placeholder="question4reponse1"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question4autre1" id="question4autre1" placeholder="Autre 1"><span id="<?php echo $besoin[$i]->idbesoin; ?>41"><button type="button" id="<?php echo $besoin[$i]->idbesoin; ?>41" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',4,1)">+</button></span></div>
                <p id='question4autre2'></p>
            </div>

            <!-- Question 5 -->
            <div id="question5">
                <h5>Question 5</h5>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question5" placeholder="Question5"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion5" placeholder="Coefficient"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question5reponse" placeholder="question5reponse1"></div>
                <div class="mb-3"><input id="basic-default-fullname" class="form-control" type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question5autre1" id="question5autre1" placeholder="Autre 1"><span id="<?php echo $besoin[$i]->idbesoin; ?>51"><button type="button" id="<?php echo $besoin[$i]->idbesoin; ?>51" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',5,1)">+</button></span></div>
                <p id='question5autre2'></p>
            </div>
    </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Soumetre</button>
    </form> 
</body>


<script>
    function plusautrereponse(idbesoins, numeroquestion, numeroreponse) {
        var string = 'question' + numeroquestion + 'autre' + numeroreponse;
        // alert(string);
        // var element = document.getElementById(string);
        //     if (element.value == "") {
        //         alert("Suggestion vide");
        //     } else {
                numeroreponseavant = numeroreponse;
                numeroreponse = numeroreponse + 1;
                numeromanaraka = numeroreponse + 1;

                var idspan = "" + idbesoins + numeroquestion+numeroreponse

                var nouveau = "<div class='mb-3'><input id='basic-default-fullname' class='form-control' type=text name='"+idbesoins+"question" + numeroquestion + "autre" + numeroreponse + "' id='question"+numeroquestion+"autre"+numeroreponse+"' placeholder='Autre " + numeroreponse + "'  "+"/> <span id='"+ idspan +"'><button type='button' id='"+ idspan +"'  onclick=plusautrereponse('" +idbesoins+ "'," + numeroquestion + "," + numeroreponse + ")>+</button></span>" +
                    "<p id='question" + numeroquestion + "autre" + numeromanaraka + "'></p>";

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
            // }   
    }
</script>
</html>