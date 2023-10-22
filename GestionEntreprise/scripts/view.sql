create or replace view v_BrancheDepartement as
    select Branche.libelle as branche, Branche.mgr, Departement.nomDepartement as departement,bd.*
    from BrancheDepartement as bd
        join Branche on Branche.idBranche= bd.idBranche
        join Departement on Departement.idDepartement = bd.idDepartement;


create or replace view v_BesoinPersonnelle as
    select bd.branche ,bd.idBranche, bd.departement ,bd.idDepartement, bd.njhparpersonne,bp.*
    from BesoinPersonnelle bp
        join v_BrancheDepartement bd on bd.idBrancheDepartement=bp.idBrancheDepartement;

create or replace view v_Critere as
    select bp.branche,bp.idbranche,bp.iddepartement,bp.departement,bp.idBrancheDepartement,bp.njHParPersonne,bp.dateInsertion,
    Diplome.libelle as diplome,Diplome.etat as etatDiplome,Nationnalite.libelle as nationnalite,Experience.anneeExperience as Experience, Experience.etat as etatExperience,
    Filiere.libelle as filiere,sm.libelle as situation,Critere.*
    from Critere 
        join v_BesoinPersonnelle bp on bp.idBesoin=Critere.idBesoin
        join Diplome on Diplome.idDiplome=Critere.idDiplome
        join Nationnalite on Nationnalite.idNationnalite=Critere.idNationnalite
        join Experience on Experience.idExperience=Critere.idExperience 
        join Filiere on Filiere.idFiliere = Critere.idFiliere
        join SituationMatrimoniale sm on sm.idSituation=Critere.idSituation; 

create or replace view v_CritereCoefficient as 
    select vc.idbesoin,cc.idCritereCoefficient,vc.idCritere,vc.idDiplome,vc.diplome,vc.etatDiplome,cc.diplome as noteDiplome,
    vc.sexe,cc.sexe as noteSexe,
    vc.idNationnalite,vc.nationnalite,cc.nationnalite as noteNationnalite,
    vc.idExperience,vc.Experience,cc.Experience as noteExperience,vc.etatExperience,
    vc.idFiliere,vc.filiere,cc.filiere as noteFiliere,cc.pourcentageNote,
    vc.idbranche,vc.branche,vc.iddepartement,vc.departement,vc.idBrancheDepartement,vc.njHParPersonne,vc.dateInsertion,
    vc.age as agemin,vc.ageFin as ageMax,cc.age as noteAge,vc.idSituation,vc.situation,cc.situation as noteSituation,vc.dateFinDepot
    from CritereCoefficient cc
        join v_Critere vc on vc.idBesoin=cc.idBesoin;

------------------------ VUE QUESTION/REPONSES/V_BESOINSPERSONELLES ---------------------------------------------------
create or replace view v_QuestionsReponsesVBesoinPersonnelle as 
    select v_BesoinPersonnelle.idbranche, v_BesoinPersonnelle.branche, v_BesoinPersonnelle.iddepartement, v_BesoinPersonnelle.departement, v_BesoinPersonnelle.njhparpersonne, v_BesoinPersonnelle.idbesoin, v_BesoinPersonnelle.idbranchedepartement, v_BesoinPersonnelle.njhtravail, v_BesoinPersonnelle.dateinsertion, v_BesoinPersonnelle.genererannonce,
    Questions.idquestion, Questions.libelle as libellequestion, Questions.coefficient as coefficientquestion,
    Reponses.idreponse, Reponses.libelle as libellereponse, Reponses.bonnereponse
    from v_BesoinPersonnelle
        join Questions on Questions.idbesoin = v_BesoinPersonnelle.idbesoin
        join Reponses on Reponses.idquestion = Questions.idquestion ;

