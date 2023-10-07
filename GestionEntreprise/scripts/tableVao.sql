create sequence idAnnonce;
create table annonce(
    idAnnonce varchar(15) default concat('annonce'|| nextval('idAnnonce')) primary key,
    idBesoin varchar(15),
    texte text,
    foreign key(idBesoin) references besoinPersonnelle(idbesoin)
);

create sequence idVille;
create table ville(
    idVille varchar(15) default concat('ville'|| nextval('idVille')) primary key,
    ville varchar(20)
);

create sequence idEntreprise;
create table entreprise(
    idEntreprise varchar(15) default concat('entreprise'|| nextval('idEntreprise')) primary key,
    ville varchar(30),
    adresse varchar(30),
    numero varchar(30),
    fax varchar(30),
    foreign key(ville) references ville(idVille)
);

create sequence idAnnoncePardefaut;
create table annonceParDefaut(
    idAnnonceParDefaut varchar(15) default concat('annonceDefaut'|| nextval('idAnnonceParDefaut')) primary key,
    idEntreprise varchar(15),
    texte text,
    foreign key(idEntreprise) references entreprise(idEntreprise)
);
alter table annonceParDefaut 
ADD avantage text;

alter table entreprise
ADD nom varchar(30);

alter table Annonce
ADD nombreDemande int;

insert into entreprise(ville,adresse,numero,fax) values('ville1','village des jeux Ankorondrano','0202234456','67891234567');
insert into annonceParDefaut(idEntreprise,texte,avantage) values('entrepise1',
'Nous sommes à la recherche d_un(e) titreDuPoste passionné(e) et talentueux(se) pour rejoindre notre équipe 
chez _NomEntrepriseIci_. En tant que _NomPosteIci_, vous jouerez un rôle essentiel dans _DescriptionIci_.
 Vous travaillerez en étroite collaboration avec _DepartementIci_ pour _missionIci_.','Salaire compétitif; 
 ;Assurance santé;Formation continue;Equipe dinamique');

insert into annonce(idBesoin,texte) values('BES1','Annonce pour un dev');

insert into ville(ville) values('Antananarivo');

