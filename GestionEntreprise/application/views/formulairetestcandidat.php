<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Candidat</title>
</head>
<body>
    <div>
        <h1> Formulaire de Test <?php echo $besoin[0]->branche; ?> </h1>
        <form action=<?php echo site_url("welcome/formulairetestcansidat"); ?> method="POST">
            <input type="hidden" name="idbesoin" value="<?php echo $besoin[0]->idbesoin; ?>">
            <!-- Question -->
            <?php 
            for($qr=0; $qr<count($questionreponses); $qr++){ ?>
                <div>
                    <label><i> <?php echo $qr+1; ?>.  </i><?php echo $questionreponses[$qr]['question']; ?></label>
                    <br>
                    <?php 
                    for($r=0; $r<count($questionreponses[$qr]['reponses']); $r++){ ?>
                        <input type="radio" name="<?php echo $questionreponses[$qr]['idquestion']; ?>" value="<?php echo  $questionreponses[$qr]['reponses'][$r]->idreponse; ?>" onchange="checker('<?php echo  $questionreponses[$qr]['idquestion']; ?>')">
                        <label><?php echo  $questionreponses[$qr]['reponses'][$r]->libelle; ?></label>
                    <?php } ?>
                </div>
                    <br/>
            <?php } ?>
            <input type="submit" value="OK">
        </form>
    </div>
</body>

<script>


function checker(nomQuestion){
    const cs = document.querySelectorAll(nomQuestion);
    // alert(nomQuestion);
    checkboxes.forEach(otherCheckbox => {
      if (otherCheckbox !== checkbox) {
        otherCheckbox.checked = false;
      }
    });
}
</script>
</html>