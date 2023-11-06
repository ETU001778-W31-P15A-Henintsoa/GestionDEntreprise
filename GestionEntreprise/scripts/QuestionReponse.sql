create table questions (
    idquestion int primary key auto_increment,
    iddepatement varchar(15),
    libelle varchar(30),
    coefficient int
);

create table response (
    idreponse int primary key auto_increment,
    idquestion int,
    libelle varchar(30),
    foreign key (idquestion) references question(idquestion)
);

create table formulairecandidat(
    idformulairecandidat int primary key auto_increment,
    idcandidat varchar(30),
    idquestion varchar(30),
    idreponse varchar(30),
    foreign key () references (),
    foreign key () references (),
    foreign key () references ()
);

