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

--------------------EXPERIENCE--------------------------
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

-- ----------------filiere------------------------
create sequence seqFiliere;
create table Filiere(
    idFiliere varchar(15) default concat('FIL' || nextval('seqFiliere')) primary key,
    libelle varchar(30)
);

-- ----------------Employe------------------------
create sequence seqEmploye;
create table employe(
    idEmploye varchar(15) default concat('emp'|| nextval('seqEmploye')) primary key,
    nom varchar(30),
    prenom varchar(30),
    adresse varchar(50),
    numero varchar(15),
    mail varchar(100),
    mdp varchar(100),
    idDepartement varchar(15),
    etat int, --ilay itenenana hoe inona no azony atao--
    foreign key(idDepartement) references departement(idDepartement)
);

-- ----------------AvantageNature------------------------
create sequence seqAvantageNature;
create table avantageNature(
    idAvantageNature varchar(30) default concat('avantageNature'|| nextval('seqAvantageNature')) primary key,
    libelle varchar(50)
);

-- ----------------AvantageDepartement------------------------
create sequence seqavantageDepartement;
create table avantageDepartement(
    idAvantageDepartement varchar(30) default concat('avantageDepart'|| nextval('seqAvantageDepartement')) primary key,
    idBrancheDepartement varchar(20),
    idAvantage varchar(30),
    foreign key(idBrancheDepartement) references BrancheDepartement(idBrancheDepartement),
    foreign key(idAvantage) references avantageNature(idAvantageNature)
);

-- ----------------Service------------------------
create sequence seqService;
create table service(
    idService varchar(15) default concat('service'|| nextval('seqService')) primary key,
    libelle  varchar(50),
    valeur float
);

-- ----------------ContratEssai------------------------
create sequence seqContratEssai;
create table contratEssai(
    idContratEssai varchar(15) default concat('contrEssai'|| nextval('seqContratEssai')) primary key,
    idEmploye varchar(15),
    salaireBrut float,
    salaireNet float,
    duree float,
    idBrancheDepartement varchar(15),
    foreign key(idEmploye) references employe(idemploye),
    foreign key(idBrancheDepartement) references BrancheDepartement(idBrancheDepartement)
);

-- ----------------ServiceCandidat------------------------
create sequence seqServiceCandidat;
create table serviceCandidat(
    idServiceCandidat varchar(15) default concat('serviceCand'|| nextval('seqServiceCandidat')) primary key,
    idService varchar(15),
    idContratEssai varchar(15),
    foreign key(idService) references service(idService),
    foreign key(idContratEssai) references contratEssai(idContratEssai)
);

-- ------------------SITUATION MATRIMONIALE---------------------------
create sequence seqSituation;
create table SituationMatrimoniale(
    idSituation varchar(20) default concat('SIT'|| nextval('seqSituation')) primary key,
    libelle varchar(30)
);

------------------------------ QUESTIONS ------------------------------
create sequence seqQuestion;
create table questions (
    idquestion varchar(20) default concat('QUE'|| nextval('seqQuestion')) primary key,
    idbesoin varchar(20),
    libelle varchar(30),
    coefficient int,
    Foreign Key (idbesoin) REFERENCES besoinpersonnelle(idbesoin)
);

------------------------------ REPONSES ------------------------------------
create sequence seqReponse;
create table reponses (
    idreponse varchar(20) default concat('REP'|| nextval('seqReponse')) primary key,
    idquestion varchar(20),
    libelle varchar(30),
    bonnereponse boolean,
    foreign key (idquestion) references questions(idquestion)
);

------------------------------ VILLE ------------------------------------------------------
create sequence seqVille;
create table ville(
    idVille varchar(15) default concat('ville'|| nextval('seqVille')) primary key,
    ville varchar(20)
);

--------------------------------ENTREPRISE------------------------------------------------
create sequence seqEntreprise;
create table entreprise(
    idEntreprise varchar(15) default concat('entreprise'|| nextval('seqEntreprise')) primary key,
    ville varchar(30),
    adresse varchar(30),
    numero varchar(30),
    fax varchar(30),
    foreign key(ville) references ville(idVille)
);

-- ----------------departementAdresse------------------------
create sequence seqDeptAdresse;
create table departementAdresse(
    idDepartementAdresse varchar(15) default concat('deptAdresse'|| nextval('seqDeptAdresse')) primary key,
    idDepartement varchar(15),
    idEntreprise varchar(15),
    adresse varchar(50),
    foreign key(idDepartement) references departement(idDepartement),
    foreign key(idEntreprise) references Entreprise(idEntreprise)
);

