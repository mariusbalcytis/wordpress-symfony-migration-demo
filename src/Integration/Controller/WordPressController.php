<?php

namespace App\Integration\Controller;

use Symfony\Component\HttpFoundation\Response;

class WordPressController
{
    public function index()
    {
        define('WP_USE_THEMES', true);
        $GLOBALS['wp_did_header'] = true;
        wp();
        ob_start();
        include ABSPATH . WPINC . '/template-loader.php';
        return new Response(ob_get_clean(), is_404() ? 404 : 200);
    }
}
