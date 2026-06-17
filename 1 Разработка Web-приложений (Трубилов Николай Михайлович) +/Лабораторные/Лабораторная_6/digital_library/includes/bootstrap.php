<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Europe/Moscow');

define('APP_ROOT', dirname(__DIR__));
define('DATA_DIR', APP_ROOT . DIRECTORY_SEPARATOR . 'data');
define('ASSETS_DIR', APP_ROOT . DIRECTORY_SEPARATOR . 'assets');
define('USERS_FILE', DATA_DIR . DIRECTORY_SEPARATOR . 'users.json');
define('BOOKS_FILE', DATA_DIR . DIRECTORY_SEPARATOR . 'books.json');

require_once __DIR__ . '/storage.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/layout.php';

initializeApplication();

function redirectTo(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function isPostRequest(): bool
{
    return ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
}

function postValue(string $key, string $default = ''): string
{
    return trim((string)($_POST[$key] ?? $default));
}

function getValue(string $key, string $default = ''): string
{
    return trim((string)($_GET[$key] ?? $default));
}
