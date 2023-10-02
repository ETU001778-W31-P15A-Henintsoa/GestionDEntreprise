create sequence idAnnonce;
create table annonce(
    idAnnonce varchar(15) default concat('annonce'|| nextval('idAnnonce')) primary key,
    idBesoin varchar(15),
    texte text
);

create sequence idVille;
create table ville(
    idVille varchar(15) default concat('ville'|| nextval('idVille')) primary key,
    nomVille varchar(20),    
);

create sequence idEntreprise;
create table entreprise(
    idEntreprise varchar(15) default concat('entrepise'|| nextval('idEntreprise')) primary key,
    ville varchar(30),
    adresse varchar(30),
    numero varchar(30),
    fax varchar(30),
    foreign key(ville) references ville(idVille)
);

create sequence idAnnoncePardefaut
create table annonceParDefaut(
    idAnnonceParDefaut varchar(15) default concat('annonceDefaut'|| nextval('idAnnonceDefaut')) primary key,
    idEntreprise varchar(15),
);

insert into annonce(idBesoin,texte) values('BES1','Annonce pour un dev');

create or replace view v_BesoinPersonnelleAnnonce as 
select bp.*,annonce.idannonce,annonce.texte from besoinPersonnelle as bp
left join annonce  on bp.idBesoin=annonce.idBesoin;

create or replace view v_BesoinPersonnelleAnnonceDetails as
select bpa.*,bd.idDepartement,bd.departement,bd.idBranche,bd.branche
from v_BesoinPersonnelleAnnonce as bpa 
join v_BrancheDepartement as bd on bd.idBrancheDepartement=bpa.idBrancheDepartement;