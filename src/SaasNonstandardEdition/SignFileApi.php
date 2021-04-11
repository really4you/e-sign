<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SignFile;

/**
 * 签署服务功能类
 *
 * Class SignFile
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class SignFileApi
{
    public function createSignFlow(array $option)
    {
        $createSignFlow = SignFile::createSignFlow($option);
        return $createSignFlow->handle();
    }
}