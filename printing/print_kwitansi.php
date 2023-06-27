<?php
define('FPDF_FONTPATH', 'library_pdf/font/');
require('library_pdf/fpdf.php');
include '../functions/function.php';

class PDF extends FPDF
{
    function Connect()
    {
        return Connection();
    }

    //Page header
    function Header()
    {
        $setting = Setting($this->Connect());
        //Logo
        $this->Image('../libraries/assets/img/icons/brands/logo_school.png', 1, 1, 2, 2);
        //Arial bold 15

        //pindah ke posisi ke tengah untuk membuat judul

        //$this->SetMargins(0.5,0.5);
        //judul
        $this->SetFont('Times', 'B', 12);
        $this->Cell(2.5, 0.7, '', 1, 0, 'C');
        $this->Cell(16.6, 0.7, strtoupper($setting['name_school']), 1, 1, 'L');
        $this->Cell(2.5, 0.7, '', 1, 0, 'C');
        $this->SetFont('Times', '', 10);
        $this->MultiCell(10, 0.4, 'Jl. Raya Solo - Purwodadi Km. 14,5 Telp. 0271 714578 (Hunting) Fax.0271 726359', 1, 'L');
        // $this->Cell(19.1, 0.2, 'RS PKU MUHAMMADIYAH SURAKARTA', 1, 1, 'C');
        //judul2
        // $this->SetFont('Times', 'B', 10);
        // $this->Cell(19.1, 0.7, 'Telp. 0271 714578 (Hunting) Fax.0271 726359', 0, 1, 'C');
        // $this->Cell(19.1, 0.2, 'Website : www.rspkusolo.co.id || email : humas_pkusolo@yahoo.co.id', 0, 0, 'C');
        //pindah baris
        $this->Ln(0.2);
        //buat garis horisontal
        $this->Line(1, 3.1, 20, 3.1);
        $this->Line(1, 3.15, 20, 3.15);
    }

    function Content()
    {

        //Biodata
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(19, 1.5, 'PERINCIAN BIAYA RAWAT JALAN', 0, 0, 'C');
        //NAMA 
        $this->Ln();
        $this->Cell(2, 0.15, 'Nama', 0, 0, 'L');
        $this->Cell(1, 0.15, ':', 0, 0, 'R');
        $this->SetFont('Times', 'B', 10);
        $this->Cell(8.5, 0.2, $pasien['nama_pasien'], 0, 0);
        //NO. RM
        $this->Cell(1.5);
        $this->SetFont('Times', '', 10);
        $this->Cell(1, 0.15, 'No.RM', 0, 0);
        $this->Cell(1.5, 0.15, ':', 0, 0, 'R');
        $this->SetFont('Times', 'B', 10);
        $this->Cell(1.5, 0.15, $pasien['no_rm'], 0, 0);
        //TGL LAHIR
        $this->Ln();
        $this->SetFont('Times', '', 10);
        $this->Cell(2, 1, 'Tgl Lahir', 0, 0, 'L');
        $this->Cell(1, 1, ':', 0, 0, 'R');
        if ($pasien['tgl_lahir'] == '') {
            $this->Cell(8.5, 1, '', 0, 0);
        } else {
            $this->Cell(8.5, 1.05, tgl($pasien['tgl_lahir']), 0, 0);
        }

        //Status
        $this->Cell(1.5);
        $this->Cell(1, 1, 'Status', 0, 0);
        $this->Cell(1.5, 1, ':', 0, 0, 'R');
        $this->CellFitScale(3.3, 1, $pasien['status_pasien'], 0, 0);
        //ALAMAT
        $this->Ln();
        $this->SetFont('Times', '', 10);
        $this->Cell(2, 0.1, 'Alamat', 0, 0, 'L');
        $this->Cell(1, 0.1, ':', 0, 0, 'R');
        $this->CellFitScale(8.5, 0.15, $pasien['alamat'], 0, 0, 'L');
        //JK
        $this->Cell(1.5);
        $this->Cell(1, 0.1, 'Jenis Kelamin', 0, 0);
        $this->Cell(1.5, 0.1, ':', 0, 0, 'R');
        $this->Cell(1.5, 0.1, $pasien['jk'] == '' ? '' : $pasien['jk'], 0, 0);

        //MENU
        $this->SetFont('Times', '', 10);
        $this->Ln(0.5);
        $this->Cell(1, 1, $this->MyGaris(100), 0, 0);
        //HEADER
        $this->Ln(0.01);
        $this->Cell(1, 0.7, 'No', 0, 0);
        $this->Cell(10.5, 0.7, 'Pelayanan', 0, 0);
        $this->Cell(2.5, 0.7, 'Tarif', 0, 0, 'R');
        $this->Cell(2, 0.7, 'Jml', 0, 0, 'R');
        $this->Cell(2.75, 0.7, 'Tagihan', 0, 0, 'R');
        $this->Ln(0.8);

        $this->Cell(1, 0.3, $this->MyGaris(100), 0, 0);

        //HEADER 2 ->KLINIK
        $this->Ln(0.2);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 0.2, 'RADIOLOGI', 0, 0);

