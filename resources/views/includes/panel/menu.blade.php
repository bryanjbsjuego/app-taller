<!-- Navigation -->
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./examples/icons.html">
        <i class="ni ni-planet text-blue"></i> Especialidades
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./examples/maps.html">
        <i class="ni ni-single-02 text-orange"></i> Médicos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./examples/profile.html">
        <i class="ni ni-satisfied text-yellow"></i> Pacientes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./examples/tables.html">
        <i class="ni ni-bullet-list-67 text-info"></i> Horarios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();" >
        <i class="ni ni-button-power text-default "></i> Cerrar sesión
      </a>
      <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
      @csrf
      </form>
    </li>
  
  </ul>
  <!-- Divider -->
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
        <i class="ni ni-collection text-yellow"></i> Frecuencia de citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-spaceship text-orange"></i> Médicos más activos
      </a>
    </li>
    
  </ul>