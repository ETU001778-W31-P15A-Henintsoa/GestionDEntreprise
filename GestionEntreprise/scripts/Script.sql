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

alter table BesoinPersonnelle add njHTravail float;

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
