<?php
require_once __DIR__ . '/includes/config.php';

// تحديد الرابط المطلوب
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$path = str_replace($script_name, '', $request_uri);
$path = trim($path, '/');

// إزالة BASE_PATH لو موجود في الرابط
if (strpos($path, ltrim(BASE_PATH, '/')) === 0) {
    $path = substr($path, strlen(ltrim(BASE_PATH, '/')));
    $path = trim($path, '/');
}

// $id = $_GET['id'];

// راوتينج
switch ($path) {
    case '':
    case 'student/home':
        require 'pages/student/home.php';
        break;

    // students
    case 'student/add':
        require 'pages/student/student_add.php';
        break;
    case 'student/edit':
        require 'pages/student/editStudent.php';
        break;

    // classies
    case 'class/show':
        require 'pages/class/show.php';
        break;
    case 'class/add':
        require 'pages/class/add.php';
        break;
    case 'class/edit':
        require 'pages/class/edit.php';
        break;
    // teachers
    case 'teachers/show':
        require 'pages/teachers/show.php';
        break;
    case 'teachers/add':
        require 'pages/teachers/add.php';
        break;
    case 'teachers/edit':
        require 'pages/teachers/edit.php';
        break;
    // subjects
    case 'subjects/show':
        require 'pages/subjects/show.php';
        break;
    case 'subjects/add':
        require 'pages/subjects/add.php';
        break;
    case 'subjects/edit':
        require 'pages/subjects/edit.php';
        break;

    // auth
    case 'auth/login':
        require 'pages/auth/login.php';
        break;
    case 'auth/logout':
        require 'pages/auth/logout.php';
        break;
    case 'auth/register':
        require 'pages/auth/register.php';
        break;

    default:
        http_response_code(404);
        echo "الصفحة غير موجودة";
        break;
}
