<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\SignFile\SignFlows\CreateSignFlow;

class SignFile
{
    /**
     * 签署流程创建
     *
     * @param $option
     * @return CreateSignFlow
     */
    public static function createSignFlow($option)
    {
        return new CreateSignFlow($option);
    }
}