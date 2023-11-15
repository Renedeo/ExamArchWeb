# ExamArchWeb
Examen d'architecture web du 08/11/2023

## Rendu du premier exercice du 08/11/2023
# ExamArchWeb
Examen d'architecture web du 08/11/2023

## Rendu du premier exercice du 08/11/2023
* Construction du schéma de base de données sous les formes MCD, MLD, MPD, et dictionnaire de données 

### MCD (Modèle Conceptuel des Données)
Conception de la base de données en décrivant les colonnes des tables et en établissant les relations entre celles-ci.

#### BD : Gestion des comptes clients d'une banque
Nous partons de l'idée qu'un client se rend dans une banque pour créer un compte. Ensuite, le conseiller procède à la création du compte.

Nous devons donc avoir une **table de rendez-vous** pour les clients et les conseillers d'une banque.

Le client se voit ensuite attribuer un type de compte en fonction de sa situation. Il peut ensuite procéder à la gestion de son compte, telle que la configuration des plafonds, ou passer par le conseiller pour effectuer certaines opérations plus délicates, telles qu'une opposition relevant de la sécurité du compte.

Nous devons donc avoir en plus une **table d'opérations sur le compte**.

Le client d'une banque utilise également un compte pour effectuer des transactions en interne ou en externe vers une autre banque.

Nous avons donc une **table de transactions** qui enregistre ces différentes transactions.

Pour le reste, nous avons la création des tables :
* **Banque**     
  Enregistre les informations sur les banques ou agences.
* **Client** 
  Enregistre les informations sur les clients.
* **Compte Client** 
  Enregistre les informations sur les comptes clients.
* **Conseiller** 
  Correspond davantage aux conseillers de la banque.

Pour le reste, nous avons la création des tables :
* **Banque**     
Banque(s) ou agence(s) enregistrée(s)
* **Client** 
Table enregistrant les informations sur les clients
* **Compte Client** 
Informations sur les comptes clients
* **Conseiller** 
Table correspondant aux conseillers de la banque

## Création des Data Objects et Data Access Objects

### Data Objects (DO)
Pour la définition des data objects, nous procédons de la manière suivante :
- Nous créons des classes en **PHP** correspondant à chaque table de notre base de données.
- Ensuite, pour les attributs, l'utilisation du schéma de la base de données m'a permis de déterminer les types et les noms. Nous les mettons en privé pour protéger les objets de cette table.
- Ensuite, pour pouvoir effectuer des opérations avec ces objets, nous définissons des méthodes setters et getters pour pouvoir accéder à ces attributs.

Ces classes vont ensuite nous permettre de manipuler les données de la base avec nos fonctions DAO.

### Data Access Objects (DAO)
Ici, nous définissons des fonctions nous permettant d'extraire des informations de la base de données.
Pour chacune, nous définissons des fonctions dont le nom est précédé de l'intitulé de la classe correspondante.

Fonctions d'extraction :
- `find_all` $\rightarrow$ Renvoie une liste de DO des éléments de la table correspondante.
- `find_by_id` $\rightarrow$ Renvoie l'élément de la table correspondante correspondant à l'identifiant passé en argument.
- `remove` $\rightarrow$ Supprime l'élément de la table correspondante avec l'identifiant passé en argument.

Fonctions d'insertion :
- `insert` $\rightarrow$ Insère un élément dans la base de données à l'aide d'un objet DO.
- `update` $\rightarrow$ Met à jour un élément de la base avec des informations obtenues à l'aide d'un objet.

<!-- ### Améliorations possibles
On pourrait créer une classe vir -->

## Création de l'interface de manipulation des tables
Nous devons créer une interface simple permettant d'afficher les informations suivantes : 

- Informations des clients et sur leur situation familiale
- Informations sur les comptes bancaires (avec le type de compte)
- Informations sur les lignes de comptes
- Informations sur l'agence / la banque
- Informations sur le conseiller bancaire
- Afficher la liste des comptes clients gérés par un conseiller

