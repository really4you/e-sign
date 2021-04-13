<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SignFile;

/**
 * 流程签署区
 *
 * Class SignatureArea
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class SignatureArea
{
    /**
     * 添加平台方自动盖章签署区
     *
     * @param $flowId
     * @param array $signfields
     * @return mixed|string
     */
    public function createPlatformSign($flowId, array $signfields)
    {
        $createPlatformSign = SignFile::createPlatformSign($flowId, $signfields);

        return $createPlatformSign->handle();
    }

    /**
     * 添加签署方自动盖章签署区
     *
     * @param $flowId
     * @param array $signfields
     * @return mixed|string
     */
    public function createAutoSign($flowId,array $signfields)
    {
        $createAutoSign = SignFile::createAutoSign($flowId, $signfields);

        return $createAutoSign->handle();
    }

    /**
     * 添加签署方手动盖章签署区
     *
     * @param $flowId
     * @param array $signfields
     * @return mixed|string
     */
    public function createHandSign($flowId, array $signfields)
    {
        $createHandSign = SignFile::createHandSign($flowId, $signfields);

        return $createHandSign->handle();
    }

    /**
     * 查询签署区列表
     *
     * @param $flowId
     * @return mixed|string
     */
    public function qrySignFields($flowId)
    {
        $qrySignFields = SignFile::qrySignFields($flowId);

        return $qrySignFields->handle();
    }

    /**
     * 删除签署区
     *
     * @param $flowId
     * @param $signfieldIds
     * @return mixed|string
     */
    public function deleteSignFields($flowId, $signfieldIds)
    {
        $deleteSignFields = SignFile::deleteSignFields($flowId, $signfieldIds);

        return $deleteSignFields->handle();
    }
}