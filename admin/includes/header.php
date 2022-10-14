<style>
  .navbar-transparent{
    /* background: linear-gradient(to bottom, rgb(41 115 122 / 32%) 5%, rgb(26 32 53) 100%); */
    background: linear-gradient(to bottom, rgb(42 45 63) 5%, rgb(26 32 53) 100%);
  }
</style>
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:void(0)">Panel</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">
            <i class="fas fa-warehouse headernav"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="../logout">
            <i class="fa fa-sign-out headernav"></i>
            <p class="d-lg-none d-md-block">
              Salir
            </p>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>