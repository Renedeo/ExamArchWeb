# ExamArchWeb
Examen d'architecture web du 08/11/2023

## Rendu du premier exercice du 08/11/2023
* Construction du schéma de base de données sous forme de MCD, MLD, etc., pour représenter les différentes transactions.

Pour le reste, nous avons la création des tables :
* **Banque**     
Banque(s) ou agence(s) enregistrée(s)
* **Client** 
Table enregistrant les informations sur les clients
* **Compte Client** 
Informations sur les comptes clients
* **Conseiller** 
Table correspondant aux conseillers de la banque

<div style="background:red;color:white;text-align:center">Correspondant aux tables non présentes</div>
<div style="background:blue;color:white;text-align:center">Correspondant aux tables présentes</div>

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

<div style="background:red;color:white;text-align:center">Corresponds aux informations non présentes</div>
<div style="background:blue;color:white;text-align:center">Correspondant aux informations présentes</div>
