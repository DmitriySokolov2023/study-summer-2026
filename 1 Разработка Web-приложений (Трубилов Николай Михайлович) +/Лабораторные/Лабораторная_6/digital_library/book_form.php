<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('edit');

$bookId = (int)($_GET['id'] ?? $_POST['id'] ?? 0);
$book = $bookId > 0 ? findBookById($bookId) : null;
$isEdit = $book !== null;

$values = [
    'title' => $book['title'] ?? '',
    'author' => $book['author'] ?? '',
    'genre' => $book['genre'] ?? '',
    'year' => isset($book['year']) ? (string)$book['year'] : '',
    'format' => $book['format'] ?? '',
    'description' => $book['description'] ?? '',
];

$errors = [];

if (isPostRequest()) {
    foreach ($values as $field => $default) {
        $values[$field] = postValue($field);
    }

    if ($values['title'] === '') {
        $errors[] = 'Нужно указать название книги.';
    }
    if ($values['author'] === '') {
        $errors[] = 'Нужно указать автора.';
    }
    if ($values['genre'] === '') {
        $errors[] = 'Нужно указать жанр.';
    }
    if ($values['format'] === '') {
        $errors[] = 'Нужно указать формат файла.';
    }
    if ($values['year'] === '' || !ctype_digit($values['year'])) {
        $errors[] = 'Год издания должен быть целым числом.';
    }

    if (!$errors) {
        $books = getBooks();
        $payload = [
            'id' => $isEdit ? (int)$book['id'] : nextId($books),
            'title' => $values['title'],
            'author' => $values['author'],
            'genre' => $values['genre'],
            'year' => (int)$values['year'],
            'format' => $values['format'],
            'description' => $values['description'],
            'created_at' => $book['created_at'] ?? date('Y-m-d H:i:s'),
        ];

        if ($isEdit) {
            foreach ($books as $index => $item) {
                if ((int)$item['id'] === (int)$payload['id']) {
                    $books[$index] = $payload;
                    break;
                }
            }
            setFlash('success', 'Книга успешно обновлена.');
        } else {
            $books[] = $payload;
            setFlash('success', 'Книга успешно добавлена.');
        }

        saveBooks($books);
        redirectTo('books.php');
    }
}

renderHeader($isEdit ? 'Редактирование книги' : 'Добавление книги', 'book_form');
?>
<section class="panel">
    <h2><?php echo $isEdit ? 'Редактирование книги' : 'Добавление книги'; ?></h2>
    <?php if ($errors): ?>
        <div class="flash flash-error">
            <?php echo e(implode(' ', $errors)); ?>
        </div>
    <?php endif; ?>

    <form method="post" class="stack-form">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?php echo (int)$book['id']; ?>">
        <?php endif; ?>
        <label>
            Название
            <input type="text" name="title" value="<?php echo e($values['title']); ?>" required>
        </label>
        <label>
            Автор
            <input type="text" name="author" value="<?php echo e($values['author']); ?>" required>
        </label>
        <label>
            Жанр
            <input type="text" name="genre" value="<?php echo e($values['genre']); ?>" required>
        </label>
        <label>
            Год издания
            <input type="text" name="year" value="<?php echo e($values['year']); ?>" required>
        </label>
        <label>
            Формат
            <input type="text" name="format" value="<?php echo e($values['format']); ?>" required>
        </label>
        <label>
            Описание
            <textarea name="description" rows="5"><?php echo e($values['description']); ?></textarea>
        </label>
        <div class="actions">
            <button type="submit"><?php echo $isEdit ? 'Сохранить изменения' : 'Добавить книгу'; ?></button>
            <a class="ghost-link" href="books.php">Вернуться в каталог</a>
        </div>
    </form>
</section>
<?php renderFooter(); ?>
