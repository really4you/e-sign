<?php

namespace really4you\E\Sign\Authentication\Personal;

use really4you\E\Sign\Services\Base\Authentication\Personal\Auth;

/**
 * 认证服务纯API
 *
 * Class CertificationServicesApi
 * @package really4you\E\Sign\Authentication\Personal
 */
class CertificationServicesApi
{
    /**
     * 个人银行四要素实名认证
     *
     * @param array $option
     * @return mixed
     */
    public function bankCard4Factors(array $option)
    {
        $auth = Auth::bankCard4Factors($option);

        return $auth->handle();
    }
}