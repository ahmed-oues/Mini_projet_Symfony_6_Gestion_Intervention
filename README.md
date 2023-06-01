# Mini Projet Symfony 5 - Gestion d'Interventions

## Description

Ce projet consiste à réaliser un mini projet Symfony 6 en utilisant la base de données fournie et en mettant en place les relations entre les tables. Les objectifs du projet sont les suivants :

- Identifier et implémenter les fonctionnalités de base de chaque application, telles que les menus et les formulaires.
  Exemple : Gérer les étudiants (ajouter, supprimer, modifier, afficher, rechercher, etc.).
- Proposer un espace administrateur avec des fonctionnalités spécifiques.
- Proposer un espace utilisateur avec des fonctionnalités spécifiques.
- Créer une interface conviviale : le site doit être facile à utiliser. Il doit présenter une navigation logique entre les différentes interfaces et offrir des liens suffisants pour une navigation rapide. Le texte doit être compréhensible, visible et lisible.

Nous allons créer une base de données appelée "Gestion_Intervention" qui permettra de gérer les interventions des techniciens d'une entreprise d'électroménagers. Le schéma de cette base de données est le suivant :

**Client**(CodeClt, Nom, Prenom, Adresse, CP)
**Produit**(ReferencePd, Designation, Prix)
**Technicien**(CodeTech, Nom, Prenom)
**Intervention**(NumInterv, DateInterv, CodeClt, ReferencePd, CodeTech)

## Installation

1. Clonez le projet depuis le dépôt Git : `git clone https://github.com/votre-repository.git`
2. Accédez au répertoire du projet : `cd nom-du-projet`
3. Installez les dépendances en exécutant la commande : `composer install`
4. Configurez la base de données dans le fichier `.env`.
5. Exécutez les migrations pour créer les tables de la base de données : `php bin/console doctrine:migrations:migrate`
6. Lancez le serveur Symfony : `symfony serve`

Assurez-vous d'avoir installé Symfony 6 et d'avoir un serveur de base de données compatible.

Merci d'avoir choisi notre projet ! Si vous avez des questions ou besoin d'aide, n'hésitez pas à nous contacter.
