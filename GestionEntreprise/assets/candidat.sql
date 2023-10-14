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

ALTER TABLE Candidat 
ADD totalNote float;

ALTER TABLE Candidat
ADD moyenne float;



