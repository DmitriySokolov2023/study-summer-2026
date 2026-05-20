<?php
require_once __DIR__ . '/includes/bootstrap.php';

if (isAuthenticated()) {
    redirectTo('books.php');
}

$fullName = '';
$login = '';
$errors = [];

if (isPostRequest()) {
    $fullName = postValue('full_name');
    $login = postValue('login');
    $password = postValue('password');
    $confirm = postValue('confirm_password');

    if ($fullName === '') {
        $errors[] = 'Нужно указать имя пользователя.';
    }

    if ($login === '') {
        $errors[] = 'Нужно указать логин.';
    } elseif (findUserByLogin($login)) {
        $errors[] = 'Пользователь с таким логином уже существует.';
    }

    if (!isValidPassword($password)) {
        $errors[] = 'Пароль должен содержать минимум 8 символов, латинские буквы и цифры.';
    }

    if ($password !== $confirm) {
        $errors[] = 'Подтверждение пароля не совпадает.';
    }

    if (!$errors) {
        $users = getUsers();
        $users[] = [
            'id' => nextId($users),
            'login' => $login,
            'full_name' => $fullName,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user',
            'permissions' => [
                'view' => true,
                'edit' => false,
                'delete' => false,
                'manage_users' => false,
            ],
            'created_at' => date('Y-m-d H:i:s'),
        ];

        saveUsers($users);
        setFlash('success', 'Регистрация прошла успешно. Теперь можно войти.');
        redirectTo('login.php');
    }
}

renderHeader('Регистрация', 'register');
?>
<section class="auth-grid">
    <div class="panel">
        <h2>Регистрация пользователя</h2>
        <?php if ($errors): ?>
            <div class="flash flash-error">
                <?php echo e(implode(' ', $errors)); ?>
            </div>
        <?php endif; ?>
        <form method="post" class="stack-form">
            <label>
                Имя
                <input type="text" name="full_name" value="<?php echo e($fullName); ?>" required>
            </label>
            <label>
                Логин
                <input type="text" name="login" value="<?php echo e($login); ?>" required>
            </label>
            <label>
                Пароль
                <input type="password" name="password" required>
            </label>
            <label>
                Повторите пароль
                <input type="password" name="confirm_password" required>
            </label>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <p class="note">После регистрации новый пользователь получает только право просмотра данных.</p>
    </div>
</section>
<?php renderFooter(); ?>
