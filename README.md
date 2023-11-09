# ExamArchWeb
Examen d'architecture web 08/11/2023

## Rendu du premier exercice 08/11/2023
* Contruction du schéma de base de données sous les formes MCD, MLD, MPD, et dictionnaire de données 

### MCD (Modèle Conceptionnel des données)
Conception de la base de données en donnant les colonnes descriptif de la table. Etablir les relation entre les tables.
#### BD : Gestion des compte client d'une banque
Nous partons de l'idées qu'un client vient dans une banque pour la création d'un compte. Ensuite le conseiller procède à la création d'un compte. 

Nous devons donc avoir une <strong><span style="color:red;">table de rendez vous</span></strong> pour les client et les conseillers d'une banque.

Le client se voit donc assigner un type de compte en fonction de sa situation. il peut ensuite procéder à la gestion de son compte tels que le parametrage des plafonds,  ou encore passer par le conseiller pour effectuer certaine opération plus delicate tels qu'une opposition relevant dela securité du compte.

Nous devons donc avoir en plus <strong><span style="color:red;">table d'opération sur le compte</span></strong>.

Nous avons aussi le client d'une banque utilise un compte pour effectuer des transactions en  interne ou en externe vers une autre banque.

Nous avons donc <strong><span style="color:blue;">table de transactions</span></strong> qui vas enrégistrer ces différentes transactions.

Pour le reste nous avons la création des tables:
* <strong><span style="color:blue;">Banque</span></strong>     
Banque ou agence enrégistrée
* <strong><span style="color:blue;">Client</span></strong> 
Table enrégistrant les information sur les client
* <strong><span style="color:blue;">Compte Client</span></strong> 
Information sur les compte client
* <strong><span style="color:blue;">Conseiller</span></strong> 
Table correspondant plus aux conseillers de la banque

<div style="background:red;color:white;text-align:center">Correspondant aux tables non présentent</div>
<div style="background:blue;color:white;text-align:center">Correspondant aux tables présentent</div>
 