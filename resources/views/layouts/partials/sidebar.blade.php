<div class="d-flex flex-column flex-shrink-0 p-3 side-nav">
    <a href="/home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link" aria-current="page">
                <i class="fa-solid fa-house-chimney bi me-2"></i>
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                <i class="fa-solid fa-magnifying-glass bi me-2"></i>
                Search
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                <i class="fa-regular fa-clone bi me-2"></i>
                Library
            </a>
        </li>
        <hr>
        {{-- <br> --}}
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                <i class="fa-solid fa-circle-plus bi me-2"></i>
                Create Playlist
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark">
                <i class="fa-brands fa-gratipay bi me-2"></i>
                Liked Songs
            </a>
        </li>
        <hr>
    </ul>

    {{-- <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div> --}}
</div>
