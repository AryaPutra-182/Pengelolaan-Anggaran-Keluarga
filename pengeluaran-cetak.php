<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$query = mysqli_query($koneksi, "SELECT * FROM tb_pengeluaran");

$html = '<center><h3>Laporan Pengeluaran</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>id</th>
                <th>Tanggal</th>
                <th>Jumlah Pengeluaran</th>
                <th>Kegunaan</th>
            </tr>';
$no = 1;
while ($transaction = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . date('d-m-Y', strtotime($transaction['tanggal'])) . "</td>
                <td>Rp. " . number_format($transaction['pengeluaran'], 2, ',', '.') . "</td>
                <td>" . htmlspecialchars($transaction['kegunaan']) . "</td>
              </tr>";
    $no++;
}

$html .= "</table>";

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('laporan-pengeluaran.pdf');
?>
