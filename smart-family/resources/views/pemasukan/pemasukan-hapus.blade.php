
@section('content')
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-home-smile"></i>
            <span class="logo_name">SmartFamily</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bx bx-home-alt"></i>
                    <span class="links_name">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('content') }}">
                    <i class="bx bx-bar-chart-alt-2"></i>
                    <span class="links_name">Managemen</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemasukan.index') }}">
                    <i class="bx bx-money"></i>
                    <span class="links_name">Pemasukan Bulan Ini</span>
                </a>
            </li>
            <li>
                <a href="{{ route('tambahkeluarga') }}">
                    <i class="bx bx-laugh"></i>
                    <span class="links_name">Keluarga</span>
                </a>
            </li>
        </ul>
        <div class="logout-button-container">
            <a href="{{ route('logout') }}"><button class="logout-button">Logout</button></a>
        </div>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Welcome, {{ Auth::user()->username }}</span>
            </div>
        </nav>

        <div class="home-content">
            <h1>Konfirmasi Hapus Pemasukan</h1>

            <p>Apakah Anda yakin ingin menghapus pemasukan berikut?</p>

            <div class="confirmation-box">
                <p><strong>Tanggal:</strong> {{ $pemasukan->date }}</p>
                <p><strong>Jumlah:</strong> Rp {{ number_format($pemasukan->jumlah_pemasukan, 0, ',', '.') }}</p>
                <p><strong>Sumber:</strong> {{ $pemasukan->asal_dana }}</p>
            </div>

            <form method="POST" action="{{ route('pemasukan.destroy', $pemasukan->id_pemasukan) }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="{{ route('pemasukan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        };
    </script>
@endsection
