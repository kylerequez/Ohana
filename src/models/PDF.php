<?php
include_once dirname(__DIR__) . '/vendor/autoload.php';
class PDF extends TCPDF
{
    public function Header()
    {
        $logo = dirname(__DIR__) . '/images/pdf/logo.png';
        $this->Image($logo, 40, 0, 80, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        $this->Ln(5);
        $this->setFont('helvetica', 'B', 12);
        $this->Cell(0, 5, 'OHANA KENNEL PH', 0, 1, 'C');
        $this->setFont('helvetica', 'B', 8);
        $this->Cell(0, 3, '1086 Minodoro Street', 0, 1, 'C');
        $this->Cell(0, 3, 'Sampaloc, Manila', 0, 1, 'C');
        $this->Cell(0, 3, '1056 Philippines', 0, 1, 'C');
        $this->Cell(0, 3, 'Phone: +639190638560', 0, 1, 'C');
        $this->Cell(0, 3, 'Email: ohanakennelph.business@gmail.com', 0, 1, 'C');
        
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }

    public function Footer()
    {
    }
}
