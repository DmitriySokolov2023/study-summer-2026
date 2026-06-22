<?php
require_once __DIR__ . '/includes/bootstrap.php';

if (isAuthenticated()) {
    redirectTo('books.php');
}

redirectTo('login.php');
