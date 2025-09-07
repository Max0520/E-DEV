<?php

use Illuminate\Http\Request;

// **1️⃣ Charger l'application Laravel**
$app = require __DIR__ . '/../bootstrap/app.php';

// **2️⃣ Redéfinir les chemins vers /tmp pour Vercel**
// Laravel va stocker les fichiers temporaires ici (cache, sessions, logs)
$app->useStoragePath('/tmp/storage');
$app->useCachedPackagesPath('/tmp/bootstrap/cache/packages.php');
$app->useCachedConfigPath('/tmp/bootstrap/cache/config.php');
$app->useCachedRoutesPath('/tmp/bootstrap/cache/routes.php');

// **3️⃣ S'assurer que les répertoires nécessaires existent**
$dirs = [
    '/tmp/bootstrap/cache',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// **4️⃣ Lancer Laravel**
$request = Request::capture();
$response = $app->handle($request);
$response->send();
$app->terminate($request, $response);
