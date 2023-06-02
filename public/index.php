<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\JsonResponse;

$_SERVER['APP_RUNTIME_OPTIONS'] = [
    'disable_dotenv' => !file_exists(dirname(__DIR__) . '/.env')
];

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    $requiredEnvVars = [
        'PORT',
        'CLIENT_ORIGIN_URL'
    ];

    foreach ($requiredEnvVars as $var) {
        if (empty($_ENV[$var])) {
            $response = new JsonResponse([
                'message' => 'The required environment variables are missing. Check .env file.'
            ], 500);

            header_remove('x-powered-by');
            header_remove('server');

            $response->send();
            exit;
        }
    }

    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
