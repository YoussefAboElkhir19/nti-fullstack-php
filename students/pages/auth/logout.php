<?php
require_once "includes/navBar.php";
session_start();
session_unset();
session_destroy();

header("Location: " . BASE_PATH . "/auth/login");


