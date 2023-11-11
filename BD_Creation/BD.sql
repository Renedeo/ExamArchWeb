drop database if exists exambdbanquegestion;
create database exambdbanquegestion;

-- Effacer les tables si besoins
-- Sinon utiliser alter table pour effectuer des modification 
 drop table if exists transactions;
 drop table if exists compte_client;
 drop table if exists banque;
 drop table if exists client;


-- Création de la table banque
create table if not exists banque(
	id_banque serial primary key,
	nom varchar(50) not null,
	localisation varchar(255) not null
	);

-- Création de la table client
create table if not exists client(
	id_client serial primary key,
	nom varchar(50) not null,
	prenom varchar(50) not null,
	-- importante car permet de pouvoir créer un compte
	date_de_naissance date not null,
	situation_maritale varchar(50) not null
	);

-- Création de la table Compte client
create table if not exists compte_client(
	id_compte serial primary key, 
	id_client int,
	id_banque int,
	constraint fk_banque_compte
		foreign key (id_banque)
			references banque(id_banque),
	constraint fk_client_compte
		foreign key (id_client)
			references client(id_client),
	-- Par défaut le solde d'un compte est à 0
		solde real default 0,
	-- On ne peut omettre la date de creation 
	-- Mais la date de resiliation peut être à nulle 
	-- tant que le client n'a pas résilié son compte
		date_creation date not null default now(),
		date_resiliation date,
		type_de_compte varchar(255)
	);

-- Création de la table Transactions 
create table if not exists transactions(
	id_transactions serial primary key,
	id_compte_exp int,
	id_compte_dest int,
	constraint fk_compte_exp_transactions
		foreign key (id_compte_exp)
			references compte_client(id_compte),
	constraint fk_compte_dest_transactions
		foreign key (id_compte_dest)
			references compte_client(id_compte),
	montant real not null,
	motif varchar(255) not null,
	date_de_transaction date not null default now()
);