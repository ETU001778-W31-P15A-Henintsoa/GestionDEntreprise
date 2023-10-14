create sequence seqVille;
create table Ville(
    idVille varchar(20) default concat('ville'|| nextval('seqVille')) primary key,
    ville varchar(30)
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

create sequence seqSituation;
create table SituationMatrimoniale(
    idSituation varchar(20) default concat('SIT'|| nextval('seqSituation')) primary key,
    libelle varchar(30)
);

INSERT INTO SituationMatrimoniale (libelle)
VALUES ('Celibataire'),('Marie(e)'),('Divorce(e)'),('Veuf'),('En concubinage'),('Separe(e)');

create sequence seqLangue;
create table Langue (
    idLangue varchar(30) default concat('LAN'|| nextval('seqLangue')) primary key,
    libelle varchar(30)
);

INSERT INTO Langue (libelle) VALUES ('Anglais');
INSERT INTO Langue (libelle) VALUES ('Français');
INSERT INTO Langue (libelle) VALUES ('Espagnol');
INSERT INTO Langue (libelle) VALUES ('Malgache');

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
    foreign key(idSituation) references SituationMatrimoniale(idSituation),
    foreign key(iddiplome) references Diplome(idDiplome),
    foreign key(idexperience) references Experience(idExperience),
    foreign key(idnationnalite) references Nationnalite(idNationnalite),
    foreign key(idville) references ville(idVille),
    foreign key(idfiliere) references filiere(idFiliere)
);

create table LangueCandidat(
    idCandidat varchar(30),
    idLangue varchar(30),
    foreign key(idCandidat) references Candidat(idCandidat),
    foreign key(idLangue) references Langue(idLangue)
);