        $this->SetFont('Times', 'I', 10);
        $this->Cell(8.75, 0.2, 'Mardiatmo, Dr. Sp. Rad', 0, 0, 'R');

        $this->SetFont('Times', '', 10);
        $this->Ln(0.4);
        $this->Cell(1, 0.2, $this->MyGaris(100), 0, 0);

        //PELAYANAN
        $this->Ln();
        $this->Cell(10.5, 0.2, $pasien['tgl_permintaan'] . ' | ' . $pasien['jam'], 0, 0, 'R');

        $tarif = explode('~', $pasien['tarif_id']);
        $no = 1;
        $totalTagihan = 0;
        $diskon = 0;
        foreach ($tarif as $x) {
            $namaTarif = NamaPemeriksaan($conn, $x)[0];
            $harga = NamaPemeriksaan($conn, $x)[1];
            $totalTagihan += $harga;
            $diskon += $pasien['diskon'];
            $harga = number_format($harga, 0, ',', '.');
            $this->Ln();
            $this->Cell(1, 0.5, $no++, 0, 0);
            $this->Cell(10.5, 0.5, $namaTarif, 0, 0);
            $this->Cell(2.5, 0.5, $harga, 0, 0, 'R');
            $this->Cell(2, 0.5, '1.00', 0, 0, 'R');
            $this->Cell(2.75, 0.5, $harga, 0, 0, 'R');
        }

        $total = number_format($totalTagihan, 0, ',', '.');
        $diskonTotal = number_format($diskon, 0, ',', '.');
        $bayar = $totalTagihan - $diskon;
        $this->Ln(1);
        $this->Cell(1, 0.2, $this->MyGaris(100), 0, 0);

        $this->Ln(0.01);
        $this->SetFont('Times', 'BI', 10);
        $this->Cell(14, 0.5, 'Sub Total Tagihan :', 0, 0, 'R');
        $this->Cell(4.75, 0.565, $total, 0, 0, 'R');
        $this->Ln();

        //FOOTER
        $this->Ln(-0.01);
        $this->SetFont('Times', '', 10);
        $this->Cell(1, 0.2, $this->MyGaris(100), 0, 0);

        $this->Ln();
        $this->Cell(1.65, 0.5, 'Terbilang :', 0, 0);
        $this->SetFont('Times', 'B', 10);
        // $this->MultiCell(8, 0.5, $this->terbilang($totalTagihan), 0, 'J');
        $this->MultiCell(8, 0.5, $this->terbilang($bayar), 0, 'J');
        $this->SetFont('Times', '', 10);
        $this->Ln(-0.1);
        $this->Cell(14, -0.5, 'Total Tagihan :', 0, 0, 'R');
        $this->Cell(4.75, -0.5, $total, 0, 0, 'R');
        $this->Ln(0.5);
        $this->Cell(14, -0.5, 'Subsidi Pihak Ketiga :', 0, 0, 'R');
        $this->Cell(4.75, -0.5, '0', 0, 0, 'R');
        $this->Ln(0.5);
        $this->Cell(14, -0.5, 'Potongan/Diskon :', 0, 0, 'R');
        $this->Cell(4.75, -0.5, $diskonTotal, 0, 0, 'R');
        $this->Ln(0.5);
        $this->Cell(14, -0.5, 'Bayar/Angsuran/Deposit :', 0, 0, 'R');
        $this->Cell(4.75, -0.5, '0', 0, 0, 'R');
        $this->Ln(0.5);
        $this->Cell(14, -0.5, 'Retur Bayar :', 0, 0, 'R');
        $this->Cell(4.75, -0.5, '0', 0, 0, 'R');
        $this->Ln(0.5);
        // $this->Cell(7, -0.5, $_COOKIE['xNamaUser'], 0, 0, 'C');
        $this->Cell(7, -0.5, '(RADIOLOGI)', 0, 0, 'C');
        $this->Cell(7, -0.5, 'Biaya yang harus dibayar :', 0, 0, 'R');
        $this->Cell(4.75, -0.5, number_format($bayar, 0, ',', '.'), 0, 0, 'R');
    }
}

$pdf = new PDF('L', 'cm', array(21, 16.51));
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 0.2);
$pdf->AddPage();
// $pdf->Content();
$pdf->Output();
