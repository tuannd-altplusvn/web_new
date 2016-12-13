<?php

/*
 * This file is part of Laravel Flysystem.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    'profile-avatar' => [
        'styles' => [
            'medium' => '300x300',
            'thumb'  => '100x100',
        ],
        'url'    => '/images/avatars/:id/:style/:filename',
    ],
    'product-image' => [
        'styles' => [
            'medium' => '300x300',
            'thumb'  => '100x100',
        ],
        'url'    => '/images/products/:id/:style/:filename',
    ],
];
