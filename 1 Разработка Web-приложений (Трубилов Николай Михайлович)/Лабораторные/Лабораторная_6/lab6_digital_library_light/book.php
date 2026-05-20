<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('view');

$id = (int)getValue('id');
$book = $id > 0 ? findBookById($id) : null;

if (!$book) {
    setFlash('error', 'Книга не найдена.');
    redirectTo('books.php');
}

renderHeader('Карточка книги', 'books');
?>
<section class="book-detail">
    <div class="book-detail-main">
        <span class="format-badge detail-badge"><?php echo e((string)($book['format'] ?? '')); ?></span>
        <h2><?php echo e((string)$book['title']); ?></h2>
        <p class="detail-author"><?php echo e((string)$book['author']); ?></p>
        <p class="detail-description"><?php echo e((string)($book['description'] ?? 'Описание отсутствует.')); ?></p>
    </div>

    <aside class="detail-meta">
        <h3>Информация о книге</h3>
        <dl class="meta-list">
            <div><dt>Жанр</dt><dd><?php echo e((string)($book['genre'] ?? '')); ?></dd></div>
            <div><dt>Год</dt><dd><?php echo e((string)($book['year'] ?? '')); ?></dd></div>
            <div><dt>Издательство</dt><dd><?php echo e((string)($book['publisher'] ?? 'не указано')); ?></dd></div>
            <div><dt>ISBN</dt><dd><?php echo e((string)($book['isbn'] ?? 'не указан')); ?></dd></div>
            <div><dt>Файл</dt><dd><?php echo e((string)($book['file_name'] ?? 'не указан')); ?></dd></div>
            <div><dt>Добавлено</dt><dd><?php echo e((string)($book['created_at'] ?? '')); ?></dd></div>
        </dl>
    </aside>
</section>

<section class="panel panel-compact">
    <div class="actions">
        <a class="button-secondary" href="books.php">Вернуться в каталог</a>
        <?php if (userCan('edit')): ?>
            <a class="button-link" href="book_form.php?id=<?php echo (int)$book['id']; ?>">Редактировать книгу</a>
        <?php endif; ?>
    </div>
</section>
<?php renderFooter(); ?>
