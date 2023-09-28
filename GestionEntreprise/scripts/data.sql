-- -----------------DEPARTEMENT---------------------
INSERT INTO Departement(nomDepartement) VALUES('Informatique');
INSERT INTO Departement (nomDepartement) VALUES ('Ressources Humaines');
INSERT INTO Departement (nomDepartement) VALUES ('Finances');
INSERT INTO Departement (nomDepartement) VALUES
    ('Ventes et marketing'),
    ('Logistique');

-- -----------------BRANCHE---------------------------
INSERT INTO Branche (libelle) VALUES ('Développeurs');
INSERT INTO Branche (libelle) VALUES ('Gestion de la Performance');
INSERT INTO Branche (libelle) VALUES ('Santé et Sécurité au Travail');
INSERT INTO Branche (libelle) VALUES ('Formation et Développement');
INSERT INTO Branche (libelle) VALUES ('Recrutement et Dotation en Personnel');
INSERT INTO Branche (libelle) VALUES ('Robotique');
INSERT INTO Branche (libelle) VALUES ('Intelligence artificielle (IA)');
INSERT INTO Branche (libelle) VALUES ('Réseaux informatiques');
INSERT INTO Branche (libelle) VALUES ('Finance immobilière');
INSERT INTO Branche (libelle) VALUES ('Finance internationale');
INSERT INTO Branche (libelle) VALUES ('Banque commerciale');
INSERT INTO Branche (libelle) VALUES ('Assurance');
INSERT INTO Branche (libelle) VALUES ('Gestion des stocks');
INSERT INTO Branche (libelle) VALUES ('Logistique internationale');
INSERT INTO Branche (libelle) VALUES ('Gestion des entrepôts');
INSERT INTO Branche (libelle) VALUES ('Transport et distribution');
INSERT INTO Branche (libelle) VALUES ('Ventes industrielles');
INSERT INTO Branche (libelle) VALUES ('Ventes internationales');
INSERT INTO Branche (libelle) VALUES ('Ventes au détail');
INSERT INTO Branche (libelle) VALUES ('Ventes techniques');

-- --------------------BRANCHE DEPARTEMENT-------------------------
INSERT INTO BrancheDepartement(idBranche,idDepartement,njHParPersonne) VALUES
('BRA1','DEPT1',15),
('BRA6','DEPT1',12),
('BRA7','DEPT1',12),
('BRA8','DEPT1',12);
INSERT INTO BrancheDepartement(idBranche,idDepartement,njHParPersonne) VALUES
('BRA9','DEPT3',15),
('BRA10','DEPT3',12),
('BRA11','DEPT3',12),
('BRA12','DEPT3',12);
INSERT INTO BrancheDepartement(idBranche,idDepartement,njHParPersonne) VALUES
('BRA2','DEPT2',15),
('BRA3','DEPT2',12),
('BRA4','DEPT2',12),
('BRA5','DEPT2',12);
INSERT INTO BrancheDepartement(idBranche,idDepartement,njHParPersonne) VALUES
('BRA17','DEPT4',15),
('BRA18','DEPT4',12),
('BRA19','DEPT4',12),
('BRA20','DEPT4',12);
INSERT INTO BrancheDepartement(idBranche,idDepartement,njHParPersonne) VALUES
('BRA13','DEPT5',15),
('BRA14','DEPT5',12),
('BRA15','DEPT5',12),
('BRA16','DEPT5',12);

-- -------------------BESOIN PERSONNELLE--------------------------
INSERT INTO BesoinPersonnelle(idBrancheDepartement) VALUES
('BRA1'),('BRA2'),('BRA3'),('BRA4'),('BRA5'),('BRA6'),('BRA7'),('BRA8'),
('BRA9'),('BRA10'),('BRA11'),('BRA12'),('BRA13'),('BRA14'),('BRA15'),('BRA16');

-- ---------------------DIPLOME---------------------------
INSERT INTO Diplome(libelle) VALUES
('CEPE'),('BEPC'),('BACC'),('LICENCE');

-- --------------------NATIONNALITE-------------------
INSERT INTO Nationnalite(libelle) VALUES
('Malagasy'),('Etrangere');


