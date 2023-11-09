# ExamArchWeb
Examen d'architecture web 08/11/2023

## Rendu du premier exercice 08/11/2023
* Construction du schéma de base de données sous les formes MCD, MLD, MPD, et dictionnaire de données 

### MCD (Modèle Conceptuel des Données)
Conception de la base de données en donnant les colonnes descriptives de la table. Établir les relations entre les tables.
#### BD : Gestion des comptes clients d'une banque
Nous partons de l'idée qu'un client vient dans une banque pour la création d'un compte. Ensuite, le conseiller procède à la création d'un compte. 

Nous devons donc avoir une <strong><span style="color:red;">table de rendez-vous</span></strong> pour les clients et les conseillers d'une banque.

Le client se voit donc assigner un type de compte en fonction de sa situation. Il peut ensuite procéder à la gestion de son compte tels que le paramétrage des plafonds,  ou encore passer par le conseiller pour effectuer certaines opérations plus délicates telles qu'une opposition relevant de la sécurité du compte.

Nous devons donc avoir en plus une <strong><span style="color:red;">table d'opération sur le compte</span></strong>.

Nous avons aussi le client d'une banque utilise un compte pour effectuer des transactions en interne ou en externe vers une autre banque.

Nous avons donc <strong><span style="color:blue;">table de transactions</span></strong> qui va enregistrer ces différentes transactions.

Pour le reste, nous avons la création des tables :
* <strong><span style="color:blue;">Banque</span></strong>     
Banque(s) ou agence(s) enregistrée(s)
* <strong><span style="color:blue;">Client</span></strong> 
Table enregistrant les informations sur les clients
* <strong><span style="color:blue;">Compte Client</span></strong> 
Informations sur les comptes clients
* <strong><span style="color:blue;">Conseiller</span></strong> 
Table correspondant aux conseillers de la banque

<div style="background:red;color:white;text-align:center">Correspondant aux tables non présentes</div>
<div style="background:blue;color:white;text-align:center">Correspondant aux tables présentes</div>
