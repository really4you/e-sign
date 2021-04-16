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
    /**
     * 平台方&平台用户文本签
     *
     * @param array $option
     * @return mixed|string
     */
    public function dataSign(array $option)
    {
       return  SignFile::dataSign($option)->handle();
    }

    /**
     * 文本签验签
     *
     * @param $data
     * @param $signResult
     * @return mixed|string
     */
    public function ataVerify($data, $signResult)
    {
        return SignFile::ataVerify($data, $signResult)->handle();
    }
}