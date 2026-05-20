<?php
require_once __DIR__ . '/includes/bootstrap.php';

requirePermission('manage_users');

if (isPostRequest()) {
    requireValidCsrfToken('users.php');
    $action = postValue('action');
    $userId = (int)($_POST['user_id'] ?? 0);
    $users = getUsers();

    foreach ($users as $index => $user) {
        if ((int)$user['id'] !== $userId) {
            continue;
        }

        if (($user['role'] ?? '') === 'admin') {
            setFlash('error', 'Учетная запись администратора защищена от изменения через этот интерфейс.');
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

$adminsCount = count(array_filter($users, static fn(array $user): bool => ($user['role'] ?? '') === 'admin'));
$editCount = count(array_filter($users, static fn(array $user): bool => !empty($user['permissions']['edit']) || ($user['role'] ?? '') === 'admin'));
$deleteCount = count(array_filter($users, static fn(array $user): bool => !empty($user['permissions']['delete']) || ($user['role'] ?? '') === 'admin'));

renderHeader('Управление пользователями', 'users');
?>
<section class="stats-grid">
    <article class="stat-card">
        <span class="stat-label">Всего пользователей</span>
        <strong class="stat-value"><?php echo count($users); ?></strong>
    </article>
    <article class="stat-card">
        <span class="stat-label">Администраторов</span>
        <strong class="stat-value"><?php echo $adminsCount; ?></strong>
    </article>
    <article class="stat-card">
        <span class="stat-label">С правом редактирования</span>
        <strong class="stat-value"><?php echo $editCount; ?></strong>
    </article>
    <article class="stat-card">
        <span class="stat-label">С правом удаления</span>
        <strong class="stat-value"><?php echo $deleteCount; ?></strong>
    </article>
</section>

<section class="panel users-panel">
    <div class="panel-heading">
        <div>
            <h2>Пользователи и права доступа</h2>
            <p class="note">Здесь можно менять права, а также удалять учетные записи обычных пользователей.</p>
        </div>
    </div>

    <div class="users-grid enhanced-users-grid">
        <?php foreach ($users as $user): ?>
            <?php
            $displayName = (string)($user['full_name'] ?: $user['login']);
            $avatarLetter = mb_strtoupper(mb_substr($displayName, 0, 1));
            $isAdmin = ($user['role'] ?? '') === 'admin';
            ?>
            <article class="user-card enhanced-user-card">
                <div class="user-card-top">
                    <div class="user-avatar user-avatar-large" aria-hidden="true"><?php echo e($avatarLetter); ?></div>
                    <div class="user-card-meta">
                        <h3><?php echo e($displayName); ?></h3>
                        <p class="user-card-login">@<?php echo e((string)$user['login']); ?></p>
                    </div>
                    <span class="user-role-badge <?php echo $isAdmin ? 'user-role-admin' : 'user-role-user'; ?>">
                        <?php echo $isAdmin ? 'admin' : 'user'; ?>
                    </span>
                </div>

                <div class="permissions-list permissions-list-card">
                    <span class="<?php echo !empty($user['permissions']['view']) || $isAdmin ? 'perm-enabled' : 'perm-disabled'; ?>">Просмотр</span>
                    <span class="<?php echo !empty($user['permissions']['edit']) || $isAdmin ? 'perm-enabled' : 'perm-disabled'; ?>">Редактирование</span>
                    <span class="<?php echo !empty($user['permissions']['delete']) || $isAdmin ? 'perm-enabled' : 'perm-disabled'; ?>">Удаление</span>
                    <span class="<?php echo !empty($user['permissions']['manage_users']) || $isAdmin ? 'perm-enabled' : 'perm-disabled'; ?>">Управление правами</span>
                </div>

                <?php if ($isAdmin): ?>
                    <p class="note">Администратор создается системой автоматически и недоступен для удаления из интерфейса.</p>
                <?php else: ?>
                    <form method="post" class="stack-form compact-form">
                        <?php csrfField(); ?>
                        <input type="hidden" name="action" value="update_rights">
                        <input type="hidden" name="user_id" value="<?php echo (int)$user['id']; ?>">

                        <div class="permission-editor">
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
                        </div>

                        <div class="actions user-card-actions">
                            <button type="submit">Сохранить права</button>
                        </div>
                    </form>

                    <form method="post" onsubmit="return confirm('Удалить пользователя?');">
                        <?php csrfField(); ?>
                        <input type="hidden" name="action" value="delete_user">
                        <input type="hidden" name="user_id" value="<?php echo (int)$user['id']; ?>">
                        <button type="submit" class="button-danger button-danger-wide">Удалить пользователя</button>
                    </form>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php renderFooter(); ?>
