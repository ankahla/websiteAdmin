<?php
use Symfony\Component\ErrorHandler\DebugClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__.'/../app/autoload.php';

(new Dotenv())->load(
    __DIR__.'/../.env',
    __DIR__.'/../.env.dev',
    __DIR__.'/../.env.test'
);

if (getenv('APP_DEBUG') === 'true') {
    DebugClassLoader::enable();
}
$kernel = new AppKernel(getenv('APP_ENV'), getenv('APP_DEBUG'));

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);