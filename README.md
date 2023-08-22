# Futurmap
# Test Technique

Ce projet a été créé dans le cadre d'un test technique pour réaliser un mini-site en utilisant Symfony 6.

## Objectif du Test

L'objectif de ce test était de créer une application en symfony avec les fonctionnalités suivantes :

- Vous allez créer une application de gestion de produit ayant comme champ :
-- Nom :
-- Quantité :
-- Prix :
- Administrer les catégories et faire la relation produits-catégorie 
- Ajouter un filtre par catégorie dans la liste des produits
- Créer un provider users_in_memory dans security.yaml et sécurisez votre application
- Créer un webservice et exposer vos produits à l’aide de graphql

## Comment Exécuter le Projet

1. Clonez ce dépôt Git (https://github.com/pafraha/futurmap.dev.git).
2. Configurez votre environnement Symfony en créant un fichier `.env.local` avec vos paramètres de base de données.
3. Installez les dépendances en exécutant `composer install`.
4. Créez la base de données avec `php bin/console doctrine:database:create`.
5. Exécutez les migrations avec `php bin/console doctrine:migrations:migrate`.
6. Lancez le serveur Symfony avec `symfony server:start`.

## Login (dispo dans provider: users_in_memory)
### De type user simple (ROLE_USER)
- email: user1@user.dev
- password: user

### De type admin (ROLE_ADMIN)
- email: admin@admin.dev
- password: admin

Ici pour differencier les rôles d'user et d'admin, une simple règle est difine, que, seul admin peut supprimer un Produit.

## Les liens utiles
Pour acceder au service GraphQL, `http://127.0.0.1:8000/graphiql`

## Quelques exemples du GraphQL Query
### Query
`query{
  product(id: 1) {
    name,
    category,
    price
  },
  products_collection(CategoryID: 1) { # Pour récuperer les produits du category Id 1
    products {
      name,
      category
    }
  },
  products_collection { # Pour récuperer tous les produits
    products {
      name,
      category
    }
  }
}`

### Mutation
`mutation {
  createProduct(input: {
    name: "Prod 05",
    price: 1750,
    quantity: 3,
    category: 1
  }) {
    id,
    name,
    category
  }
}`

## Capture d'écran
### Capture 1: GraphQL console
![image](https://github.com/pafraha/futurmap/assets/12570361/334d4ba6-7b32-4ddb-b73f-22a03da4ab2e)

### Capture 2: Gestion des produits
![image](https://github.com/pafraha/futurmap/assets/12570361/325812d4-ee3e-46d7-a37f-f91910759516)


## Info du développeur
- Nom: RAHARINIRINA Paulin Franco
- Contact: 032 28 242 04 / 034 33 433 11
- Mail: raharinirinapf@gmail.com
