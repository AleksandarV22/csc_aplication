<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="<?php base_url("index.php") ?>">CSC APP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 py-2">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php base_url("index.php") ?>">Home</a>
        </li>       
        <?php if(isset($_SESSION['authenticated'])) : ?>
        
        
        <li class="nav-item ps-2">
          <a class="nav-link text-success-emphasis" href="#">
              <span class="text-body">User: </span> <?php echo $_SESSION['auth_user']['user_fname'] ." ".$_SESSION['auth_user']['user_lname']; ?>
          </a>
        </li>
        <li class="nav-item ps-2">
                <form action="" method="POST">
                    <button type="submit" name="logout_btn"  class="btn btn-success text-white">Logout</button>
                </form>
        </li>
        
        <?php else : ?>
       <li class="nav-item ps-2">
          <a class="btn btn-success" href="<?php base_url("login.php") ?>">Login</a>
        </li>
        <?php endif; ?>
      </ul>
      
    </div>
  </div>
</nav>