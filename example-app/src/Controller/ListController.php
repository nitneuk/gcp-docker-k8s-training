<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final readonly class ListController
{
    public function __construct(
        private string $pgDsn,
        private string $pgUser,
        private string $pgPassword,
    )
    {
    }

    #[Route(path: '/list')]
    public function __invoke(): Response
    {
        $data = ['Movies:' => []];

        try {
            $pdo = new \PDO(
                dsn: $this->pgDsn,
                username: $this->pgUser,
                password: $this->pgPassword,
                options: [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
            );
        } catch (\PDOException $e) {
            return new Response($e->getMessage());
        }

        foreach ($pdo->query('SELECT * FROM movies') as $row) {
            $data['Movies:'][] = $row['name'];
        }

        return new JsonResponse($data);
    }
}
