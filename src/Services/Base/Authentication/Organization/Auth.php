<?php

namespace really4you\E\Sign\Services\Base\Authentication\Organization;

use really4you\E\Sign\Services\Authentication\Organization\Api\ThreeFactorsTest;

class Auth
{
    /**
     * 发起企业核身认证3要素检验
     *
     * @param $option
     * @return ThreeFactorsTest
     */
    public static function threeFactorsTest($option)
    {
        return new ThreeFactorsTest($option);
    }
}