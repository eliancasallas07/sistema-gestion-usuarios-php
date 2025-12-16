<?php
header('Content-Type: application/json');
require_once '../helpers/auth.php';

require_once '../helpers/auth.php';

$user = auth_get_current_user();
if ($user) {
    echo json_encode(['logged' => true, 'user' => $user]);
} else {
    echo json_encode(['logged' => false, 'user' => null]);
}
