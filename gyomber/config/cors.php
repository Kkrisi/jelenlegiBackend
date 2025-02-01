<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['*'],   // Minden útvonalra engedélyezett CORS

    'allowed_methods' => ['*'],     // Minden HTTP metódus engedélyezett (pl. GET, POST, PUT, DELETE)

    'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000')],        // A frontend URL engedélyezése (alapértelmezetten localhost:3000)

    'allowed_origins_patterns' => [],   // Nincs olyan mintázat, ami az origin-t az URL alapján szabályozza

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,     // A CORS válaszok mennyi ideig lehetnek gyorsítótárban

    'supports_credentials' => true,     // A cookie-kat és hitelesítéseket támogatja

];
