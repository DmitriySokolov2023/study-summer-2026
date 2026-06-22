<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('view');

$query = getValue('q');
$selectedGenre = getValue('genre');
$selectedFormat = getValue('format');
$sortBy = getValue('sort', 'title');
$allowedSortFields = ['title', 'author', 'year'];

if (!in_array($sortBy, $allowedSortFields, true)) {
    $sortBy = 'title';
}

$books = getBooks();
$genres = array_values(array_unique(array_filter(array_map(static function (array $book): string {
    return (string)($book['genre'] ?? '');
}, $books))));
$formats = array_values(array_unique(array_filter(array_map(static function (array $book): string {
    return (string)($book['format'] ?? '');
}, $books))));

sort($genres, SORT_NATURAL | SORT_FLAG_CASE);
sort($formats, SORT_NATURAL | SORT_FLAG_CASE);

$normalizeBookText = static function (string $value): string {
    return function_exists('mb_strtolower')
        ? mb_strtolower($value, 'UTF-8')
        : strtolower($value);
};

if ($query !== '' || $selectedGenre !== '' || $selectedFormat !== '') {
    $books = array_values(array_filter($books, static function (array $book) use ($query, $selectedGenre, $selectedFormat, $normalizeBookText): bool {
        if ($selectedGenre !== '' && (string)($book['genre'] ?? '') !== $selectedGenre) {
            return false;
        }

        if ($selectedFormat !== '' && (string)($book['format'] ?? '') !== $selectedFormat) {
            return false;
        }

        if ($query === '') {
            return true;
        }

        $haystack = implode(' ', [
            $book['title'] ?? '',
            $book['author'] ?? '',
            $book['genre'] ?? '',
            $book['format'] ?? '',
            $book['description'] ?? '',
        ]);

        if (function_exists('mb_stripos')) {
            return mb_stripos($haystack, $query, 0, 'UTF-8') !== false;
        }

        return strpos($normalizeBookText($haystack), $normalizeBookText($query)) !== false;
    }));
}

usort($books, static function (array $left, array $right) use ($sortBy, $normalizeBookText): int {
    if ($sortBy === 'year') {
        return ((int)($left['year'] ?? 0)) <=> ((int)($right['year'] ?? 0));
    }

    return strcmp(
        $normalizeBookText((string)($left[$sortBy] ?? '')),
        $normalizeBookText((string)($right[$sortBy] ?? ''))
    );
});

renderHeader('Каталог книг', 'books');
?>
<section class="toolbar">
    <form method="get" class="search-form">
        <input type="text" name="q" placeholder="Поиск по названию, автору, жанру..." value="<?php echo e($query); ?>">
        <select name="genre">
            <option value="">Все жанры</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?php echo e($genre); ?>" <?php echo $selectedGenre === $genre ? 'selected' : ''; ?>>
                    <?php echo e($genre); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="format">
            <option value="">Все форматы</option>
            <?php foreach ($formats as $format): ?>
                <option value="<?php echo e($format); ?>" <?php echo $selectedFormat === $format ? 'selected' : ''; ?>>
                    <?php echo e($format); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="sort">
            <option value="title" <?php echo $sortBy === 'title' ? 'selected' : ''; ?>>Сортировать по названию</option>
            <option value="author" <?php echo $sortBy === 'author' ? 'selected' : ''; ?>>Сортировать по автору</option>
            <option value="year" <?php echo $sortBy === 'year' ? 'selected' : ''; ?>>Сортировать по году</option>
        </select>
        <button type="submit">Найти</button>
        <?php if ($query !== '' || $selectedGenre !== '' || $selectedFormat !== '' || $sortBy !== 'title'): ?>
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
                <div class="actions">
                    <a class="button-secondary" href="book.php?id=<?php echo (int)$book['id']; ?>">Подробнее</a>
                </div>
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
