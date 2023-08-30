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
