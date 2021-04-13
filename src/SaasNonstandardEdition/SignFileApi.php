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
    /**
     * 一步发起签署
     *
     * @param array $option
     * @return mixed|string
     */
    public function createFlowOneStep(array $option)
    {
        return SignFile::createFlowOneStep($option)->handle();
    }
}