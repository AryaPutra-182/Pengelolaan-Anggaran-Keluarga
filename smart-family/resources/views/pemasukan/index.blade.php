
@extends('layouts.app')
@section('title', 'Daftar Pemasukan')

@section('content')
    <div class="home-content">
        <h1>Daftar Pemasukan</h1>

        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @elseif(session('error'))
            <p style="color: red">{{ session('error') }}</p>
        @endif

        <a href="{{ route('pemasukan.create') }}"><button class = "entry-button">Tambah Pemasukan</button></a>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jumlah Pemasukan</th>
                        <th>Sumber</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemasukans as $pemasukan)
                        <tr>
                            <td>{{ $pemasukan->tanggal }}</td>
                            <td>{{ number_format($pemasukan->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $pemasukan->asaldana }}</td>
                           <td>
    <a href="{{ route('pemasukan.edit', $pemasukan->id_pemasukan) }}" class="uni1 edit">Edit</a>

    <!-- Tombol Hapus -->
    <form action="{{ route('pemasukan.destroy', $pemasukan->id_pemasukan) }}"  method="POST" style="display:inline;" class = "crud">
        @csrf
        @method('DELETE')
        <a href="#" class="uni1 delete" onclick="this.closest('form').submit();">Hapus</a>
    </form>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
