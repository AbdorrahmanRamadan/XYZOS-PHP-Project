<?php
use chillerlan\QRCode\QRCode as QR;
use chillerlan\QRCode\QROptions as options;

class QRCodeGenerator
{
    static function generateQRCode($link)
    {
        $QR_options = new options(
            [
                'eccLevel' => QR::ECC_L,
                'outputType' => QR::OUTPUT_MARKUP_SVG,
                'version' => 5,
            ]
        );
        $generatedQRCode = (new QR($QR_options))->render($link);
        return $generatedQRCode;
    }
}