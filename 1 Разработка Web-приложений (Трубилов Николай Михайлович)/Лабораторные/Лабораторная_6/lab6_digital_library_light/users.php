<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('manage_users');

if (isPostRequest()) {
    $action = postValue('action');
    $userId = (int)($_POST['user_id'] ?? 0);
    $users = getUsers();

    foreach ($users as $index => $user) {
        if ((int)$user['id'] !== $userId) {
            continue;
        }

        if (($user['role'] ?? '') === 'admin') {
            setFlash('error', 'Запись администратора защищена от изменения через этот интерфейс.');
            redirectTo('users.php');
        }

        if ($action === 'update_rights') {
            $users[$index]['permissions'] = [
                'view' => isset($_POST['view']),
                'edit' => isset($_POST['edit']),
                'delete' => isset($_POST['delete']),
                'manage_users' => isset($_POST['manage_users']),
            ];
            saveUsers($users);
            setFlash('success', 'Права пользователя обновлены.');
            redirectTo('users.php');
        }

        if ($action === 'delete_user') {
            if ((int)($user['id'] ?? 0) === (int)(currentUser()['id'] ?? 0)) {
                setFlash('error', 'Нельзя удалить текущего пользователя.');
                redirectTo('users.php');
            }

            unset($users[$index]);
            saveUsers($users);
            setFlash('success', 'Пользователь удален.');
            redirectTo('users.php');
        }
    }

    setFlash('error', 'Пользователь не найден.');
    redirectTo('users.php');
}

$users = getUsers();
usort($users, static function (array $left, array $right): int {
    return strcmp((string)$left['login'], (string)$right['login']);
});

renderHeader('Управление пользователями', 'users');
?>
<section class="panel">
    <h2>Пользователи и права доступа</h2>
    <p class="note">Права: просмотр, редактирование книг, удаление книг, управление пользователями.</p>

    <div class="users-grid">
        <?php foreach ($users as $user): ?>
            <article class="user-card">
                <h3><?php echo e((string)$user['full_name']); ?></h3>
                <p><strong>Логин:</strong> <?php echo e((string)$user['login']); ?></p>
                <p><strong>Роль:</strong> <?php echo e((string)$user['role']); ?></p>

                <?php if (($user['role'] ?? '') === 'admin'): ?>
                    <div class="permissions-list">
                        <span>Просмотр: да</span>
                        <span>Редактирование: да</span>
                        <span>Удаление: да</span>
                        <span>Управление правами: да</span>
                    </div>
                    <p class="note">Администратор создается системой автоматически и защищен от удаления.</p>
                <?php else: ?>
                    <form method="post" class="stack-form compact-form">
                        <input type="hidden" name="action" value="update_rights">
                        <input type="hidden" name="user_id" value="<?php echo (int)$user['id']; ?>">
                        <label class="checkbox-row">
                            <input type="checkbox" name="view" <?php echo !empty($user['permissions']['view']) ? 'checked' : ''; ?>>
                            Просмотр
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" name="edit" <?php echo !empty($user['permissions']['edit']) ? 'checked' : ''; ?>>
                            Редактирование
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" name="delete" <?php echo !empty($user['permissions']['delete']) ? 'checked' : ''; ?>>
                            Удаление
                        </label>
                        <label class="checkbox-row">
                            <input type="checkbox" name="manage_users" <?php echo !empty($user['permissions']['manage_users']) ? 'checked' : ''; ?>>
                            Управление правами
                        </label>
                        <div class="actions">
                            <button type="submit">Сохранить права</button>
                        </div>
                    </form>

                    <form method="post" onsubmit="return confirm('Удалить пользователя?');">
                        <input type="hidden" name="action" value="delete_user">
                        <input type="hidden" name="user_id" value="<?php echo (int)$user['id']; ?>">
                        <button type="submit" class="button-danger">Удалить пользователя</button>
                    </form>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php renderFooter(); ?>
