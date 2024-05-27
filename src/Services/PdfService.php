<?php

namespace Wame\Core\Services;

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\PdfParserException;

class PdfService
{
    /**
     * @throws PdfParserException
     */
    public function combinePdfFiles($pdfFile)
    {
        // Create new Landscape PDF
        $pdf = new FPDI('l');

        // Reference the PDF you want to use (use relative path)
        $pagecount = $pdf->setSourceFile($pdfFile);

        // Import the first page from the PDF and add to dynamic PDF
        $tpl = $pdf->importPage(1);
        $pdf->AddPage();

        // Use the imported page as the template
        $pdf->useTemplate($tpl);

        // render PDF to browser
        return $pdf->Output();
    }
}
