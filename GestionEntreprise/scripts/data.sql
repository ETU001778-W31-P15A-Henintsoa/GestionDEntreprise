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

INSERT INTO Filiere (libelle) VALUES
    ('Comptable'),
    ('Informatique'),
    ('Economie'),
    ('Gestion des Ressources Humaines'),
    ('Marketing'),
    ('Sciences Politiques'),
    ('Medecine'),
    ('Droit'),
    ('Ingenierie Electrique'),
    ('Psychologie');

-----------------------EXPERIENCE------------------
INSERT INTO Experience(anneeexperience, etat) VALUES
    ('-1', 1),
    ('2', 2),
    ('3', 3),
    ('4', 4),
    ('+5', 5);

----------------------- VILLE -------------------------
insert into ville(ville) values('Antananarivo');

-- --------------------CRITERE-----------------------
INSERT INTO Critere(idbesoin,iddiplome,idnationnalite,idexperience,sexe,idfiliere,age,idSituation,dateFinDepot,ageFin) VALUES
('BES1','DIP4','NAT1','EXP3','1','FIL1',25,'SIT2','2023-10-10',50)

INSERT INTO CritereCoefficient(idbesoin,diplome,sexe,nationnalite,experience,filiere,situation,age,pourcentageNote) VALUES
('BES1',10,20,20,30,20,10,10,80);

---------------------- SITUATION AMOUREUSE ----------------------
INSERT INTO SituationMatrimoniale (libelle)
VALUES ('Celibataire'),('Marie(e)'),('Divorce(e)'),('Veuf'),('En concubinage'),('Separe(e)');

----------------------ENTREPRISE------------------------------------
insert into entreprise(ville,adresse,numero,fax) values('ville1','village des jeux Ankorondrano','0202234456','67891234567');

-------------------- ANNONCE PAR DEFAUT -----------------------------------------
insert into annonceParDefaut(idEntreprise,texte,avantage) values('entreprise1',
'Nous sommes à la recherche d_un(e) titreDuPoste passionné(e) et talentueux(se) pour rejoindre notre équipe 
chez _NomEntrepriseIci_. En tant que _NomPosteIci_, vous jouerez un rôle essentiel dans _DescriptionIci_.
 Vous travaillerez en étroite collaboration avec _DepartementIci_ pour _missionIci_.','Salaire compétitif; 
 ;Assurance santé;Formation continue;Equipe dinamique');

------------------------ ANNONCE ------------------------------------------------
insert into annonce(idBesoin,texte) values('BES1','Annonce pour un dev');


------------------- CANDIDAT -----------------------------------------------------------
insert into candidat(nom, prenom) values ('Herinjanahary', 'Henintsoa'); 

-- -------------------LANGUE---------------------------------------
INSERT INTO Langue (libelle) VALUES ('Anglais');
INSERT INTO Langue (libelle) VALUES ('Français');
INSERT INTO Langue (libelle) VALUES ('Espagnol');
INSERT INTO Langue (libelle) VALUES ('Malgache');

-- --------------------CANDIDAT----------------------------------
INSERT INTO Candidat(nom,prenom,datenaissance,adresse,email,sexe,telephone,idnationnalite,idexperience,iddiplome,datediplome,idfiliere,idville,idsituation,datepostulation,idannonce)
VALUES ('Mamindrakotroka','Santatra','10-01-2002','Lot 86 btb','santatra@gmail.com',0,'0330303333','NAT1','EXP3','DIP1','20-02-2018','FIL1','ville1','SIT1','11-10-2023','annonce1');

-- ---------------------DEPARTEMENT ADRESSE--------------------------------------
INSERT INTO departementAdresse (idDepartement, idEntreprise, adresse)
VALUES ('DEPT1', 'entreprise1', 'Ankorondrano');
INSERT INTO departementAdresse (idDepartement, idEntreprise, adresse)
VALUES ('DEPT2', 'entreprise1', 'Ankorondrano');
INSERT INTO departementAdresse (idDepartement, idEntreprise, adresse)
VALUES ('DEPT3', 'entreprise1', 'Ankorondrano');
INSERT INTO departementAdresse (idDepartement, idEntreprise, adresse)
VALUES ('DEPT4', 'entreprise1', 'Ankorondrano');
INSERT INTO departementAdresse (idDepartement, idEntreprise, adresse)
VALUES ('DEPT5', 'entreprise1', 'Ankorondrano');
-- INSERT INTO departementAdresse (idDepartement, idEntreprise, adresse)
-- VALUES ('DEPT6', 'entreprise1', 'Ankorondrano');

-- ---------------------EMPLOYE-----------------------------
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, estessaie, etat)
VALUES ('Doe', 'John', '123 Main Street', '0330323617', 'john.doe@email.com', 'motdepasse1', FALSE, 21);
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, estessaie)
VALUES ('Smith', 'Jane', '456 Elm Avenue', '0341791777', 'jane.smith@email.com', 'motdepasse2', TRUE);
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, estessaie)
VALUES ('Brown', 'Robert', '789 Oak Lane', '0330414876', 'robert.brown@email.com', 'motdepasse3', TRUE);
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, estessaie)
VALUES ('Davis', 'Susan', '101 Pine Road', '0334853212', 'susan.davis@email.com', 'motdepasse4', TRUE);
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, estessaie)
VALUES ('Wilson', 'Michael', '202 Cedar Street', '0345678943', 'michael.wilson@email.com', 'motdepasse5', TRUE);
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, estessaie)
VALUES ('Lee', 'Linda', '303 Maple Avenue', '0330340000', 'linda.lee@email.com', 'motdepasse6', TRUE);
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, etat, estessaie)
values ('HERINJANAHRY', 'Lova Henintsoa', 'GVAS 8 Soamanandrariny', '0322222222', 'henintsoa@gmail.com','henintsoa', 21,true);
INSERT INTO Employe (nom, prenom, adresse, numero, mail, mdp, etat, estessaie)
values ('HERINJANAHRY', 'DG', 'GVAS 8 Soamanandrariny', '0322222222', 'dg@gmail.com','dg', 11,true)

