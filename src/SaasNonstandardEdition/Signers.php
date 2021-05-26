<?php

namespace really4you\E\Sign\SaasNonstandardEdition;
use really4you\E\Sign\Services\Base\SignFile;

/**
 * 流程签署人
 *
 * Class Signers
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class Signers
{
    /**
     * 流程签署人列表
     *
     * @param $flowId
     * @return mixed|string
     */
    public function qrySigners($flowId)
    {
        return SignFile::qrySigners($flowId)->handle();
    }

    /**
     * 流程签署人催签
     *
     * @param $flowId
     * @return mixed|string
     */
    public function rushSign($flowId)
    {
       return SignFile::rushSign($flowId)->handle();
    }

    /**
     * 获取签署地址
     *
     * @param $flowId
     * @param $accountId
     * @return mixed|string
     */
    public function getFileSignUrl($flowId, $accountId)
    {
        return SignFile::getFileSignUrl($flowId, $accountId)->handle();
    }
}