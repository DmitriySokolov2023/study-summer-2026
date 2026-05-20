<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('delete');

if (!isPostRequest()) {
    redirectTo('books.php');
}

requireValidCsrfToken('books.php');

$id = (int)($_POST['id'] ?? 0);
$books = getBooks();
$filtered = array_values(array_filter($books, static function (array $book) use ($id): bool {
    return (int)$book['id'] !== $id;
}));

if (count($filtered) === count($books)) {
    setFlash('error', 'Книга не найдена.');
} else {
    saveBooks($filtered);
    setFlash('success', 'Книга удалена.');
}

redirectTo('books.php');