-- -----------------------------CONTRAT ESSAI--------------------------------------------
INSERT INTO contratEssai (idEmploye, salairebrut, salairenet, duree, idBrancheDepartement)
VALUES ('emp1', 50000.00, 45000.00, 6, 'BRA1');
INSERT INTO contratEssai (idemploye, salairebrut, salairenet, duree, idBrancheDepartement)
VALUES ('emp2', 45000.00, 40500.00, 6, 'BRA2');
INSERT INTO contratEssai (idemploye, salairebrut, salairenet, duree, idBrancheDepartement)
VALUES ('emp3', 55000.00, 49500.00, 6, 'BRA11');
INSERT INTO contratEssai (idemploye, salairebrut, salairenet, duree, idBrancheDepartement)
VALUES ('emp4', 46000.00, 41400.00, 6, 'BRA17');
INSERT INTO contratEssai (idemploye, salairebrut, salairenet, duree, idBrancheDepartement)
VALUES ('emp5', 60000.00, 54000.00, 6, 'BRA13');
INSERT INTO contratEssai (idemploye, salairebrut, salairenet, duree, idBrancheDepartement)
VALUES ('emp6', 48000.00, 43200.00, 6, 'BRA16');

-- ----------------------------------VILLE----------------------------------
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

-- ----------------------------SALAIRE-------------------------------------------
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA1', 2500000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA2', 1250000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA3', 1300000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA4', 1350000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA5', 1400000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA6', 1450000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA7', 1500000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA8', 1550000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA9', 1600000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA10', 1650000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA11', 1700000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA12', 1750000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA13', 1800000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA14', 1850000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA15', 1900000);
INSERT INTO Salaire (idBrancheDepartement, montantbrute)
VALUES ('BRA16', 1950000);

-- --------------------------AVANTAGES NATURES----------------------------
INSERT INTO avantageNature (libelle) VALUES
    ('Voiture'),
    ('Téléphone'),
    ('Ordinateur'),
    ('Carte de carburant'),
    ('Déjeuner gratuit'),
    ('Assurance santé'),
    ('Prime de performance'),
    ('Logement'),
    ('Vacances payées'),
    ('Assurance automobile'),
    ('Assurance vie'),
    ('Vélo');

-- ---------------------------AVANTAGES DEPARTEMENTS---------------------------
INSERT INTO avantageDepartement(idBrancheDepartement,idAvantage) 
VALUES('BRA1','avantageNature3'),('BRA2','avantageNature3'),('BRA3','avantageNature3'),('BRA4','avantageNature2'),
('BRA5','avantageNature4'),('BRA6','avantageNature5'),('BRA7','avantageNature3'),('BRA8','avantageNature2'),
('BRA9','avantageNature6'),('BRA10','avantageNature12'),('BRA11','avantageNature8'),('BRA12','avantageNature8'),
('BRA13','avantageNature3'),('BRA14','avantageNature3'),('BRA15','avantageNature4'),('BRA6','avantageNature2');

-- ---------------------------SERVICES-----------------------------------------
INSERT INTO service(libelle,valeur) 
VALUES('CNAPS',250000),
('OSTIE',200000),
('AMIT',120000),
('ESIA',300000);

