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

        //Title
        $this->SetFont('Times', 'B', 12);
        $this->Ln(0.3);
        $this->Cell(2.3, 0.7, '', 0, 0, 'C');
        $this->Cell(16.8, 0.7, strtoupper($setting['name_school']), 0, 1, 'L');
        $this->Cell(2.3, 0.7, '', 0, 0, 'C');
        $this->SetFont('Times', '', 10);
        $this->MultiCell(10.2, 0.4, 'Jl. Raya Solo - Purwodadi Km. 14,5 Telp. 0271 714578 (Hunting) Fax.0271 726359', 0, 'L');

        // SUB TITLE
        $this->Ln(0.2);
        $this->Line(1, 3.1, 20, 3.1);
        $this->Line(1, 3.15, 20, 3.15);

        $this->Ln(0.2);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(19.1, 0.7, 'BUKTI PEMBAYARAN SISWA', 0, 1, 'C');
        $this->Line(1, 3.9, 20, 3.9);
    }

    function Content()
    {
        $query = "SELECT
                    a.id,
                    a.code_bill,
                    a.payment_date,
                    SUBSTRING_INDEX(a.code_bill, '_',-1) AS month,
                    SUBSTR(SUBSTRING_INDEX(a.code_bill, '|',-1), 1,4) AS year,
                    b.description AS payname,
                    b.nominal,
                    b.type_payment,
                    CONCAT(c.name_class,'-',c.type_class) AS class,
                    d.name_student,
                    d.nisn_student,
                    d.parent_student,
                    d.address_student,
                    e.description AS ty
                FROM
                    transactions a
                    JOIN payments b ON a.code_payment = b.code_payment
                    JOIN classrooms c ON a.code_class = c.code_class
                    JOIN students d ON a.code_student = d.code_student
                    JOIN teaching_year e ON d.code_year = e.code_year 
                WHERE
                    a.id = '$_GET[id]'";
        $result = mysqli_query($this->Connect(), $query);
        $data = mysqli_fetch_assoc($result);
        if ($data) {
            $transNo = date('Ymd') . '/' . date('His') . '/' . $data['id'];

            //Trans No 
            $this->Ln(0.2);
            $this->SetFont('Times', '', 10);
            $this->Cell(2, 0.15, 'NO. TRANS', 0, 0, 'L');
            $this->Cell(1, 0.15, ':', 0, 0, 'R');
            $this->Cell(8.5, 0.2, $transNo, 0, 0);
            //NINS
            $this->Cell(0.5);
            $this->Cell(1, 0.15, 'NISN', 0, 0);
            $this->Cell(1.5, 0.15, ':', 0, 0, 'R');
            $this->Cell(1.5, 0.15, $data['nisn_student'], 0, 0);

            //DATE
            $this->Ln(0.5);
            $this->SetFont('Times', '', 10);
            $this->Cell(2, 0.15, 'TANGGAL', 0, 0, 'L');
            $this->Cell(1, 0.15, ':', 0, 0, 'R');
            $this->Cell(8.5, 0.2, FormatDateIndo(date('Y-m-d')), 0, 0);
            //NAME
            $this->Cell(0.5);
            $this->Cell(1, 0.15, 'NAMA ', 0, 0);
            $this->Cell(1.5, 0.15, ':', 0, 0, 'R');
            $this->Cell(1.5, 0.15, $data['name_student'], 0, 0);

            //TIME
            $this->Ln(0.5);
            $this->SetFont('Times', '', 10);
            $this->Cell(2, 0.15, 'JAM CETAK', 0, 0, 'L');
            $this->Cell(1, 0.15, ':', 0, 0, 'R');
            $this->Cell(8.5, 0.2, date('H:i'), 0, 0);
            //CLASSROOM
            $this->Cell(0.5);
            $this->Cell(1, 0.15, 'KELAS ', 0, 0);
            $this->Cell(1.5, 0.15, ':', 0, 0, 'R');
            $this->Cell(1.5, 0.15, $data['class'] . ' thn. ' . $data['ty'], 0, 0);

            $this->Ln(0.5);
            $this->Line(1, 5.5, 20, 5.5);

            // CONTENT
            $this->Ln(0.05);
            $this->SetFont('Times', 'B', 10);
            // $this->Cell(1, 0.7, 'No', 0, 0);
            $this->Cell(1, 0.7, '', 0, 0);
            $this->Cell(10.5, 0.7, 'Keterangan Pembayaran', 0, 0);
            $this->Cell(4, 0.7, 'Jml', 0, 0, 'R');
            $this->Cell(3.5, 0.7, 'Total Tarif', 0, 0, 'R');

            $this->Ln(0.8);
            $this->Line(1, 6.5, 20, 6.5);

            $this->Ln(0.3);
            $this->SetFont('Times', '', 10);
            // $this->Cell(1, 0.5, '1.', 0, 0);
            $this->Cell(1, 0.5, '', 0, 0);
            $this->Cell(10.5, 0.5, 'Pembayaran ' . $data['payname'] . ' ' . DescriptionMonthIndo($data['month']) . '-' . $data['year'] . ' (' . strtoupper($data['type_payment']) . ')', 0, 0);
            $this->Cell(4, 0.5, '1.00', 0, 0, 'R');
            $this->Cell(3.5, 0.5, FormatRupiah($data['nominal']), 0, 0, 'R');

            $this->Ln(0.5);
            $this->Line(1, 7.5, 20, 7.5);

            $this->Ln();
            $this->Cell(2, 0.5, 'Terbilang :', 0, 0);
            $this->Cell(9.5, 0.5, '', 0, 0);
            $this->SetFont('Times', 'B', 10);
            $this->Cell(4, 0.5, 'Grand Total :', 0, 0);
            $this->Cell(3.5, 0.5, FormatRupiah($data['nominal']) . ',-', 0, 0, 'R');

            $this->Ln(0.5);
            $this->Line(20, 8.25, 12.5, 8.25);

            $this->Ln(0.01);
            $this->SetFont('Times', 'I', 10);
            $this->MultiCell(11.5, 0.5, '*' . ucwords(InWord($data['nominal'])), 0, 'L');
            // $this->MultiCell(8, 0.5, ucwords('Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus odio impedit autem dolorum cupiditate minus quidem molestiae, quibusdam laudantium qui!'), 1, 'L');
            $this->SetXY(12.5, 8.25);
            $this->SetFont('Times', '', 10);
            $this->Cell(7.5, 0.5, 'Klaten, ' . FormatDateIndo(date('Y-m-d')), 0, 0, 'C');
            $this->SetXY(12.5, 8.75);
            $this->Cell(7.5, 0.5, 'Yang Menerima,', 0, 0, 'C');

            $this->SetXY(1, 10.5);
            $this->Cell(7.5, 0.5, 'Catatan :', 0, 1, 'L');
            $this->Cell(7.5, 0.5, '- Disimpan sebagai bukti pembayaran yang SAH.', 0, 1, 'L');
            $this->Cell(9, 0.5, '- Uang yang sudah dibayarkan tidak dapat diminta kembali.', 0, 0, 'L');

            $this->SetXY(12.5, 10.5);
            $this->Cell(7.5, 0.5, $_COOKIE['name'] ?: '', 0, 0, 'C');
        }
    }
}

// $pdf = new PDF('L', 'cm', array(21, 16.51));
$pdf = new PDF('L', 'cm', array(21, 13));
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 0.2);
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
