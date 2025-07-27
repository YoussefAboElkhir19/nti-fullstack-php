<?php
require_once __DIR__ . '/config.php'; 
// require_once __DIR__ . '/../../includes/config.php';
// حسب مكان الملف
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Page</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  </head>

  <body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid p-4">
    <a class="navbar-brand fw-bold" href="<?= BASE_PATH ?>/student/home">
      <?= isset($_SESSION['name']) ? "Welcome, " . $_SESSION['name'] : "Student App" ?>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_PATH ?>/student/home"><i class="fa-solid fa-people-group"></i> All Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_PATH ?>/class/show"><i class="fa-solid fa-school"></i> All Classes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_PATH ?>/teachers/show"><i class="fa-solid fa-chalkboard-user"></i> All Teachers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_PATH ?>/subjects/show"><i class="fa-solid fa-book"></i> All Subjects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_PATH ?>/auth/register"><i class="fa-solid fa-registered"></i> Register</a>
        </li>

        <?php if (isset($_SESSION['name'])): ?>
          <li class="nav-item">
            <a class="nav-link btn btn-danger " href="<?= BASE_PATH ?>/auth/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
          </li>
         <?php else: ?>
          <li class="nav-item">
            <a class="nav-link btn btn-success " href="<?= BASE_PATH ?>/auth/login">Login</a>
          </li>
        <?php endif; ?>
           
      </ul>
    </div>
  </div>
</nav>
