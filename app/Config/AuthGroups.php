<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    // public string $defaultGroup = 'user';
    public string $defaultGroup = 'dosen';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * The available authentication systems, listed
     * with alias and class name. These can be referenced
     * by alias in the auth helper:
     *      auth('api')->attempt($credentials);
     */
    public array $groups = [
        // 'superadmin' => [
        //     'title'       => 'Super Admin',
        //     'description' => 'Complete control of the site.',
        // ],
        // 'admin' => [
        //     'title'       => 'Admin',
        //     'description' => 'Day to day administrators of the site.',
        // ],
        // 'developer' => [
        //     'title'       => 'Developer',
        //     'description' => 'Site programmers.',
        // ],
        // 'user' => [
        //     'title'       => 'User',
        //     'description' => 'General users of the site. Often customers.',
        // ],
        // 'beta' => [
        //     'title'       => 'Beta User',
        //     'description' => 'Has access to beta-level features.',
        // ],
        'direktur' => [
            'title'       => 'Direktur Politeknik Statistika STIS',
            'description' => 'Akses segala fitur yang tersedia untuk direktur',
        ],
        'kepalaPPPM' => [
            'title'       => 'Kepala PPPM',
            'description' => 'Akses segala fitur yang tersedia untuk Kepala PPPM',
        ],
        'reviewer' => [
            'title'       => 'Dosen PPPM',
            'description' => 'Akses segala fitur yang tersedia untuk reviewer / dosen PPPM',
        ],
        'bau' => [
            'title'       => 'BAU',
            'description' => 'Akses segala fitur yang tersedia untuk BAU',
        ],
        'dosen' => [
            'title'       => 'Dosen',
            'description' => 'Akses segala fitur yang tersedia untuk dosen',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system. Each system is defined
     * where the key is the
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Can access the sites admin area',
        'admin.settings'      => 'Can access the main site settings',
        'users.manage-admins' => 'Can manage other admins',
        'users.create'        => 'Can create new non-admin users',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',
        'beta.access'         => 'Can access beta-level features',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'users.*',
            'beta.*',
        ],
        'admin' => [
            'admin.access',
            'users.create',
            'users.edit',
            'users.delete',
            'beta.access',
        ],
        'developer' => [
            'admin.access',
            'admin.settings',
            'users.create',
            'users.edit',
            'beta.access',
        ],
        'user' => [],
        'beta' => [
            'beta.access',
        ],
    ];
}
