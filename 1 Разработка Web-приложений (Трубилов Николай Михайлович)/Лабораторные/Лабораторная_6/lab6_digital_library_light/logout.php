<?php
require_once __DIR__ . '/includes/bootstrap.php';

logoutUser();
setFlash('success', 'Вы вышли из системы.');
redirectTo('login.php');