-- ------------------------SERVICES CANDIDATS----------------------------------------------
-- INSERT INTO serviceCandidat(idService,idContratEssai) 
-- VALUES('service1','contrEssai7');
-- INSERT INTO serviceCandidat(idService,idContratEssai) 
-- VALUES('service1','contrEssai8');
-- INSERT INTO serviceCandidat(idService,idContratEssai) 
-- VALUES('service1','contrEssai9');
-- INSERT INTO serviceCandidat(idService,idContratEssai) 
-- VALUES('service1','contrEssai12');
-- INSERT INTO serviceCandidat(idService,idContratEssai) 
-- VALUES('service1','contrEssai13');

-- ----------------------------EMPLOYE UPDATE-----------------------------------------
UPDATE Employe set datedenaissance ='22-03-1973' where idemploye='emp1';
UPDATE Employe set datedenaissance ='10-01-1993' where idemploye='emp2';
UPDATE Employe set datedenaissance ='01-05-2000' where idemploye='emp3';
UPDATE Employe set datedenaissance ='02-06-1998' where idemploye='emp4';
UPDATE Employe set datedenaissance ='21-04-1980' where idemploye='emp5';
UPDATE Employe set datedenaissance ='25-10-1985' where idemploye='emp6';

-- ------------------------------BRANCHE DEPARTEMENT----------------
UPDATE brancheDepartement
SET DescriptionPost = 'Les développeurs sont des professionnels chargés de concevoir,
de créer, de mettre en œuvre et de maintenir des logiciels, des applications ou des systèmes informatiques',
Mission = 'Développement de logiciels, Conception de bases de données, Maintenance et mise à jour, Intégration de systèmes, Tests et débogage'
WHERE idbranchedepartement = 'BRA1';

------------------------------Type Conge -------------------------------
INSERT INTO TypeConge (libelle, durreeJournalier, estDeductible)
VALUES
    ('Congé an', 2.5, true),
    ('Congé de maladie', 1.0, true),
    ('Congé de maternité', 1.0, false),
    ('Congé de paternité', 1.0, false),
    ('Congé sans so', 1.0, true);

--------------------------Programme--------------------
insert into programme values(default,'monday','08:00:00','17:00:00','DEPT1');
insert into programme values(default,'tuesday','08:00:00','17:00:00','DEPT1');
insert into programme values(default,'wednesday','08:00:00','17:00:00','DEPT1');
insert into programme values(default,'thursday','08:00:00','17:00:00','DEPT1');
insert into programme values(default,'friday','08:00:00','17:00:00','DEPT1');
insert into programme values(default,'saturday','08:00:00','17:00:00','DEPT1');
insert into programme values(default,'sunday','08:00:00','17:00:00','DEPT1');

--------------------------Pause----------------------------------
insert into pause values(default,'10:00:00','10:30:00','DEPT1');

-----------------------Jour Mois---------------------------------
INSERT INTO jourMois
VALUES
(Default, 'January', '31','01'),
(Default, 'February', '28','02'),
(Default, 'March', '31','03'),
(Default, 'April', '30','04'),
(Default, 'May', '31','05'),
(Default, 'June', '30','06'),
(Default, 'July', '31','07'),
(Default, 'August', '31','08'),
(Default, 'September', '30','09'),
(Default, 'October', '31','10'),
(Default, 'November', '30','11'),
(Default, 'December', '31','12');

-- --------------------POSTE EMPLOYE-------------------------------
INSERT INTO posteEmploye(idEmploye,idBrancheDepartement,dateEmbauche) values
('emp1','BRA1','2020-03-15'),
('emp2','BRA2','2018-04-02'),
('emp3','BRA11','2019-10-05'),
('emp4','BRA17','2015-11-15'),
('emp5','BRA13','2021-04-11'),
('emp6','BRA16','2016-03-15');

-- -------------------BRANCHES-------------------------------
INSERT INTO Branche (libelle) VALUES ('Chef de projets');

-- -------------------DEMANDE CONGE---------------------------
INSERT INTO demandeConge values(default,'emp1','2023-11-24 12:00:00','2023-11-28 12:00:00','TYC1');
INSERT INTO demandeConge values(default,'emp2','2023-11-11 12:00:00','2023-11-16 12:00:00','TYC1');

-- --------------------RETRAIT CONGE--------------------------
INSERT INTO RetraitConge values(default,null,2.5,0,'emp1');

--------------------------- TYPE PRIME ------------------------------------
INSERT INTO TypePrime(libelle, pourcentage) VALUES
    ('Prime de Rendement', 0),
    ('Prime d Anciennete', 0),
    ('Heure Suplementaire 8h', 30),
    ('Heure Suplementaire 16h', 50),
    ('Travail Week-End', 40),
    ('Travaux Jour Feries', 200),
    ('Travail de nuit', 30),
    ('Prime Diverse', 20),
    ('Droit de Conge', 0);

