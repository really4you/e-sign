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
    // 一步发起签署, $docs, $flowInfo, $signers
    public function createFlowOneStep(array $option)
    {
        $createFlowOneStep = SignFile::createFlowOneStep($option);

        return $createFlowOneStep->handle();
    }
}