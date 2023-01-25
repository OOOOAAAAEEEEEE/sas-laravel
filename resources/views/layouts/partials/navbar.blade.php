<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="/groupclasses"> <i class="bi bi-archive"></i> SAS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('groupclasses*') ? 'active' : '' }}" aria-current="page" href="/groupclasses">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('master_*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Master
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/master_classes">Master Kelas</a></li>
              <li><a class="dropdown-item" href="/master_status">Master Status</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout">Log Out </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('studentabsence*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Attendance
            </a>
            <ul class="dropdown-menu">
                <form action="/studentabsence" method="post">
                  @csrf
                  <li class="dropdown-item">
                    <input class="form-check-input" type="radio" name="master_statuses_id" id="hadir" value="2">
                    <label class="form-label" for="hadir">Hadir</label>
                  
                    <input class="form-check-input" type="radio" name="master_statuses_id" id="sakit" value="4">
                    <label class="form-label" for="sakit">Sakit</label>

                    <input class="form-check-input" type="radio" name="master_statuses_id" id="izin" value="3">
                    <label class="form-label" for="izin">Izin</label>

                    <button class="btn btn-primary btn-sm" name="submit" type="submit"> Submit </button>
                  </li>
                </form>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav me-5 mb-2 mb-lg-0">
          <li class="nav-item">
            <p class="text-white"> {{ auth()->user()->name }} </p>
          </li>
        </ul>
        {{-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>