<?php

namespace App\Integration;

use App\DollyLyricsProviderInterface;

class DollyLyricsProvider implements DollyLyricsProviderInterface
{
    public function getLyrics()
    {
        return hello_dolly_get_lyric();
    }
}
