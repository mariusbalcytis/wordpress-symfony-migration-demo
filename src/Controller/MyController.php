<?php

namespace App\Controller;

use App\DollyLyricsProviderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class MyController
{
    public function information(DollyLyricsProviderInterface $dollyLyricsProvider)
    {
        return new JsonResponse([
            'lyrics' => $dollyLyricsProvider->getLyrics(),
        ]);
    }
}
