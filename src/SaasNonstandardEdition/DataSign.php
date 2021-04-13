<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SignFile;

/**
 * 文本签
 *
 * Class DataSign
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class DataSign
{
    // 平台方&平台用户文本签
    public function dataSign($data, $type)
    {
       $dataSign =  SignFile::dataSign($data, $type);

       return $dataSign->handle();
    }

    // 文本签验签
    public function ataVerify($data, $signResult)
    {
        $dataSign =  SignFile::ataVerify($data, $signResult);

        return $dataSign->handle();
    }
}