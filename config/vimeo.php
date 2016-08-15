<?php

/*
 * This file is part of Laravel Vimeo.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
            'client_id' => '2b0c094f2c69c3cb899b63c6cf644b70563ffc19',
            'client_secret' => 'XOt4jkWhROnfwW70QSOB5qXld3XYCCQNxB7+EShSIA7qOjp1POXrV13D1FgHsohLZaMAaDK8FB+J1YBkzB4tTfoUxcar7sR39nTeF754qDpErHPDmmYBNHs34FaIsed9',
            'access_token' => '48f09e44e2ab41f06cb012ae335213ed',
        ],

        'alternative' => [
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
            'access_token' => null,
        ],

    ],

];
