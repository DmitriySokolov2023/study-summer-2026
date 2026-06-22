<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('view');

$id = (int)getValue('id');
$book = $id > 0 ? findBookById($id) : null;

if (!$book) {
    setFlash('error', 'Книга не найдена.');
    redirectTo('books.php');
}

$description = trim((string)($book['description'] ?? ''));
$meta = [
    'Автор' => $book['author'] ?? '',
    'Жанр' => $book['genre'] ?? '',
    'Год издания' => $book['year'] ?? '',
    'Формат файла' => $book['format'] ?? '',
    'Издательство' => $book['publisher'] ?? '',
    'ISBN' => $book['isbn'] ?? '',
    'Имя файла' => $book['file_name'] ?? '',
    'Добавлено' => $book['created_at'] ?? '',
];

renderHeader('Карточка книги', 'books');
?>
<section class="book-detail">
    <div class="book-detail-main">
        <div class="book-detail-heading">
            <span class="format-badge"><?php echo e((string)($book['format'] ?? '')); ?></span>
            <span class="book-year"><?php echo e((string)($book['year'] ?? '')); ?></span>
        </div>
        <h2><?php echo e((string)($book['title'] ?? '')); ?></h2>
        <p class="detail-author"><?php echo e((string)($book['author'] ?? '')); ?></p>
        <p class="detail-description">
            <?php echo e($description !== '' ? $description : 'Описание отсутствует.'); ?>
        </p>
        <div class="actions">
            <a class="button-secondary" href="books.php">Вернуться в каталог</a>
            <?php if (userCan('edit')): ?>
                <a class="button-link" href="book_form.php?id=<?php echo (int)$book['id']; ?>">Редактировать книгу</a>
            <?php endif; ?>
        </div>
    </div>

    <aside class="detail-meta">
        <h3>Информация о книге</h3>
        <dl class="meta-list">
            <?php foreach ($meta as $label => $value): ?>
                <div>
                    <dt><?php echo e($label); ?></dt>
                    <dd><?php echo e((string)($value !== '' ? $value : 'не указано')); ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </aside>
</section>
<?php renderFooter(); ?>
