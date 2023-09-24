<?php

namespace App\Traits;

class PermissionsTrait {

    public static function allPermissionList(){
        return [
            'category' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'sub-category' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'post' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'tag' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'comment' => [
                'view',
                'edit',
                'delete',
            ],
            'likes' => [
                'view',
                'delete',
            ],
            'enquiry' => [
                'view',
            ],
            'user' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'roles-&-permission' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'setting' => [
                'view',
                'create',
                'edit',
                'delete',
            ]
        ];
    }
}

