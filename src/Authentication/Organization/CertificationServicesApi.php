<?php

namespace really4you\E\Sign\Authentication\Organization;

use really4you\E\Sign\Services\Base\Authentication\Organization\Auth;

/**
 * 机构认证服务纯API
 *
 * Class CertificationServicesApi
 * @package really4you\E\Sign\Authentication\Organization
 */
class CertificationServicesApi
{

    /**
     * 发起企业核身认证3要素检验
     *
     * @param array $option
     * @return mixed|string
     */
    public function threeFactorsTest(array $option)
    {
        return Auth::threeFactorsTest($option)->handle();
    }
}