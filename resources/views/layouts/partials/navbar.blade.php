<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="/groupclasses"> <i class="bi bi-archive-fill"></i> SAS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('groupclasses*') ? 'active' : '' }}" aria-current="page" href="/groupclasses"> <i class="bi bi-house-heart-fill"></i> Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('master_*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-key-fill"></i> Master Menu
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/master_class"> <i class="bi bi-key-fill"></i> Master Kelas</a></li>
              <li><a class="dropdown-item" href="/master_status"> <i class="bi bi-key-fill"></i> Master Status</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('studentabsence*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-archive-fill"></i> Attendance
            </a>
            <ul class="dropdown-menu">
              @if ($check == false)
              <form action="/studentabsence" method="post">
                @csrf
                <li class="dropdown-item">
                  @foreach ( $statuses as $status )
                  <input class="form-check-input" type="radio" name="master_statuses_id" id="hadir" value="{{ $status->id }}">
                  <label class="form-label" for="hadir"> {{ $status->status }} </label>
                  @endforeach
                  <button class="btn btn-primary btn-sm" name="submit" type="submit"><i class="bi bi-send-fill"></i> </button>
                </li>
              </form>
              @else
              <li class="dropdown-item">
                <p>You're already absence</p>
              </li>
              @endif
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav me-5 mb-2 mb-lg-0">
          <li class="nav-item">
            <p class="text-dark"> <i class="bi bi-person-circle"> </i> {{ auth()->user()->name }} | <i class="bi bi-envelope-at"></i> {{ auth()->user()->email }} </p>
          </li>
          <li class="nav-item ms-3">
            <form action="/logout" method="post">
            @csrf
              <button class="btn btn-danger btn-sm"> <i class="bi bi-box-arrow-right"> </i></button>
            </form>
          </li>
        </ul>
        {{-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </nav>