------------------------------ ANNONCE ----------------------------------------------------
create sequence seqAnnonce;
create table annonce(
    idAnnonce varchar(15) default concat('annonce'|| nextval('seqAnnonce')) primary key,
    idBesoin varchar(15),
    texte text,
    foreign key(idBesoin) references besoinPersonnelle(idbesoin)
);

----------------------------------- ANNONCE PAR DEFAUT ------------------------------------
create sequence idAnnoncePardefaut;
create table annonceParDefaut(
    idAnnonceParDefaut varchar(15) default concat('annonceDefaut'|| nextval('idAnnonceParDefaut')) primary key,
    idEntreprise varchar(15),
    texte text,
    foreign key(idEntreprise) references entreprise(idEntreprise)
);

------------------------------ CANDIDAT ---------------------------------------------------
create sequence seqCandidat;
create table Candidat(
    idCandidat varchar(30) default concat('CAN'|| nextval('seqCandidat')) primary key,
    nom varchar(50),
    prenom varchar(50),
    dateNaissance date,
    adresse varchar(50),
    email varchar(100),
    sexe varchar(10),
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
    idville varchar(30),
    idSituation varchar(20),
    datePostulation date default current_date,
    idAnnonce varchar(20),
    foreign key(idAnnonce) references Annonce(idAnnonce),
    foreign key(idSituation) references SituationMatrimoniale(idSituation),
    foreign key(iddiplome) references Diplome(idDiplome),
    foreign key(idexperience) references Experience(idExperience),
    foreign key(idnationnalite) references Nationnalite(idNationnalite),
    foreign key(idville) references ville(idVille),
    foreign key(idfiliere) references filiere(idFiliere)
);

-- ------------------Programme izany hoe ny lera fidirana sy firavana---------------------------
create sequence seqProgramme;
create table programme(
    idProgramme varchar(20) default concat('PRO'|| nextval('seqProgramme')) primary key,
    nomJour varchar(30),
    heureEntre timestamp,
    heureFin timestamp,
    idBrancheDepartement varchar(15),
    foreign key(idBrancheDepartement) references brancheDepartement(idBrancheDepartement)
);

-- ------------------ Pause misy ao ampiasana ---------------------------
create sequence seqPause;
create table pause(
    idPause varchar(20) default concat('PAU'|| nextval('seqPause')) primary key,
    heureDebut timestamp,
    heureFin timestamp,       
    idBrancheDepartement varchar(15),
    foreign key(idBrancheDepartement) references brancheDepartement(idBrancheDepartement)
);

-- ------------------Liste Entretien---------------------------
create sequence seqEntretien;
create table entretien(
    idEntretien varchar(20) default concat('ENT'|| nextval('seqEntretien')) primary key,
    idCandidat varchar(15),
    heureDebut varchar(30),
    heureFin timestamp,                              
    jour Date,
    foreign key(idCandidat) references candidat(idCandidat)
);

----------------------------- FORMULAIRE REPONSE CANDIDAT -----------------------------------------

create sequence seqFTC;
create table formulaireTestCandidat(
    idformulaireTestCandidat varchar(20) default concat('FTC'|| nextval('seqFTC')) primary key,
    idcandidat varchar(20),
    idreponse varchar(20),
    foreign key (idreponse) references reponses(idreponse),
    foreign key (idcandidat) references candidat(idcandidat)
);

------------------------------------SALAIRE-------------------------------------------------------
create sequence seqSalaire;
create table Salaire(
    idSalaire varchar(20) default concat('SAL'|| nextval('seqSalaire')) primary key,
    idBrancheDepartement varchar(20),
    montantbrute float,
    foreign key (idBrancheDepartement) references BrancheDepartement(idBrancheDepartement)
);

-- -------------------LANGUE CANDIDAT-----------------------
create sequence seqLangue;
create table Langue (
    idLangue varchar(30) default concat('LAN'|| nextval('seqLangue')) primary key,
    libelle varchar(30)
);

create table LangueCandidat(
    idCandidat varchar(30),
    idLangue varchar(30),
    foreign key(idCandidat) references Candidat(idCandidat),
    foreign key(idLangue) references Langue(idLangue)
);

--------------------------------TYPE CONGER -------------------------------------------------
create sequence seqTypeConge;
create table TypeConge(
    idTypeConge varchar(20) default concat('TYC'|| nextval('seqTypeConge')) primary key,
    libelle varchar(30),
    durreeJournalier float,
    estDeductible boolean
);

