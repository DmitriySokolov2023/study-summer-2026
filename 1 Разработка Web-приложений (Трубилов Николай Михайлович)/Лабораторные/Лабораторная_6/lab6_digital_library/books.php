<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('view');

$query = getValue('q');
$genreFilter = getValue('genre');
$formatFilter = getValue('format');
$sort = getValue('sort', 'title_asc');
$books = getBooks();

$genres = [];
$formats = [];
foreach ($books as $book) {
    $genres[] = (string)($book['genre'] ?? '');
    $formats[] = (string)($book['format'] ?? '');
}

$genres = array_values(array_filter(array_unique($genres)));
$formats = array_values(array_filter(array_unique($formats)));
sort($genres);
sort($formats);

$totalBooks = count($books);
$totalGenres = count($genres);
$totalFormats = count($formats);

$books = array_values(array_filter($books, static function (array $book) use ($query, $genreFilter, $formatFilter): bool {
    if ($query !== '') {
        $haystack = implode(' ', [
            $book['title'] ?? '',
            $book['author'] ?? '',
            $book['genre'] ?? '',
            $book['format'] ?? '',
            $book['publisher'] ?? '',
            $book['isbn'] ?? '',
            $book['description'] ?? '',
        ]);

        if (stripos($haystack, $query) === false) {
            return false;
        }
    }

    if ($genreFilter !== '' && (string)($book['genre'] ?? '') !== $genreFilter) {
        return false;
    }

    if ($formatFilter !== '' && (string)($book['format'] ?? '') !== $formatFilter) {
        return false;
    }

    return true;
}));

usort($books, static function (array $left, array $right) use ($sort): int {
    return match ($sort) {
        'title_desc' => strcmp((string)$right['title'], (string)$left['title']),
        'year_desc' => (int)$right['year'] <=> (int)$left['year'],
        'year_asc' => (int)$left['year'] <=> (int)$right['year'],
        'author_asc' => strcmp((string)$left['author'], (string)$right['author']),
        default => strcmp((string)$left['title'], (string)$right['title']),
    };
});

$visibleBooks = count($books);

renderHeader('Каталог книг', 'books');
?>
<section class="stats-grid">
    <article class="stat-card">
        <span class="stat-label">Всего книг</span>
        <strong class="stat-value"><?php echo $totalBooks; ?></strong>
    </article>
    <article class="stat-card">
        <span class="stat-label">Показано</span>
        <strong class="stat-value"><?php echo $visibleBooks; ?></strong>
    </article>
    <article class="stat-card">
        <span class="stat-label">Жанров</span>
        <strong class="stat-value"><?php echo $totalGenres; ?></strong>
    </article>
    <article class="stat-card">
        <span class="stat-label">Форматов</span>
        <strong class="stat-value"><?php echo $totalFormats; ?></strong>
    </article>
</section>

<section class="toolbar panel panel-compact">
    <form method="get" class="search-form search-form-wide">
        <input type="text" name="q" placeholder="Поиск по названию, автору, ISBN..." value="<?php echo e($query); ?>">
        <select name="genre">
            <option value="">Все жанры</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?php echo e($genre); ?>" <?php echo $genre === $genreFilter ? 'selected' : ''; ?>>
                    <?php echo e($genre); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="format">
            <option value="">Все форматы</option>
            <?php foreach ($formats as $format): ?>
                <option value="<?php echo e($format); ?>" <?php echo $format === $formatFilter ? 'selected' : ''; ?>>
                    <?php echo e($format); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="sort">
            <option value="title_asc" <?php echo $sort === 'title_asc' ? 'selected' : ''; ?>>По названию А-Я</option>
            <option value="title_desc" <?php echo $sort === 'title_desc' ? 'selected' : ''; ?>>По названию Я-А</option>
            <option value="author_asc" <?php echo $sort === 'author_asc' ? 'selected' : ''; ?>>По автору</option>
            <option value="year_desc" <?php echo $sort === 'year_desc' ? 'selected' : ''; ?>>Сначала новые</option>
            <option value="year_asc" <?php echo $sort === 'year_asc' ? 'selected' : ''; ?>>Сначала старые</option>
        </select>
        <button type="submit">Применить</button>
        <?php if ($query !== '' || $genreFilter !== '' || $formatFilter !== '' || $sort !== 'title_asc'): ?>
            <a class="ghost-link" href="books.php">Сбросить</a>
        <?php endif; ?>
    </form>
    <?php if (userCan('edit')): ?>
        <a class="button-link" href="book_form.php">Добавить книгу</a>
    <?php endif; ?>
</section>

<?php if (!$books): ?>
    <div class="empty-state">По выбранным условиям книги не найдены.</div>
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
                <p><strong>Издательство:</strong> <?php echo e((string)($book['publisher'] ?? 'не указано')); ?></p>
                <p class="book-description"><?php echo e((string)$book['description']); ?></p>

                <div class="actions">
                    <a class="button-secondary" href="book.php?id=<?php echo (int)$book['id']; ?>">Подробнее</a>
                    <?php if (userCan('edit')): ?>
                        <a class="button-secondary" href="book_form.php?id=<?php echo (int)$book['id']; ?>">Редактировать</a>
                    <?php endif; ?>
                    <?php if (userCan('delete')): ?>
                        <form method="post" action="delete_book.php" onsubmit="return confirm('Удалить книгу?');">
                            <?php csrfField(); ?>
                            <input type="hidden" name="id" value="<?php echo (int)$book['id']; ?>">
                            <button type="submit" class="button-danger">Удалить</button>
                        </form>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php renderFooter(); ?>
