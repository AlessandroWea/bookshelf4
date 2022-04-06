<?php
    $active = $active ?? 'home';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Bookshelf 4</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $active == 'home' ? 'active' : ''?>" href="#">Home</a>
        </li>
        <!-- if not logged in -->
        <li class="nav-item">
          <a class="nav-link <?= $active === 'login' ? 'active' : ''?>" href="/login">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $active === 'signup' ? 'active' : ''?>" href="/signup">Sign up</a>
        </li>
        <!-- when logged in
        <li class="nav-item">
          <a class="nav-link" href="/profile/(current_user_id)">Profile</a>
        </li> -->
    </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>