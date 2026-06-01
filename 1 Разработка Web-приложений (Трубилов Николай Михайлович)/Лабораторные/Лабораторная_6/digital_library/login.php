<?php
require_once __DIR__ . '/includes/bootstrap.php';

if (isAuthenticated()) {
    redirectTo('books.php');
}

$login = '';

if (isPostRequest()) {
    $login = postValue('login');
    $password = postValue('password');

    $user = findUserByLogin($login);
    if (!$user || !password_verify($password, (string)$user['password_hash'])) {
        setFlash('error', 'Неверный логин или пароль.');
        redirectTo('login.php');
    }

    loginUser($user);
    setFlash('success', 'Вы успешно вошли в систему.');
    redirectTo('books.php');
}

renderHeader('Вход', 'login');
?>
<section class="auth-grid">
    <div class="panel">
        <h2>Вход в систему</h2>
        <form method="post" class="stack-form">
            <label>
                Логин
                <input type="text" name="login" value="<?php echo e($login); ?>" required>
            </label>
            <label>
                Пароль
                <input type="password" name="password" required>
            </label>
            <button type="submit">Войти</button>
        </form>
    </div>

    <div class="panel hint-panel">
        <h2>Первичный администратор</h2>
        <p>Логин: <strong>admin</strong></p>
        <p>Пароль: <strong>Admin12345</strong></p>
        <p>У администратора по умолчанию есть все права.</p>
        <p><a href="register.php">Перейти к регистрации нового пользователя</a></p>
    </div>
</section>
<?php renderFooter(); ?>
