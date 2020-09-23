<?php

/**
 *   Copyright 2018 Vimeo.
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS,
 *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *   See the License for the specific language governing permissions and
 *   limitations under the License.
 */
declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => env('VIMEO_CLIENT', '88da3cc11e66d7f88ead9e660aed92ec1555fec6'),
            'client_secret' => env('VIMEO_SECRET', 'WXGjwz6dz4YbGvP2G50YUYHgVEYiRtIwhmqxHCjUloVbMe7qbihylUfW6KOIGXGCc0d4CpQKh3GdYGbEM23+z6Tvab+qbKIU+1d2uEB0qQufo0DqzpbSEgbYatRIa6AR'),
//            'access_token' => env('VIMEO_ACCESS', 'a3b77d394ce44c522dcbe68abe578f87'),
            'access_token' => env('VIMEO_ACCESS', '01a687bb5ccb9a7185f6080531239332'),
        ],

        'alternative' => [
            'client_id' => env('VIMEO_ALT_CLIENT', 'your-alt-client-id'),
            'client_secret' => env('VIMEO_ALT_SECRET', 'your-alt-client-secret'),
            'access_token' => env('VIMEO_ALT_ACCESS', null),
        ],

    ],

];