--------------------------------CONGE EMPLOYER ----------------------------------------------
create sequence seqCongeEmploye;
create table CongeEmploye(
    idCongeEmploye varchar(20) default concat('COE'|| nextval('seqCongeEmploye')) primary key,
    idemploye varchar(20),
    DebutConge timestamp,
    FinConge timestamp,
    idTypeConge varchar(20), 
    foreign key (idTypeConge) references TypeConge(idTypeConge),
    foreign key (idEmploye) references Employe(idEmploye)
);


-------------------------- RETRAIT CONGE ---------------------------------------------------
create sequence seqRetraitConge;
create table RetraitConge(
    idretraitconge varchar(20) default concat('RC'|| nextval('seqRetraitConge')) primary key,
    idcongeemploye varchar(20),
    resteconge float,
    totalpris float,
    foreign key (idcongeemploye) references CongeEmploye(idcongeemploye)
);


--------------------JourMois---------------------------
create sequence seqJourMois;
create table jourMois(
    idJourMois varchar(20) default concat('JMois'|| nextval('seqJourMois')) primary key,
    nomMois varchar(15),
    finJour varchar(3)
);

alter table jourMois 
ADD moisEnNombre varchar(3);

--------------------poste Employe---------------------------
create sequence seqPoste;
create table posteEmploye(
    idPoste varchar(20) default concat('JMois'|| nextval('seqJourMois')) primary key,
    idEmploye varchar(20),
    idBrancheDepartement varchar(20),
    dateEmbauche date,
    foreign key(idEmploye) references employe(idEmploye),
    foreign key(idBrancheDepartement) references brancheDepartement(idBrancheDepartement)
);


-- ----------------------QUALITE REQUISE----------------------------------------
create sequence seqQualite;
create table QualiteRequise(
    idQualite varchar(20) default concat('QUA' || nextval('seqQualite')) primary key,
    libelle varchar(100)
);

-- -----------------------IRSA--------------------------------

create sequence seqIRSA;
create table IRSA (
	idIRSA varchar(20) default concat('IRSA' || nextval('seqIRSA')) primary key,
	debut float,
	fin float,
	pourcentage float
);

-- ----------------AUTRE VALEUR SALAIRE--------------------
create sequence seqautre;
create table autreValeurSalaire(
	idAutre varchar(20) default concat('AUT'|| nextval('seqAutre')) primary key,
	libelle varchar(30),
	valeur float,
	nombre int,
	idEmploye varchar(20),
	date date,
	foreign key(idEmploye) references employe(idEmploye)
);

-- -------------------SMIG-----------------------
create sequence seqSmig;
create table smig(
    idSmig  varchar(20) default concat('SMI'|| nextval('seqSmig')) primary key,
    dateEntre date,
    valeur float
);


------------------------------ QUESTIONS EVALUATION------------------------------
-- create sequence seqQuestionEvaluation;
-- create table questionsEvluation (
--     idquestionEvaluation varchar(20) default concat('QEV'|| nextval('seqQuestionEvaluation')) primary key,
--     idBrancheDepartement varchar(20),
--     libelle varchar(30),
--     coefficient int,
--     Foreign Key (idBrancheDepartement) REFERENCES BrancheDepartement(idBrancheDepartement)
-- );

-- ------------------------------ REPONSES EVA------------------------------------
-- create sequence seqReponseEvaluation;
-- create table reponsesEvaluation (
--     idreponseEvaluation varchar(20) default concat('REV'|| nextval('seqReponseEvaluation')) primary key,
--     idquestionEvaluation varchar(20),
--     libelle varchar(30),
--     bonnereponse boolean,
--     foreign key (idquestionEValuation) references questionsEvaluation(idquestionEvaluation)
-- );

------------------------------ REPONSES EVALUATION EMPLOYE ------------------------------------
-- create sequence seqReponseEvaluationEmploye;
-- create table reponsesEvaluationEmploye (
--     idreponseEvaluationEmploye varchar(20) default concat('REE'|| nextval('seqReponseEvaluationEmploye')) primary key,
--     idemploye varchar(20),
--     idquestionEvaluation varchar(20),
--     idreponseEvaluation varchar(20),
--     foreign key (idquestionEvaluation) references questionsEvaluation(idquestionEvaluation),
--     foreign key (idreponseEvaluation) references reponsesEvaluation(idreponseEvaluation),
--     foreign key (idemploye) references employe(idemploye)
-- );

