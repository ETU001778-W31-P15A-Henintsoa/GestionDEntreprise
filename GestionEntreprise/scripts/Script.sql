create database GestionEntreprise;
\c gestionentreprise

-- -----------------DEPARTEMENT--------------------------
create sequence seqDepartement;
create table Departement(
    idDepartement varchar(15) default concat('DEPT'|| nextval('seqDepartement')) primary key,
    nomDepartement varchar(50)
);

-- -----------------BRANCHE--------------------------
create sequence seqBranche;
create table Branche(
    idBranche varchar(15) default concat('BRA'|| nextval('seqBranche')) primary key,
    libelle varchar(50)
);

-- -----------------BRANCHE DEPARTEMENT--------------------------
create sequence seqBrancheDept;
create table BrancheDepartement(
    idBrancheDepartement varchar(15) default concat('BRA'|| nextval('seqBrancheDept')) primary key,
    idBranche varchar(15),
    idDepartement varchar(15),
    njHParPersonne float,
    foreign key(idBranche) references Branche(idBranche),
    foreign key(idDepartement) references Departement(idDepartement)
);

-- -----------------BESOIN PERSONNELLE--------------------------
create sequence seqBesoin;
create table BesoinPersonnelle(
    idBesoin varchar(15) default concat('BES'|| nextval('seqBesoin')) primary key,
    idBrancheDepartement varchar(15),
    foreign key(idBrancheDepartement) references BrancheDepartement(idBrancheDepartement)
);

-- -----------------DIPLOME--------------------------
create sequence seqDiplome;
create table Diplome(
    idDiplome varchar(15) default concat('DIP'|| nextval('seqDiplome')) primary key,
    libelle varchar(30)
);

-- -----------------NATIONNALITE--------------------------
create sequence seqNationnalite;
create table Nationnalite(
    idNationnalite varchar(15) default concat('NAT'|| nextval('seqNationnalite')) primary key,
    libelle varchar(30)
);

-- -----------------EXPERIENCE--------------------------
create sequence seqExperience;
create table Experience(
    idExperience varchar(15) default concat('EXP'|| nextval('seqExperience')) primary key,
    anneeExperience varchar(30)
);

-- -----------------CRITERE--------------------------
create sequence seqCritere;
create table Critere(
    idCritere varchar(15) default concat('CRI'|| nextval('seqCritere')) primary key,
    idBesoin varchar(15),
    idDiplome varchar(15),
    idNationnalite varchar(15),
    idExperience varchar(15),
    sexe varchar(10),
    foreign key(idBesoin) references BesoinPersonnelle(idBesoin),
    foreign key(idDiplome) references Diplome(idDiplome),
    foreign key(idNationnalite) references Nationnalite(idNationnalite),
    foreign key(idExperience) references Experience(idExperience)
);

-- -----------------CRITERE COEFFICIENT--------------------------
create sequence seqCritereCoeff;
create table CritereCoefficient(
    idCritereCoefficient varchar(15) default concat('CRI'|| nextval('seqDepartement')) primary key,
    idBesoin varchar(15),
    Diplome float,
    Sexe float,
    Nationnalite float,
    Experience float,
    foreign key(idBesoin) references BesoinPersonnelle(idBesoin)
);

-- ---------------Besoin personnelle-------------------
ALTER TABLE BesoinPersonnelle
ADD dateInsertion date default current_date;

alter table BesoinPersonnelle add njHTravail float;

ALTER TABLE CritereCoefficient 
ADD pourcentageNote float;

-- ----------------filiere------------------------
create sequence seqFiliere;
create table Filiere(
    idFiliere varchar(15) default concat('FIL' || nextval('seqFiliere')) primary key,
    libelle varchar(30)
);

ALTER TABLE Critere 
ADD idFiliere varchar(15), 
ADD CONSTRAINT fk_Critere_Filiere FOREIGN KEY (idFiliere) REFERENCES Filiere(idFiliere);

ALTER TABLE CritereCoefficient
ADD Filiere float;

ALTER TABLE Filiere
ALTER COLUMN libelle TYPE VARCHAR(100);

-- ------------------Branche departement--------------------------
ALTER TABLE BrancheDepartement
ADD DescriptionPost text;

ALTER TABLE BrancheDepartement
ADD Mission text;

ALTER TABLE Diplome
ADD etat int;

ALTER TABLE Experience
ADD etat int;

-- ------------------SITUATION MATRIMONIALE---------------------------
create sequence seqSituation;
create table SituationMatrimoniale(
    idSituation varchar(20) default concat('SIT'|| nextval('seqSituation')) primary key,
    libelle varchar(30)
);

INSERT INTO SituationMatrimoniale (libelle)
VALUES ('Celibataire'),('Marie(e)'),('Divorce(e)'),('Veuf'),('En concubinage'),('Separe(e)');

ALTER TABLE Critere 
ADD idSituation varchar(20),
ADD CONSTRAINT fk_situation FOREIGN KEY (idSituation) REFERENCES SituationMatrimoniale(idSituation);

ALTER TABLE CritereCoefficient 
ADD situation float;
