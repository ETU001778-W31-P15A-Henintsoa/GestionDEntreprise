create sequence seqVille;
create table Ville(
    idVille varchar(30) default concat('REG'|| nextval('seqVille')) primary key,
    ville varchar(30)
);

create sequence seqCandidat;
create table Candidat(
    idCandidat varchar(30) default concat('CAN'|| nextval('seqCandidat')) primary key,
    nom varchar(30),
    prenom varchar(50),
    dateNaissance date,
    adresse varchar(30),
    email varchar(30),
    sexe varchar(10),
    idville varchar(30),
    telephone varchar(10),
    photo varchar(50),
    idnationnalite varchar(30),
    idexperience varchar(30),
    iddiplome varchar(30),
    diplomeFile varchar(50),
    dateDiplome date,
    attestation varchar(50),
    certificat varchar(50),
    idfiliere varchar(30),
    idannonce varchar(20),
    foreign key(iddiplome) references Diplome(idDiplome),
    foreign key(idexperience) references Experience(idExperience),
    foreign key(idnationnalite) references Nationnalite(idNationnalite),
    foreign key(idville) references ville(idVille),
    foreign key(idfiliere) references filiere(idFiliere)
);


INSERT INTO Ville (ville)
VALUES
    ('Antananarivo'),
    ('Toamasina'),
    ('Antsirabe'),
    ('Fianarantsoa'),
    ('Mahajanga'),
    ('Toliara'),
    ('Antsiranana'),
    ('Moramanga'),
    ('Ambanja'),
    ('Ambositra'),
    ('Mananjary'),
    ('Sambava'),
    ('Ambalavao'),
    ('Ambovombe'),
    ('Manakara');

create sequence seqLangue;
create table Langue (
    idLangue varchar(30) default concat('LAN'|| nextval('seqLangue')) primary key,
    libelle varchar(30)
);

INSERT INTO Langue (libelle) VALUES ('Anglais');
INSERT INTO Langue (libelle) VALUES ('Français');
INSERT INTO Langue (libelle) VALUES ('Espagnol');
INSERT INTO Langue (libelle) VALUES ('Malgache');

create table LangueCandidat(
    idCandidat varchar(30),
    idLangue varchar(30),
    foreign key(idCandidat) references Candidat(idCandidat),
    foreign key(idLangue) references Langue(idLangue)
);

create or replace view v_candidat as 
select c.*,
diplome.libelle as diplome,experience.anneeExperience,ville.ville ,filiere.libelle as filiere,Nationnalite.libelle as nationnalite
from Candidat c
join diplome on c.iddiplome=diplome.idDiplome
join experience on c.idexperience=experience.idExperience
join ville on c.idville=Ville.idVille
join filiere on c.idfiliere=filiere.idFiliere
join Nationnalite on c.idNationnalite=Nationnalite.idnationnalite
join SituationMatrimoniale sm on sm.idSituation=c.idSituation; 

create or replace view v_languecandidat as
select lc.*, l.libelle as langue
from LangueCandidat lc
join Candidat c on lc.idCandidat=c.idCandidat
join Langue l on l.idLangue=lc.idLangue;

INSERT INTO Experience(anneeExperience) VALUES(1),(2),(3),(4),(5);

create sequence seqNoteEntretien;
create table NoteEntretien(
    idNoteRecrutement varchar(15) de fault concat('NOT'|| nextval('seqLangue')) primary key,
    idCandidat varchar(15),
    note float,
    foreign key(idCandidat) references Candidat(idCandidat)
);

create sequence idAnnonce;
create table annonce(
    idAnnonce varchar(15) default concat('annonce'|| nextval('idAnnonce')) primary key,
    idBesoin varchar(15),
    texte text,
    foreign key(idBesoin) references BesoinPersonnelle(idBesoin)
);

create or replace view v_BesoinPersonnelleAnnonce as 
select bp.*,annonce.idannonce,annonce.texte from besoinPersonnelle as bp
left join annonce  on bp.idBesoin=annonce.idBesoin;

create or replace view v_AnnonceCritere as
select bp.* , 
vc.departement,vc.branche,vc.diplome,vc.noteDiplome,
vc.experience,vc.noteExperience,vc.filiere,vc.noteFiliere,
vc.sexe,vc.noteSexe,vc.nationnalite,vc.noteNationnalite,
vc.situation,vc.noteSituation,vc.age,vc.noteAge,
vc.pourcentageNote
from v_BesoinPersonnelleAnnonce bp
left join v_CritereCoefficient vc on bp.idBrancheDepartement=vc.idBrancheDepartement;


ALTER TABLE critere 
add ageFin int;

-- --------------------CRITERE-----------------------
INSERT INTO Critere(idbesoin,iddiplome,idnationnalite,idexperience,sexe,idfiliere,age,idSituation,dateFinDepot,ageFin) VALUES
('BES1','DIP4','NAT1','EXP3','1','FIL1',25,'SIT2','2023-10-10',50)

INSERT INTO CritereCoefficient(idbesoin,diplome,sexe,nationnalite,experience,filiere,situation,age,pourcentageNote) VALUES
('BES1',10,20,20,30,20,10,10,80);