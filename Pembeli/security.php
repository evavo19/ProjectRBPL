<?php
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax']);