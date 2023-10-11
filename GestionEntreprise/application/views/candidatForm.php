<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire en Étapes</title>
</head>
<body>
    <form action="<?php echo site_url("Candidat/traitementForm"); ?>" method="post" id="multistep-form" enctype="multipart/form-data">

        <!-- STEP1 -->
        <div id="step1">
            <div><input type="text" name="idannonce" value="<?php echo $idannonce; ?>" hidden></div>
            <div>Nom<input type="text" name="nom"></div>
            <div>Prenom<input type="text" name="prenom"></div>
            <div>Adresse<input type="text" name="adresse"></div>
            <div>Email<input type="text" name="email"></div>
            <div id="date">
                Date de naissance:
                <input type="date" name="dtn" value="">
            </div>
            <div>
                Sexe:
                <select name="sexe">
                    <option value="1">homme</option>
                    <option value="0">femme</option>
                </select>
            </div>
            <div>
                Nationnalite:
                <select name="nationnalite">
                    <?php foreach($nationnalite as $nationnalites) { ?>
                    <option value="<?php echo $nationnalites['idnationnalite'] ?>"><?php echo $nationnalites['libelle']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                Ville:
                <select name="ville">
                    <?php foreach($ville as $villes) { ?>
                    <option value="<?php echo $villes['idville'] ?>"><?php echo $villes['ville']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>Telephone<input type="text" name="phone"></div>
            <div>Photo<input type="file" name="image"></div>
            <div>
                Situation Matrimoniale:
                <select name="situation">
                    <?php foreach($situation as $situations) { ?>
                    <option value="<?php echo $situations['idsituation'] ?>"><?php echo $situations['libelle']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <!-- STEP2 -->
        <div id="step2" style="display: none;">
            <div>
                Langue:
                <?php foreach($langue as $langues) { ?>
                    <p><?php echo $langues['libelle']; ?><input type="checkbox"  name="langue[]" value="<?php echo $langues['idlangue']; ?>"></p>
                <?php } ?>
            </div>
            <div>
                Filiere:
                <select name="filiere">
                    <?php foreach($filiere as $filieres) { ?>
                    <option value="<?php echo $filieres['idfiliere'] ?>"><?php echo $filieres['libelle']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>            
                Diplome:
                <select name="diplome">
                    <?php foreach($diplome as $diplomes) { ?>
                    <option value="<?php echo $diplomes['iddiplome']; ?>"><?php echo $diplomes['libelle']; ?></option>
                    <?php } ?>
                </select>
                <input type="file" name="diplomefile">
            </div>
            <div>
                Date d'obtension du Diplome:
                <input type="date" name="date">
            </div>
            <div>            
                Experience:
                <select name="experience">
                    <?php foreach($experience as $experiences) { ?>
                    <option value="<?php echo $experiences['idexperience'] ?>"><?php echo $experiences['anneeexperience']; ?>an(s) d'experience</option>
                    <?php } ?>
                </select>
            </div>
            <div>
                Attestation d'emploi:
                <input type="file" name="attestation">
            </div>
            <div>
                Certificat de travail:
                <input type="file" name="certificat">
            </div>
        </div>
        
        <div id="navigation">
            <button type="button" id="prevBtn" onclick="prevStep()">Précédent</button>
            <button type="button" id="nextBtn" onclick="nextStep()">Suivant</button>
            <input type="submit" id="submitBtn" value="Envoyer" style="display: none;">
        </div>
    </form>

    <script>
        let currentStep = 1;
        const form = document.getElementById("multistep-form");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");
        const submitBtn = document.getElementById("submitBtn");

        function showStep(step) {
            const steps = document.querySelectorAll('[id^="step"]');
            steps.forEach(s => s.style.display = "none");
            document.getElementById(`step${step}`).style.display = "block";

            if (step === 1) {
                prevBtn.style.display = "none";
            } else {
                prevBtn.style.display = "inline-block";
            }

            if (step === steps.length) {
                nextBtn.style.display = "none";
                submitBtn.style.display = "inline-block";
            } else {
                nextBtn.style.display = "inline-block";
                submitBtn.style.display = "none";
            }
        }

        function nextStep() {
            if (currentStep < 4) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        showStep(currentStep);
    </script>
</body>
</html>

