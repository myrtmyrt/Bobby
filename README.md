# Nouveau Bobby

Description brève de votre projet.

## Table des matières

- [Introduction](#introduction)
- [Structure du Code](#structure-du-code)
- [Modèle de Données](#modèle-de-données)
- [Organisation Générale](#organisation-générale)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Contributions](#contributions)
- [Code de Conduite](#code-de-conduite)

## Fonctionnalités
- Voir le matériel des associations
- Pouvoir demander un emprunt
- Pouvoir ajouter un objet
- Pouvoir gérer les demandes d'emprunt 

## Introduction

Une brève introduction à votre projet, expliquant son objectif, ses fonctionnalités principales et son public cible.

## Structure du Code

Expliquez comment votre code est structuré. Quels sont les principaux répertoires et fichiers et leur rôle dans l'application.

```plaintext
/chemin/vers/votre/projet
|-- app
|   |-- Console
|   |-- Exceptions
|   |-- Http
|       |-- Controllers
|       |-- Middleware
|   |-- Models
|   ...
|-- config
|-- database
|   |-- migrations
|   |-- seeders
|-- public
|-- resources
|   |-- views
|-- routes
|-- tests
|-- artisan
|-- csomposer.json
...


##Organisation-gérérale

###Routes

###Contrôleurs
*AssoController.php
*BorrowController.php
*Controller.php
*HomeController.php 
*LoginController.php
*MaterielController.php

###Vues
*welcome.blade.php : gérer la connexion au portail des assos
*home.blade.php : gère la page d'accueil 
*header.blade.php : 
*footer.blade.php :
*myAsso.blade.php : 
*borrowRequests.blade.php : 
*manageRequests.blade.php : 

## UML

```puml
@startuml

skinparam groupInheritance 2

cenum RequestState{
    Validee
    Refusee
    En attente
}

enum Condition{
    neuf
    tresBon
    bon
    moyen
    mauvais
    tresMauvais
}

class ConditionHistory{
    date: datetime,
    condition: Condition
}

class TemporaryAccess{
    user: string
    end_date: date
    state : RequestState
}

class Item{
    quantity : int
    mono-item : bool
    description: string
}

class Class{
    name : char
    description : string
    private : bool
}

class Category{
    name : string
}

class Unavailability{
start_date : date
end_date : date
}

class Borrow_Request{
request_date : datetime,
debut_date : datetime,
end_date : datetime,
state : RequestState,
comment : string
}

class Inventory{
    user: string
    date: date
}

class Association{
    name: string
}
class Borrowed_Item{
    quantity : int 
} 

Class  "1..1" --  "1..*" Item : "belong to" < 
Borrow_Request "0..*" -- "1..*" Item 
(Borrow_Request, Item) . Borrowed_Item
Category "0..*" - "0..*" Class : "belong to" >
Unavailability "1..1" - "0..*" Item : "is not available" <
TemporaryAccess "0..*" - "1..1" Association : gives <
Association "1..1" - "0..*" Inventory : "has" >
Association "1.1" -- "0..*" Class :  Belongs to <
Association "1..1" -- "0..*" Borrow_Request : "demands" >


Item "1..1" -- "1..*" ConditionHistory : "has" >
@enduml
```
