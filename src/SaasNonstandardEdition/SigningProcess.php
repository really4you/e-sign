<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SignFile;

/**
 * 签署流程
 *
 * Class SigningProcess
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class SigningProcess
{
    /**
     * 签署流程创建
     *
     * @param array $option
     * @return mixed|string
     */
    public function createSignFlow(array $option)
    {
        return SignFile::createSignFlow($option)->handle();
    }

    /**
     * 签署流程查询
     *
     * @param $flowId
     * @return mixed|string
     */
    public function qrySignFlow(string $flowId)
    {
        return SignFile::qrySignFlow($flowId)->handle();
    }

    /**
     * 流程签署人列表
     *
     * @param string $flowId
     * @return array|mixed
     */
    public static function qrySigners(string $flowId)
    {
        return SignFile::QrySigners($flowId)->handle();
    }

    /**
     * 签署流程开启
     *
     * @param $flowId
     * @return mixed|string
     */
    public function startSignFlow(string $flowId)
    {
        return SignFile::startSignFlow($flowId)->handle();
    }

    /**
     * 签署流程撤销
     *
     * @param $flowId
     * @return mixed|string
     */
    public function revokeSignFlow(string $flowId)
    {
        return SignFile::revokeSignFlow($flowId)->handle();
    }

    /**
     * 签署流程归档
     *
     * @param $flowId
     * @return mixed|string
     */
    public function archiveSignFlow(string $flowId)
    {
        return SignFile::archiveSignFlow($flowId)->handle();
    }

    /**
     * 签署过程数据存储凭据
     *
     * @param $flowId
     * @return mixed|string
     */
    public function getVoucherSignFlow(string $flowId)
    {
        return SignFile::getVoucherSignFlow($flowId)->handle();
    }
}