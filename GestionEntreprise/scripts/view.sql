create or replace view v_BrancheDepartement as
select Branche.libelle as branche, Departement.nomDepartement as departement,
bd.*
from BrancheDepartement  bd
join Branche on Branche.idBranche= bd.idBranche
join Departement on Departement.idDepartement = bd.idDepartement;

create or replace view v_BesoinPersonnelle as
select bd.branche,bd.idbranche,bd.iddepartement ,bd.departement , bd.njhparpersonne,bp.*
from BesoinPersonnelle bp
join v_BrancheDepartement bd on bd.idBrancheDepartement=bp.idBrancheDepartement;

create or replace view v_Critere as
select bp.branche,bp.idbranche,bp.iddepartement,bp.departement,bp.idBrancheDepartement,bp.njHParPersonne,bp.dateInsertion,
Diplome.libelle as diplome,Nationnalite.libelle as nationnalite,Experience.anneeExperience as Experience, 
Filiere.libelle as filiere,Critere.*
from Critere 
join v_BesoinPersonnelle bp on bp.idBesoin=Critere.idBesoin
join Diplome on Diplome.idDiplome=Critere.idDiplome
join Nationnalite on Nationnalite.idNationnalite=Critere.idNationnalite
join Experience on Experience.idExperience=Critere.idExperience 
join Filiere on Filiere.idFiliere = Critere.idFiliere;

create or replace view v_CritereCoefficient as 
select cc.idCritereCoefficient,vc.idDiplome,vc.diplome,cc.diplome as noteDiplome,
vc.sexe,cc.sexe as noteSexe,
vc.idNationnalite,vc.nationnalite,cc.nationnalite as noteNationnalite,
vc.idExperience,vc.Experience,cc.Experience as noteExperience,
vc.idFiliere,vc.filiere,cc.filiere as noteFiliere,cc.pourcentageNote,
vc.idbranche,vc.branche,vc.iddepartement,vc.departement,vc.idBrancheDepartement,vc.njHParPersonne,vc.dateInsertion
from CritereCoefficient cc
join v_Critere vc on vc.idBesoin=cc.idBesoin;