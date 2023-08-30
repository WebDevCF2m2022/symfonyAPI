# symfonyAPI
Symfony 6.3 API

## Installation

```bash
symfony new SymfonyAPI
```

## Démarrage serveur interne :
```bash
cd SymfonyAPI
symfony serve -d
```

### URL
https//120.0.0.1:8000

### Console

```bash
php bin/console
```

On optient les actions faisables depuis la console

### Installation de maker

```bash
composer require --dev symfony/maker-bundle
```

On pourra dès lors créer rapidement des parties de site via l'invite de commande

### Création d'un contrôleur

```bash
php bin/console make:controller
```

ce qui donne

```bash
Choose a name for your controller class (e.g. DeliciousGnomeController):
 > NotrePremierController

 created: src/Controller/NotrePremierController.php


  Success!


 Next: Open your new controller class and add some pages!
```

On obtient ce code qui crée un `json`, on change la `route` vers la racine et on la nomme `homepage`:

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NotrePremierController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/NotrePremierController.php',
        ]);
    }
}
```

On peut vérifier la route : 

```bash
php bin/console debug:router
```

Si on la commente, on a plus de route

on peut la créer dans `config\routes.yaml` :

```bash
# notre accueil
homepage:
    path:      /
    controller:   App\Controller\NotrePremierController::index

page:
    path: /page/{id}
    controller:   App\Controller\NotrePremierController::page
    methods:    GET
    requirements:
        id: '\d+'
    defaults:
        id: 1
```

et le contrôleur:

```php
<?php
# namespace
namespace App\Controller;

# Ce qu'on a besoin
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class NotrePremierController extends AbstractController
{
    # routes voir routes.yaml
    public function index(): Response
    {
        return new Response("
        <h1>coucou les amis</h1>
        <p><a href='./'>Accueil</a> - page <a href='./page/1'>1</a>
         <a href='./page/2'>2</a> 
         <a href='./page/3'>3</a></p>
        ");
    }

    public function page(int $id): Response
    {
        return new Response("
        <h1>coucou les amis</h1>
        <p><a href='../../'>Accueil</a></p>
        <h3>page = $id</h3> 
        ");
    }
}
```