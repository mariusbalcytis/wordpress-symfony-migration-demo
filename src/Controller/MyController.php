<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class MyController
{
    public function information()
    {
        return new JsonResponse([
            'weather' => hello_dolly_get_lyric(),
            'home_template' => get_home_template(),
        ]);
    }
}
