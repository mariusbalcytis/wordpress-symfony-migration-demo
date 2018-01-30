<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class MyController
{
    public function showTime()
    {
        return new JsonResponse(['time' => time()]);
    }
}