-- ------------------------ VUE QUESTIONS & REPONSES EVALUATION/EMPLOYE ---------------------------------------------------
-- create or replace view v_QuestionsReponsesEmployeEvaluation as 
--     select v_employeposte.*
--     QuestionsEvaluation.idquestionEvaluation, QuestionsEvaluation.libellEvaluatione as libellequestionEvaluation, QuestionsEvaluation.coefficient as coefficientquestion,
--     Reponses.idreponse, Reponses.libelle as libellereponse, Reponses.bonnereponse
--     from v_employeposte
--         join ReponsesEvaluation on ReponsesEvaluation.idemploye = v_employeposte.idemploye
--         join QuestionsEvaluation on QuestionsEvaluation.idbesoin = ReponsesEvaluation.idquestionEvaluation;


----------------------- VUE FORMULAIRERE TEST CANDIDAT/QUESTION/REPONSE ------------------------------------------
create or replace view v_FTCQuestionReponse as 
    select formulaireTestCandidat.idformulaireTestCandidat, formulaireTestCandidat.idcandidat,
    Questions.idquestion, Questions.coefficient, 
    Reponses.idreponse, Reponses.bonnereponse
    from formulaireTestCandidat
        join Reponses on Reponses.idreponse = formulaireTestCandidat.idreponse
        join Questions on Questions.idquestion = Reponses.idquestion;

create or replace view v_ServiceServicesCandidat as
    select Service.idservice, Service.libelle, Service.valeur,
    ServiceCandidat.idServiceCandidat, ServiceCandidat.idContratEssai
    from Service
        join ServiceCandidat on ServiceCandidat.idservice = Service.idService;

create or replace view v_avantagedepartement as
    select avantageNature.idavantageNature, avantageNature.libelle,
    AvantageDepartement.idAvantageDepartement, AvantageDepartement.idBrancheDepartement
    from AvantageDepartement
        join avantageNature on AvantageNature.idAvantageNature = AvantageDepartement.idAvantage;

create or replace view v_BesoinPersonnelleAnnonce as 
    select bp.*,annonce.idannonce,annonce.texte from besoinPersonnelle as bp
        left join annonce  on bp.idBesoin=annonce.idBesoin;

-- ----------------------------------------
create or replace view v_employePoste as
    select emp.*,p.idBrancheDepartement,p.dateEmbauche,bd.iddepartement,bd.departement,bd.branche,bd.mgr,mission,DescriptionPost  from employe as emp
        join posteEmploye as p on emp.idEmploye=p.idEmploye
        join v_BrancheDepartement as bd on p.idBrancheDepartement=bd.idBrancheDepartement;

create or replace view v_BesoinPersonnelleAnnonceDetails as
    select bpa.*,bd.idDepartement,bd.departement,bd.idBranche,bd.branche,idEmploye,c.njHParPersonne,datefindepot
    from v_BesoinPersonnelleAnnonce as bpa 
        join v_BrancheDepartement as bd on bd.idBrancheDepartement=bpa.idBrancheDepartement
        left join v_critere as c on c.idBesoin=bpa.idBesoin
        left join v_employePoste as emp on emp.idDepartement=bd.idDepartement;

create or replace view v_candidatEntretien as
    select c.*,entretien.heuredebut,entretien.heurefin,entretien.jour,bd.idDepartement from candidat as c
        left join entretien  on c.idCandidat=entretien.idCandidat
        left join annonce on annonce.idAnnonce=c.idAnnonce
        join besoinPersonnelle as bp on annonce.idBesoin=bp.idBesoin
        join brancheDepartement as bd on bd.idBrancheDepartement=bp.idBrancheDepartement;

-- create view v_brancheDepartementEmploye as
-- select emp.*,bd.idBranche,branche,idBrancheDepartement,categorie,mission,DescriptionPost from 
-- v_employe_Poste as emp join brancheDepartement as bd on bd.idBrancheDepartement.emp.idBrancheDepartement;


