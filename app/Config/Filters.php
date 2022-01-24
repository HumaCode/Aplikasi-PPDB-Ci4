<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'FilterUser'    => \App\Filters\FilterUser::class,
        'FilterSiswa'    => \App\Filters\FilterSiswa::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'FilterUser' => [
                'except' => [
                    'auth', 'auth/*',
                    'home', 'home/*',
                    'pendaftaran', 'pendaftaran/*',
                    'wilayah', 'wilayah/*',
                    '/'
                ]
            ],
            'FilterSiswa' => [
                'except' => [
                    'auth', 'auth/*',
                    'home', 'home/*',
                    'pendaftaran', 'pendaftaran/*',
                    'wilayah', 'wilayah/*',
                    '/'
                ]
            ],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'FilterUser' => [
                'except' => [
                    'admin', 'admin/*',
                    'home', 'home/*',
                    'pekerjaan', 'pekerjaan/*',
                    'pendidikan', 'pendidikan/*',
                    'agama', 'agama/*',
                    'user', 'user/*',
                    'penghasilan', 'penghasilan/*',
                    'ta', 'ta/*',
                    'jurusan', 'jurusan/*',
                    'pendaftaran', 'pendaftaran/*',
                    'banner', 'banner/*',
                    'jalurMasuk', 'jalurMasuk/*',
                    'lampiran', 'lampiran/*',
                    'wilayah', 'wilayah/*',
                    'ppdb', 'ppdb/*',
                    '/'
                ]
            ],
            'FilterSiswa' => [
                'except' => [
                    'home', 'home/*',
                    'pendaftaran', 'pendaftaran/*',
                    'siswa', 'siswa/*',
                    'wilayah', 'wilayah/*',
                    '/'
                ]
            ],

            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
