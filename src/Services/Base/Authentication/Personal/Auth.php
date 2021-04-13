<?php

namespace really4you\E\Sign\Services\Base\Authentication\Personal;

use really4you\E\Sign\Services\Authentication\Personal\Api\BankCard4Factors\BankCard4Factors;

/**
 * 个人认证
 *
 * Class Auth
 * @package really4you\E\Sign\Services\Base\Authentication\Personal
 */
class Auth
{
    /**
     * 银行4要素实名认证
     *
     * @param $option
     * @return BankCard4Factors
     */
    public static function bankCard4Factors($option)
    {
        return new BankCard4Factors($option);
    }
}