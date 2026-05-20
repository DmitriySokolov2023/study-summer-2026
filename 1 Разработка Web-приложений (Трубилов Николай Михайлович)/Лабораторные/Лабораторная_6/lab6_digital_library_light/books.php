<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('view');

$query = getValue('q');
$books = getBooks();

usort($books, static function (array $left, array $right): int {
    return strcmp((string)$left['title'], (string)$right['title']);
});

if ($query !== '') {
    $books = array_values(array_filter($books, static function (array $book) use ($query): bool {
        $haystack = implode(' ', [
            $book['title'] ?? '',
            $book['author'] ?? '',
            $book['genre'] ?? '',
            $book['format'] ?? '',
            $book['description'] ?? '',
        ]);

        return stripos($haystack, $query) !== false;
    }));
}

renderHeader('Каталог книг', 'books');
?>
<section class="toolbar">
    <form method="get" class="search-form">
        <input type="text" name="q" placeholder="Поиск по названию, автору, жанру..." value="<?php echo e($query); ?>">
        <button type="submit">Найти</button>
        <?php if ($query !== ''): ?>
            <a class="ghost-link" href="books.php">Сбросить</a>
        <?php endif; ?>
    </form>
    <?php if (userCan('edit')): ?>
        <a class="button-link" href="book_form.php">Добавить книгу</a>
    <?php endif; ?>
</section>

<?php if (!$books): ?>
    <div class="empty-state">По вашему запросу книги не найдены.</div>
<?php else: ?>
    <div class="book-grid">
        <?php foreach ($books as $book): ?>
            <article class="book-card">
                <div class="book-card-head">
                    <h3><?php echo e((string)$book['title']); ?></h3>
                    <span class="format-badge"><?php echo e((string)$book['format']); ?></span>
                </div>
                <p><strong>Автор:</strong> <?php echo e((string)$book['author']); ?></p>
                <p><strong>Жанр:</strong> <?php echo e((string)$book['genre']); ?></p>
                <p><strong>Год:</strong> <?php echo e((string)$book['year']); ?></p>
                <p><strong>Описание:</strong> <?php echo e((string)$book['description']); ?></p>
                <?php if (userCan('edit') || userCan('delete')): ?>
                    <div class="actions">
                        <?php if (userCan('edit')): ?>
                            <a class="button-secondary" href="book_form.php?id=<?php echo (int)$book['id']; ?>">Редактировать</a>
                        <?php endif; ?>
                        <?php if (userCan('delete')): ?>
                            <form method="post" action="delete_book.php" onsubmit="return confirm('Удалить книгу?');">
                                <input type="hidden" name="id" value="<?php echo (int)$book['id']; ?>">
                                <button type="submit" class="button-danger">Удалить</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php renderFooter(); ?>
