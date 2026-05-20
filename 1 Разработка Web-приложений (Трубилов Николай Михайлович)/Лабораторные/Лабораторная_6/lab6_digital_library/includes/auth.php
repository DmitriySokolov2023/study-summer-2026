<?php

function currentUser(): ?array
{
    $userId = (int)($_SESSION['user_id'] ?? 0);
    if ($userId <= 0) {
        return null;
    }

    $user = findUserById($userId);
    if (!$user) {
        unset($_SESSION['user_id']);
        return null;
    }

    return $user;
}

function isAuthenticated(): bool
{
    return currentUser() !== null;
}

function loginUser(array $user): void
{
    $_SESSION['user_id'] = (int)$user['id'];
}

function logoutUser(): void
{
    unset($_SESSION['user_id']);
}

function userCan(string $permission): bool
{
    $user = currentUser();
    if (!$user) {
        return false;
    }

    if (($user['role'] ?? '') === 'admin') {
        return true;
    }

    return !empty($user['permissions'][$permission]);
}

function requireLogin(): void
{
    if (!isAuthenticated()) {
        setFlash('error', 'Для работы с приложением нужно войти в систему.');
        redirectTo('login.php');
    }
}

function requirePermission(string $permission): void
{
    requireLogin();

    if (!userCan($permission)) {
        setFlash('error', 'У вас нет прав для выполнения этого действия.');
        redirectTo('books.php');
    }
}

function isValidPassword(string $password): bool
{
    return (bool)preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password);
}
