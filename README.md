# EISTree

Projet de Web du S2


## Qu'est-ce qu'EISTree ?

EISTree est un site de vente de plantes et de fleurs en tout genre.
Cette startup créée par des français fait de la qualité sa priorité.


## Comment naviguer sur le site d'EISTree ?

Il est indispensable de lancer le site avec un live server ou de créer un virtual host à l'aide d'Apache pour profiter de toutes les fonctionnalités du site


### Depuis quelles plateformes peut-on accéder au site ?

Depuis n'importe quelle plateforme (ou presque). 

Le site est conçu pour être accessible depuis ordinateur, smartphone ou encore tablette.


## Que trouve-t-on sur le site ?

Depuis l'accueil, il est possible d'accéder aux listes des produits de nos 3 catégories phares : Les plantes d'intérieur, les fleurs ainsi que les arbres.

Sur la page d'accueil se trouve également un carrousel dont les liens, qui à terme renverront vers des pages produit, renvoient actuellement vers la page google.fr.

Une fois dans cette liste, seule la page produit de la Monstera (accessible depuis les plantes d'intérieur) mène à une page produit car les autres pages seront réalisées ultérieurement, à l'aide d'outils supplémentaires.


On y trouve de plus une page permettant d'accéder à son compte, une page de contact, une barre de recherche ainsi qu'un panier. Cependant, ces 4 pages ne sont pas opérationnelles pour l'instant pour les raisons citées précédemment.

La page "Les conseils de Céline" est également inaccessible car en cours de réalisation.


## Nouvelles fonctionnalités liées au javascript

Il est désormais possible de voir les stocks disponibles en cliquant sur la sidebar depuis la page "Nos Produits". Ces stocks sont pour l'instant fixés à 100.

De plus, il est aussi possible depuis la page produit de sélectionner la quantité à ajouter au panier, bien que le bouton d'ajout ne soit pas encore fonctionnel.

Toujours sur la page produit, on peut zoomer sur l'image en passant la souris sur l'image. Cependant, ce zoom n'est pas disponible sur mobile.

Enfin, la page "Contact" a elle aussi été améliorée. Ainsi, le formulaire ne peut être envoyé si un des champs est vide et les champs des nom, prenom et e-mail bloquent l'envoi du formulaire s'ils ne sont pas conformes (format de l'e-mail, caractères spéciaux dans le nom ou le prénom par exemple).


## Nouvelles fonctionnalités liées au php

Première nouvelle : Toutes les pages produit sont désormais accessibles et on peut ajouter n'importe quel article au panier pourvu qu'il soit encore en stock!

De plus, la page "Contact" a encore une fois été améliorée puisque les données sont maintenant vérifiées côté serveur, pour plus de sécurité. Vous pouvez donc nous envoyer des mails mais ce service est factice (nous ne recevrons pas vraiment vos mails) car nous ne pouvons pas configurer le serveur mail en local.

Il est aussi possible de créer un compte et de se connecter sur notre site pour gérer son panier et si vous oubliez votre mot de passe, pas de panique il est possible de le changer.

Une page "Mon Compte" est aussi apparue et bien qu'elle soit vide pour l'instant, elle permet de se déconnecter de son compte d'utilisateur.



