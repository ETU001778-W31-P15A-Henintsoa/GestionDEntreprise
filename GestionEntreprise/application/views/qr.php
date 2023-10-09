<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions/question1Reponses</title>
</head>
<body>
<h2>Questions pour le testes</h2>

<?php  // var_dump($besoin); ?>
    <form action="<?php echo site_url("welcome/formulaireQuestionsReponses"); ?>" method="post">
    <?php for ($i=0; $i<count($besoin); $i++){ ?>
        <div>
            <h3>Question pour le <?php echo $besoin[$i]->branche; ?></h3>
            <input type="hidden" name="<?php echo $besoin[$i]->idbesoin; ?>" value="<?php echo $besoin[$i]->idbesoin; ?>">
            <input type="hidden" name="iddepartement" value="<?php echo $besoin[$i]->iddepartement; ?>">
            <!-- Question 1 -->
            <div id="question1">
                <h5>Question 1</h5>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question1" placeholder="Question1">
                <input type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion1" placeholder="Coefficient">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question1reponse" placeholder="question1reponse1">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question1autre1" id="question1autre1" placeholder="Autre 1"><span style="border: 1px solid;width:150px;height:50px;" id="11" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',1,1)">+</span>
                <div id='question1autre2'></div>
            </div>

            <!-- Question 2 -->
             <div id="question2">
                <h5>Question 2</h5>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question2" placeholder="Question2">
                <input type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion2" placeholder="Coefficient">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question2reponse" placeholder="question2reponse1">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question2autre1" id="question2autre1" placeholder="Autre 1"><span style="border: 1px solid;width:150px;height:50px;" id="21" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',2,1)">+</span>
                <div id='question2autre2'></div>
            </div>

             <!-- Question 3 -->
            <div id="question3">
                <h5>Question 3</h5>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question3" placeholder="Question3">
                <input type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion3" placeholder="Coefficient">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question3reponse" placeholder="question3reponse1">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question3autre1" id="question3autre1" placeholder="Autre 1"><span style="border: 1px solid;width:150px;height:50px;" id="31" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',3,1)">+</span>
                <div id='question3autre2'></div>
            </div>

            <!-- Question 4 -->
            <div id="question4">
                <h5>Question 4</h5>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question4" placeholder="Question4">
                <input type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion4" placeholder="Coefficient">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question4reponse" placeholder="question4reponse1">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question4autre1" id="question4autre1" placeholder="Autre 1"><span style="border: 1px solid;width:150px;height:50px;" id="41" onclick="plusautrereponse('<?php echo $besoin[$i]->idbesoin; ?>',4,1)">+</span>
                <div id='question4autre2'></div>
            </div>

            <!-- Question 5 -->
            <div id="question5">
                <h5>Question 5</h5>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question5" placeholder="Question5">
                <input type="number" name="<?php echo $besoin[$i]->idbesoin; ?>coeffquestion5" placeholder="Coefficient">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question5reponse" placeholder="question5reponse1">
                </br>
                <input type="text" name="<?php echo $besoin[$i]->idbesoin; ?>question5autre1" id="question5autre1" placeholder="Autre 1"><span style="border: 1px solid;width:100px;height=50px;" id="51" onclick="plusautrereponse(<?php echo $besoin[$i]->idbesoin; ?>,5,1)">+</span>
                <div id='question5autre2'></div>
            </div>
    </div>
    <?php } ?>
    <input type="submit" value="OK">
    </form> 
</body>


<script>
    function plusautrereponse(idbesoins, numeroquestion, numeroreponse) {
    var string = 'question' + numeroquestion + 'autre' + numeroreponse;
    var element = document.getElementById(string);
    if (element.value == "") {
        alert("Suggestion vide");
    } else {
        numeroreponseavant = numeroreponse;
        numeroreponse = numeroreponse + 1;
        numeromanaraka = numeroreponse + 1;
        
        var nouveau = "<input type='text' name='"+idbesoins+"question" + numeroquestion + "autre" + numeroreponse + "' id='question"+numeroquestion+"autre"+numeroreponseavant+"' placeholder= 'Autre " + numeroreponse + "'><span style='border: 1px solid;width:100px' onclick='plusautrereponse('"+ idbesoins + "', "+ numeroquestion + "," + numeroreponse + ")'>+</span>" +
            "<div id='question" + numeroquestion + "autre" + numeromanaraka + "'></div>";

        var bouton = document.getElementById("" + numeroquestion + "" + numeroreponse);
        string = 'question' + numeroquestion + 'autre' + numeroreponse;
        var conteneur = document.getElementById(string);
        conteneur.innerHTML = nouveau;
        bouton.remove()
    }
}
</script>
</html>