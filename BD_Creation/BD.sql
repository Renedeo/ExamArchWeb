DROP DATABASE IF EXISTS exambdbanquegestion;
CREATE DATABASE exambdbanquegestion;

-- Effacer les tables si besoin
-- Sinon utiliser alter table pour effectuer des modifications
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS compte_client;
DROP TABLE IF EXISTS banque;
DROP TABLE IF EXISTS client;

-- Création de la table banque
CREATE TABLE IF NOT EXISTS banque (
	id_banque SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	localisation VARCHAR(255) NOT NULL
);

-- Création de la table client
CREATE TABLE IF NOT EXISTS client (
	id_client SERIAL PRIMARY KEY,
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	-- Importante car permet de pouvoir créer un compte
	date_de_naissance DATE NOT NULL,
	situation_maritale VARCHAR(50) NOT NULL
);

-- Création de la table des conseillers
CREATE TABLE IF NOT EXISTS conseiller (
	id_conseiller SERIAL PRIMARY KEY,
	id_banque INT,
	CONSTRAINT fk_banque_conseiller
		FOREIGN KEY (id_banque)
		REFERENCES banque(id_banque),
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL
);

-- Création de la table Compte client
CREATE TABLE IF NOT EXISTS compte_client (
	id_compte SERIAL PRIMARY KEY, 
	id_client INT,
	id_banque INT,
	id_conseiller INT,
	CONSTRAINT fk_banque_compte
		FOREIGN KEY (id_banque)
		REFERENCES banque(id_banque),
	CONSTRAINT fk_client_compte
		FOREIGN KEY (id_client)
		REFERENCES client(id_client),
	CONSTRAINT fk_conseiller_compte
		FOREIGN KEY (id_conseiller)
		REFERENCES conseiller(id_conseiller),
	-- Par défaut, le solde d'un compte est à 0
	solde REAL DEFAULT 0,
	-- On ne peut omettre la date de création 
	-- Mais la date de résiliation peut être nulle 
	-- tant que le client n'a pas résilié son compte
	date_creation DATE NOT NULL DEFAULT NOW(),
	date_resiliation DATE,
	type_de_compte VARCHAR(255)
);

-- Création de la table Transactions 
CREATE TABLE IF NOT EXISTS transactions (
	id_transactions SERIAL PRIMARY KEY,
	id_compte_exp INT,
	id_compte_dest INT,
	CONSTRAINT fk_compte_exp_transactions
		FOREIGN KEY (id_compte_exp)
		REFERENCES compte_client(id_compte),
	CONSTRAINT fk_compte_dest_transactions
		FOREIGN KEY (id_compte_dest)
		REFERENCES compte_client(id_compte),
	montant REAL NOT NULL,
	motif VARCHAR(255) NOT NULL,
	date_de_transaction DATE NOT NULL DEFAULT NOW()
);
