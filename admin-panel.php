<!-- far more convenient to have -->
<nav class="navbar navbar-expand-lg navbar-primary bg-dark">
  <a class="navbar-brand" style="color:red;" href="#">ADMIN CONNECTED</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item text-warning">
          <?php echo('{'.$_SESSION['user']['pseudo'].'} you are a powerful ADMIN !'); ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">sign out from ADMIN</a>
      </li>
    </ul>
  </div>
</nav>