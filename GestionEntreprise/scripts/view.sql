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