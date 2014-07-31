<?php
/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
 * return [
 *     'environment name' => [
 *         'path' => 'directory storing the local files',
 *         'writable' => [
 *             // list of directories that should be set writable
 *         ],
 *     ],
 * ];
 * ```
 */
return [
    'Development' => [
        'path' => 'dev',
        'writable' => [
            'backend/runtime',
            'backend/web/assets',
            'rest/runtime',
        ],
        'executable' => [
            'yii',
        ],
    ],
    'Production' => [
        'path' => 'prod',
        'writable' => [
            'rest/runtime',
            'rest/web/assets',
        ],
        'executable' => [
            'yii',
        ],
    ],
];