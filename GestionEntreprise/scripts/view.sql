create or replace view v_BrancheDepartement as
    select Branche.libelle as branche, Departement.nomDepartement as departement, bd.*
    from BrancheDepartement  bd
        join Branche on Branche.idBranche= bd.idBranche
        join Departement on Departement.idDepartement = bd.idDepartement;

create or replace view v_BesoinPersonnelle as
    select v_BrancheDepartement.branche, v_BrancheDepartement.idbranche, v_BrancheDepartement.iddepartement, v_BrancheDepartement.departement, v_BrancheDepartement.njhparpersonne, BesoinPersonnelle.*
    from BesoinPersonnelle
        join v_BrancheDepartement on v_BrancheDepartement.idBrancheDepartement=BesoinPersonnelle.idBrancheDepartement;

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
        join avantageNature on AvantageNature.idAvantageNature = AvantageDepartement.idAvantage