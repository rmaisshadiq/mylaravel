<header>
    <! -- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Akademik</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" <span
                    class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mahasiswa') }}">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dosen') }}">Dosen</a>
                            </l>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prodi', ['jurusan'=>'ti', 'prodi']) }}">Prodi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
 </header>
 