-------------------------------------DEMANDES CONGE ---------------------------------------
create sequence seqDemandeConge;
create table DemandeConge(
    idDemandeConge varchar(20) default concat('DEC'|| nextval('seqDemandeConge')) primary key,
    idEmploye varchar(20),
    idTypeConge varchar(20),
    datedebut timestamp,
    datefin timestamp,
    etat int default 0, 
    foreign key (idEmploye) references Employe(idEmploye),
    foreign key (idTypeConge) references TypeConge(idTypeConge)
);


------------------------------------- TYPE PRIME -------------------------------------------
create sequence seqTypePrime;
create table TypePrime(
    idTypePrime varchar(20) default concat('TYPR'|| nextval('seqTypePrime')) primary key,
    libelle varchar(60),
    pourcentage float
);

------------------------------------ PRIME EMPLOYE -----------------------------------------
create sequence seqPrimeEmploye;
create table PrimeEmploye(
    idPrimeEmploye varchar(20) default concat('PEMP'|| nextval('seqPrimeEmploye')) primary key,
    idEmploye varchar(60),
    idTypePrime varchar(20),
    quantite float
);

------------------------------------ ANCIENETE -----------------------------------------
create sequence seqAncienete;
create table Ancienete(
    idAncienete varchar(20) default concat('ANC'|| nextval('seqAncienete')) primary key,
    debut int,
    fin int,
    valeur float
);

--------------------------------------- ALTER ---------------------------------------------
ALTER TABLE Diplome
ADD etat int;

ALTER TABLE Experience
ADD etat int;

ALTER TABLE Critere 
ADD dateFinDepot Date;

ALTER TABLE BesoinPersonnelle 
ADD dateInsertion date default current_date;

alter table BesoinPersonnelle add njHTravail float;
alter table BesoinPersonnelle add genererAnnonce boolean default false;

ALTER TABLE CritereCoefficient 
ADD pourcentageNote float;

ALTER TABLE Critere 
ADD idFiliere varchar(15), 
ADD CONSTRAINT fk_Critere_Filiere FOREIGN KEY (idFiliere) REFERENCES Filiere(idFiliere);

ALTER TABLE CritereCoefficient
ADD Filiere float;

ALTER TABLE Filiere
ALTER COLUMN libelle TYPE VARCHAR(100);

ALTER TABLE BrancheDepartement
ADD DescriptionPost text;

ALTER TABLE BrancheDepartement
ADD Mission text;

ALTER TABLE Critere 
ADD idSituation varchar(20),
ADD CONSTRAINT fk_situation FOREIGN KEY (idSituation) REFERENCES SituationMatrimoniale(idSituation);

ALTER TABLE CritereCoefficient 
ADD situation float;

ALTER table Critere 
ADD age int;

ALTER table Critere 
ADD agefin int;

ALTER table Criterecoefficient
ADD age float;

alter table annonceParDefaut 
ADD avantage text;

alter table entreprise
ADD nom varchar(30);

alter table Annonce
ADD nombreDemande int;

alter table Employe 
ADD estessaie boolean;

-- -------------------NEW ALTER-------------------------------
ALTER TABLE Candidat 
ADD totalNote float;

ALTER TABLE Candidat
ADD moyenne float;

ALTER TABLE Candidat
ADD etat int;

ALTER TABLE Employe
ADD matricule varchar(100);

ALTER TABLE Employe
ADD dateEmbauche date;

ALTER TABLE Employe
ADD datedenaissance date;


alter table contratessai 
drop duree,
add datedebut date,
add datefin date;

alter table contratessai 
add salairebrut float,
add salairenet float;


--------------------15 Octobte---------------------------
alter table employe
drop iddepartement cascade;

alter table employe 
add categorie varchar(15);

alter table employe
drop dateembauche cascade;

alter table entretien
drop jour cascade;

alter table Branche
add mgr varchar(15),
ADD CONSTRAINT fk_branchedept FOREIGN KEY (mgr) REFERENCES Branche(idBranche);

alter table brancheDepartement
add rendement float;

-------------------------------
alter table congeemploye
add accordDG boolean,
add accordRH boolean;

alter table congeemploye
drop accordDG cascade,
drop accordRH cascade;

--------------------- FOURCHETTE ------------------------
alter table BrancheDepartement
ADD salaireMinimum float,
ADD salaireMAximum float;

alter table PrimeEmploye
ADD dateprime date;

alter table Salaire
drop idbranchedepartement,
add idemploye varchar(20),
add CONSTRAINT idemploye foreign key (idemploye) references employe(idemploye);

--------------------- 
alter table CongeEmploye
drop idemploye,
add iddemandeconge varchar(20),
add constraint iddemandeconge foreign key (iddemandeconge) references demandeconge(iddemandeconge);