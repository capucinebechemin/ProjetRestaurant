<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Projet étudiant Coup'Faim

Il s’agit d’un site de livraison de repas. Les membres connectés peuvent commander un plat chez un restaurant. Il devra ensuite valider la réception de celui-ci. Un client peut acheter un plat s’il dispose d’un solde suffisant.Un espace restaurateur permettra aux restaurant d’ajouter, de modifier ou de supprimer leurs plats.Un  espace administrateur  sera  mis  en  place  pour  gérer  le  service  après-vente  et  les restaurateurs.

## Utilisation

Avoir un serveur Wamp ou Xamp et Composer à jour.
La version actuelle du projet utilise une base de données MySQL héberger sur Alwaysdata.

Le site est disponible à cette adresse mais sans les images (Hébergement via Heroku et base de données Postgresql):

http://my-app-coupfaim.herokuapp.com/

Pour accéder à la partie admin il faut se connecter avec le compte suivant: 

E-mail :admin@gmail.com

Mot de passe : 123456789

Le compte admin devrait être automatiquement créé lors des migrations.

## Architecture du site

Dans les grandes lignes le site ce compose de 6 parties :

- La partie Client

- La partie Restaurateur

- La partie Administrateur

- Le HomeController qui répartit les utilisateurs en fonction de leurs rôle.

Le reste est principalement composée de CRUD basique et du modèle MVC (Modèle, Vue, Controller).
Toutes les images sont stocké dans storage/uploads.


