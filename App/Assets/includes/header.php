<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../Assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../Assets/css/default.min.css">
<link rel="stylesheet" type="text/css" href="../../Assets/css/alertify.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="../../Assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../Assets/js/alertify.js"></script>

<script type="text/javascript" src="../../Assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../Assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../../Assets/js/bootstrap-datepicker.pt-BR.min.js"></script>

<nav class="navbar navbar-dark bg-dark">
  <div class="form-inline">
    <span class="navbar-brand mb-0 h1"><a href="" class="btn btn-default" id="menu-toggle"><i class="fas fa-bars" style="color: white;"></i></a></span>
    <span class="navbar-brand mb-0 h1">Bem Vindo, <?php echo $_SESSION['usuario'] ?>!</span>
  </div>
  <ul class="navbar-nav mr-sm-3">
      <li class="nav-item"><a class="nav-link" href="../../../index.php?logout=1">Sair</a></li>
  </ul>
</nav>