Réalisez mini projet Symfony 6 avec la base de données proposée, les relations entre les tables ;
 Dégager et implémenter les fonctionnalités de base de chaque application (Menu, formulaire,…) ;
Exemple : Gérer étudiant (Ajout, supprimer, modifier, afficher, Rechercher,..)
 Proposer un espace administrateur qui a des fonctionnalités spécifiques ;
 Proposer un espace utilisateur qui a des fonctionnalités spécifiques ;
 Proposer une interface conviviale : Le site doit être facile à utiliser. Il doit présenter un enchaînement
logique entre les interfaces et un ensemble de liens suffisants pour assurer une navigation rapide et un
texte compréhensible, visible et lisible.
On se propose de créer la base de données «Gestion_Intervention», qui permet
de gérer les interventions des techniciens d’une entreprise d’électroménagers. Le
schéma de cette base est le suivant :
Client(CodeClt, Nom, Prenom, Adresse, CP)
Produit(ReferencePd, Designation, Prix)
Technicien(CodeTech, Nom, Prenom)
Intervention(NumInterv, DateInterv, CodeClt, ReferencePd, CodeTech)
