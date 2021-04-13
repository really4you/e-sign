<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SilentSigning;

/**
 * 静默签署授权API
 *
 * Class SilentSigningApi
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class SilentSigningApi
{
    /**
     * 设置静默签署授权
     *
     * @param array $option
     * @return mixed|string
     */
    public function setSignAuth(array $option)
    {
        return SilentSigning::setSignAuth($option)->handle();
    }

    /**
     * 解除静默签署
     *
     * @param $accountId
     * @return mixed|string
     */
    public  function deleteSignAuth($accountId)
    {
        return SilentSigning::deleteSignAuth($accountId)->handle();
    }
}