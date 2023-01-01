<?php
include_once dirname(__DIR__) . '/vendor/autoload.php';
class PDF extends TCPDF
{
    public function Header()
    {
        // $imageFile = K_PATH_IMAGES . 'Ohana Kennel.png';
        // $this->Image($imageFile, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // // Set font
        // $this->setFont('helvetica', 'B', 20);
        // // Title
        // $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function Footer()
    {
    }
}
