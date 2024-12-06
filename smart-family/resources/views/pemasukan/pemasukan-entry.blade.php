
@extends('layouts.app')
<form method="POST" action="{{ route('pemasukan.store') }}" class= "crud">
    @csrf
    <div class="form-group">
        <label for="tanggal">Tanggal Pemasukan:</label>
        <input type="text" id="tanggal" name="tanggal" required placeholder="YYYY-MM-DD" />
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah Pemasukan (Rp):</label>
        <input type="number" id="jumlah" name="jumlah" required />
    </div>
    <div class="form-group">
        <label for="sumber">Sumber Pemasukan:</label>
        <input type="text" id="sumber" name="sumber" required />
    </div>
    <button type="submit" class="btn">Simpan</button>
    <a href="{{ route('pemasukan.index') }}" class="btn">Kembali</a>
</form>
