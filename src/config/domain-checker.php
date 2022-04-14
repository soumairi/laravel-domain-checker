<?php

/*
 * This file is part of domain-checker.
 *
 * (c) Soumairi/Ouhamou <soumairi@gmail.com, hamzaouhamou@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    /**
     * Allowed domains of all the incoming HTTP requests to the application to make a call to our application.
     */
    'allowed_domains' => [
        'localhost',
        '127.0.0.1',
    ],

    /**
     * Custom Error Message
     */
    'error_message' => 'This host is not allowed'
];
