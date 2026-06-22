<?php

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function setFlash(string $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}

function consumeFlash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function renderHeader(string $title, string $active = ''): void
{
    $user = currentUser();
    $flash = consumeFlash();
    ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<div class="page-shell">
    <header class="topbar">
        <div class="brand-block">
            <h1 class="brand-title">Digital Library</h1>
            <p class="brand-subtitle">Электронная библиотека на PHP и текстовых файлах</p>
        </div>
        <nav class="main-nav">
            <?php if ($user): ?>
                <a class="<?php echo $active === 'books' ? 'active' : ''; ?>" href="books.php">Каталог</a>
                <?php if (userCan('edit')): ?>
                    <a class="<?php echo $active === 'book_form' ? 'active' : ''; ?>" href="book_form.php">Добавить книгу</a>
                <?php endif; ?>
                <?php if (userCan('manage_users')): ?>
                    <a class="<?php echo $active === 'users' ? 'active' : ''; ?>" href="users.php">Пользователи</a>
                <?php endif; ?>
                <a href="logout.php">Выход</a>
            <?php else: ?>
                <a class="<?php echo $active === 'login' ? 'active' : ''; ?>" href="login.php">Вход</a>
                <a class="<?php echo $active === 'register' ? 'active' : ''; ?>" href="register.php">Регистрация</a>
            <?php endif; ?>
        </nav>
    </header>

    <?php if ($user): ?>
        <section class="user-strip">
            <span>Пользователь: <strong><?php echo e((string)($user['full_name'] ?: $user['login'])); ?></strong></span>
            <span>Логин: <?php echo e((string)$user['login']); ?></span>
            <span>Роль: <?php echo e((string)$user['role']); ?></span>
        </section>
    <?php endif; ?>

    <?php if ($flash): ?>
        <div class="flash flash-<?php echo e((string)$flash['type']); ?>">
            <?php echo e((string)$flash['message']); ?>
        </div>
    <?php endif; ?>

    <main class="content-card">
    <?php
}

function renderFooter(): void
{
    ?>
    </main>
</div>
</body>
</html>
    <?php
}
