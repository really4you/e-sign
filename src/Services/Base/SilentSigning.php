<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\Account\DeleteSignAuth;
use really4you\E\Sign\Services\Account\SetSignAuth;

/**
 * 静默签署授权API
 *
 * Class SilentSigning
 * @package really4you\E\Sign\Services\Base
 */
class SilentSigning
{
    /**
     * 设置静默签署
     *
     * @param $option
     * @return SetSignAuth
     */
    public static function setSignAuth($option)
    {
        return new SetSignAuth($option);
    }

    /**
     * 撤销静默签署
     *
     * @param $accountId
     * @return DeleteSignAuth
     */
    public static function deleteSignAuth($accountId)
    {
        return new DeleteSignAuth($accountId);
    }


}