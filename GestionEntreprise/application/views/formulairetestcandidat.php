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
        <form action="" method="POST">

        </form>
    </div>
</body>

<script>
const checkboxes = document.querySelectorAll('.myCheckbox');

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', function() {
    // Désélectionnez toutes les autres cases à cocher
    checkboxes.forEach(otherCheckbox => {
      if (otherCheckbox !== checkbox) {
        otherCheckbox.checked = false;
      }
    });
  });
})
</script>
</html>