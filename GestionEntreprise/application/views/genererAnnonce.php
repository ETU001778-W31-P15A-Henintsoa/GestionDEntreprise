<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="<?php echo site_url("annonceController/generer"); ?>" method="post">
            <select name="idBesoin">
                <?php
                    for($i=0;$i<count($besoins);$i++){ ?>
                        <option value="<?php echo $besoins[$i]->idbesoin ?>"><?php echo $besoins[$i]->iddepartement ." ". $besoins[$i]->dateinsertion ?></option>
                    <?php }
                ?>
            </select>
            <input type="submit">
        </form>
</center>
</body>
</html>