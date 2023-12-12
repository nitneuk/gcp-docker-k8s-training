<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final class HomeController
{
    #[Route(path: '/')]
    public function __invoke(): Response
    {
        return new Response('Hello World!');
    }
}
