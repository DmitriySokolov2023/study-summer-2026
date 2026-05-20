<?php

function initializeApplication(): void
{
    if (!is_dir(DATA_DIR)) {
        mkdir(DATA_DIR, 0777, true);
    }

    if (!is_dir(ASSETS_DIR)) {
        mkdir(ASSETS_DIR, 0777, true);
    }

    if (!file_exists(USERS_FILE)) {
        writeJsonFile(USERS_FILE, [
            [
                'id' => 1,
                'login' => 'admin',
                'full_name' => 'Главный администратор',
                'password_hash' => '$2y$10$LDkE1.v8AoXqjzqC3HelSuYz4KmLTGdEQCMK0QOyscDnR61U8..82',
                'role' => 'admin',
                'permissions' => [
                    'view' => true,
                    'edit' => true,
                    'delete' => true,
                    'manage_users' => true,
                ],
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }

    if (!file_exists(BOOKS_FILE)) {
        writeJsonFile(BOOKS_FILE, getDefaultBooks());
    }
}

function getDefaultBooks(): array
{
    return [
        [
            'id' => 1,
            'title' => 'Мастер и Маргарита',
            'author' => 'Михаил Булгаков',
            'genre' => 'Роман',
            'year' => 1967,
            'format' => 'PDF',
            'description' => 'Классический роман о Москве, любви и свободе.',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'id' => 2,
            'title' => 'Преступление и наказание',
            'author' => 'Федор Достоевский',
            'genre' => 'Роман',
            'year' => 1866,
            'format' => 'EPUB',
            'description' => 'Психологический роман о выборе, вине и совести.',
            'created_at' => date('Y-m-d H:i:s'),
        ],
        [
            'id' => 3,
            'title' => 'Война и мир',
            'author' => 'Лев Толстой',
            'genre' => 'Эпопея',
            'year' => 1869,
            'format' => 'FB2',
            'description' => 'Историческое произведение о судьбах людей на фоне войны.',
            'created_at' => date('Y-m-d H:i:s'),
        ],
    ];
}

function readJsonFile(string $path): array
{
    if (!file_exists($path)) {
        return [];
    }

    $content = file_get_contents($path);
    if ($content === false || trim($content) === '') {
        return [];
    }

    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}

function writeJsonFile(string $path, array $data): void
{
    file_put_contents(
        $path,
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    );
}

function getUsers(): array
{
    return readJsonFile(USERS_FILE);
}

function saveUsers(array $users): void
{
    writeJsonFile(USERS_FILE, array_values($users));
}

function getBooks(): array
{
    return readJsonFile(BOOKS_FILE);
}

function saveBooks(array $books): void
{
    writeJsonFile(BOOKS_FILE, array_values($books));
}

function findUserByLogin(string $login): ?array
{
    foreach (getUsers() as $user) {
        if (($user['login'] ?? '') === $login) {
            return $user;
        }
    }

    return null;
}

function findUserById(int $id): ?array
{
    foreach (getUsers() as $user) {
        if ((int)($user['id'] ?? 0) === $id) {
            return $user;
        }
    }

    return null;
}

function findBookById(int $id): ?array
{
    foreach (getBooks() as $book) {
        if ((int)($book['id'] ?? 0) === $id) {
            return $book;
        }
    }

    return null;
}

function nextId(array $items): int
{
    $maxId = 0;
    foreach ($items as $item) {
        $maxId = max($maxId, (int)($item['id'] ?? 0));
    }

    return $maxId + 1;
}
