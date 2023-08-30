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
        return new Response("<h1>coucou les amis</h1>");
    }
}
