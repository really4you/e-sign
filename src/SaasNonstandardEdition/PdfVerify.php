<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SignFile;

/**
 * PDF文件验签
 *
 * Class PdfVerify
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class PdfVerify
{
    /**
     * PDF文件验签
     *
     * @param $fileId
     * @return mixed|string
     */
    public function pdfVerify($fileId)
    {
        $pdf = SignFile::pdfVerify($fileId);

        return $pdf->handle();
    }
}