-- ---------------------------------CANDIDAT-----------------------------------------------------
create or replace view v_candidat as 
  select c.*,vb.branche,vb.departement,
    diplome.libelle as diplome,experience.anneeExperience,ville.ville ,filiere.libelle as filiere,Nationnalite.libelle as nationnalite
    from Candidat c
        join diplome on c.iddiplome=diplome.idDiplome
        join experience on c.idexperience=experience.idExperience
        join ville on c.idville=Ville.idVille
        join filiere on c.idfiliere=filiere.idFiliere
        join Nationnalite on c.idNationnalite=Nationnalite.idnationnalite
        join SituationMatrimoniale sm on sm.idSituation=c.idSituation
        join Annonce on annonce.idannonce= c.idannonce 
        join v_BesoinPersonnelle vb on annonce.idbesoin= vb.idbesoin;

-- -------------------------------CONGE----------------------------------------------

create or replace view v_demandeCongeEmploye as
    select dc.idemploye,dc.datedebut as debutDemande,dc.datefin as finDemande,ce.* 
    from demandeConge as dc 
        join CongeEmploye as ce on ce.idDemandeConge=dc.idDemandeConge;

create or replace view v_retraitCongeEmploye as
    select rc.resteconge,rc.totalpris,dc.*
    from RetraitConge as rc 
        left join v_demandeCongeEmploye as dc on dc.idcongeEmploye=rc.idcongeEmploye;

------------------------------------- RETRAIT CONGE EMPLOYE ------------------------------------------------------------
create or replace view v_retraitCongeEmploye as
    select CongeEmploye.*,
    RetraitConge.idretraitconge, RetraitConge.resteconge, RetraitConge.totalpris,
    TypeConge.libelle, TypeConge.durreeJournalier, TypeConge.estDeductible
    from CongeEmploye
        join RetraitConge on RetraitConge.idcongeEmploye = CongeEmploye.idcongeEmploye
        join TypeConge on TypeConge.idTypeConge = CongeEmploye.idTypeConge;

----------------------------------- CONGE EMPLOYE ------------------------------------------------------------
create or replace view v_CongeEmploye as
    select CongeEmploye.*,
    DemandeConge.idemploye
    from CongeEmploye
        join DemandeConge on DemandeConge.iddemandeconge = CongeEmploye.iddemandeconge;

------------------------------------- DEMANDE EMPLOYE ------------------------------------------------------------
create or replace view v_DemandeConge as
    select DemandeConge.iddemandeconge, DemandeConge.idTypeConge, DemandeConge.datedebut, DemandeConge.datefin, DemandeConge.etat as etatvalidation,
    v_employePoste.*,
    TypeConge.libelle
    from DemandeConge
        join v_employePoste on v_employePoste.idEmploye = DemandeConge.idEmploye
        join TypeConge on TypeConge.idTypeConge = DemandeConge.idTypeConge;

------------------------------------- VUE EMPLOYE/TYPE PRIME/ PRIME EMPLOYEs----------------------------
create or replace view v_TypePrimeEmploye as
    select Employe.*,
    PrimeEmploye.idPrimeEmploye, PrimeEmploye.idTypePrime, PrimeEmploye.quantite,
    TypePrime.libelle, TypePrime.pourcentage
    from Employe 
        join PrimeEmploye on PrimeEmploye.idEmploye = Employe.idEmploye
        join TypePrime on TypePrime.idTypePrime = PrimeEmploye.idTypePrime;

------------------------------- VUE MOIS PRIME -------------------------------------------------
create or replace view MoisPrime as
    SELECT idprimeemploye, EXTRACT(MONTH FROM dateprime) AS moisprime 
    FROM PrimeEmploye;

------------------------------- VUE TYPEPTIMEEMPLOYE -------------------------------------------
create or replace view v_MoisTypePrimeEmploye as
    select v_TypePrimeEmploye.*,
    MoisPrime.moisprime
    from v_TypePrimeEmploye
        join MoisPrime on MoisPrime.idprimeemploye = v_TypePrimeEmploye.idprimeemploye;