------------------------------ ANCIENETE -------------------------------------
INSERT INTO Ancienete (debut, fin, valeur) VALUES
    (5, 10, 10000),
    (10, 15, 15000),
    (15, 20, 30000),
    (20, 100, 35000);

------------------------------- IRSA --------------------------------------------

insert into IRSA values
	(0, 350000, 0),
	(350000, 400000, 5),
	(400000, 500000, 10),
	(500000, 600000, 15),
	(600000, 0, 20); -- 600000 ou plus
    
-- Employe 21 RH
-- ---------------------------- BRANCHE DEPARTEMENT--------------------------------------
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 1000000 WHERE idbranchedepartement = 'BRA1';
UPDATE BrancheDepartement SET salaireMinimum = 1000000, salaireMaximum = 5000000 WHERE idbranchedepartement = 'BRA2';
UPDATE BrancheDepartement SET salaireMinimum = 1500000, salaireMaximum = 10000000 WHERE idbranchedepartement = 'BRA3';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 5000000 WHERE idbranchedepartement = 'BRA4';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 5000000 WHERE idbranchedepartement = 'BRA5';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 6000000 WHERE idbranchedepartement = 'BRA6';
UPDATE BrancheDepartement SET salaireMinimum = 1000000, salaireMaximum = 10000000 WHERE idbranchedepartement = 'BRA7';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 5000000 WHERE idbranchedepartement = 'BRA8';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 2000000 WHERE idbranchedepartement = 'BRA9';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 2500000 WHERE idbranchedepartement = 'BRA10';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 5000000 WHERE idbranchedepartement = 'BRA11';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 3500000 WHERE idbranchedepartement = 'BRA12';
UPDATE BrancheDepartement SET salaireMinimum = 1000000, salaireMaximum = 3000000 WHERE idbranchedepartement = 'BRA13';
UPDATE BrancheDepartement SET salaireMinimum = 1200000, salaireMaximum = 2000000 WHERE idbranchedepartement = 'BRA14';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 1500000 WHERE idbranchedepartement = 'BRA15';
UPDATE BrancheDepartement SET salaireMinimum = 800000, salaireMaximum = 1000000 WHERE idbranchedepartement = 'BRA16';

-- -----------------------HIERARCHIE DES BRANCHES---------------------------
INSERT INTO Branche (libelle) VALUES ('Chef de projets');

UPDATE Branche SET mgr='BRA22' WHERE idBranche='BRA1';
UPDATE Branche SET mgr='BRA22' WHERE idBranche='BRA6';
UPDATE Branche SET mgr='BRA22' WHERE idBranche='BRA7';
UPDATE Branche SET mgr='BRA22' WHERE idBranche='BRA8';

-- --------------------NATIONNALITE-------------------
INSERT INTO entreprise (ville, adresse, numero, fax)
VALUES ('ville1', 'Village des jeux Ankorondrano', '0123456789', '0123456789');

-- --------------------Employe-------------------
insert into employe (nom,prenom,adresse,numero,mail,mdp,idDepartement,etat) VALUES
('RABE','Manantsoa','Lot 86 btd','0206676798','manantsoa@gmail.com','manantsoa','DEPT1',11);

insert into PrimeEmploye values
(default,'emp1','TYPR1',4),
(default,'emp1','TYPR2',4),
(default,'emp1','TYPR3',4),
(default,'emp1','TYPR4',4),
(default,'emp1','TYPR5',4),
(default,'emp1','TYPR6',4),
(default,'emp1','TYPR7',4),
(default,'emp1','TYPR8',4),
(default,'emp1','TYPR9',4);

UPDATE PrimeEmploye SET dateprime='2023-10-12';

-- ---------------------Candidats---------------------
insert into candidat(nom,prenom,dateNaissance,adresse,email,sexe,telephone,idAnnonce,etat) values
(default,'Maharavo','Soatiana','2000-02-03','lot 86 VT Andoahalo','soatiana@gamil.com',0,'0345623454',)

-- --------------------IRSA-------------------------------------
insert into IRSA values
	(default,0, 350000, 0),
	(default,350000, 400000, 5),
	(default,400000, 500000, 10),
	(default,500000, 600000, 15),
	(default,600000, 0, 20); -- 600000 ou plus

-- -----------------AUTRE VALEUR SALAIRE--------------------------
insert into autreValeurSalaire values
(default,'periodeanterieur',100000,2,'emp1','2023-10-12'),
(default,'droitConge',1,4,'emp1','2023-10-12'),
(default,'preavis',100000,1,'emp1','2023-10-12'),
(default,'licenciement',100000,1,'emp1','2023-10-12');

-- ---------------SMIG------------------------------
insert into smig values(default,'2023-10-23',250000);

