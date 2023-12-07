        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="./">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('usuarios.index') }}">
                  <span data-feather="users"></span>
                  Usuarios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('habitaciones.index') }}">
                  <span data-feather="home"></span>
                  Habitaciones
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('reservaciones.index') }}">
                  <span data-feather="clock"></span>
                  Reservaciones
                </a>
              </li>
            
            </ul>

            
          </div>
        </nav>