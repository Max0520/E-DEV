<?php

// Create necessary directories for Laravel on Vercel
$dirs = [
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache',
    '/tmp/storage',
    '/tmp/storage/framework',
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

// Set environment variables for Laravel paths
$_ENV['BOOTSTRAP_CACHE_PATH'] = '/tmp/bootstrap/cache';
$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';

// Forward to Laravel
require __DIR__ . '/../public/index.php';
