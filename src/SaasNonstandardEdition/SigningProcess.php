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
        $createSignFlow = SignFile::createSignFlow($option);

        return $createSignFlow->handle();
    }

    /**
     * 签署流程查询
     *
     * @param $flowId
     * @return mixed|string
     */
    public function qrySignFlow($flowId)
    {
        $qrySignFlow = SignFile::qrySignFlow($flowId);

        return $qrySignFlow->handle();
    }

    /**
     * 签署流程开启
     *
     * @param $flowId
     * @return mixed|string
     */
    public function startSignFlow($flowId)
    {
        $startSignFlow = SignFile::startSignFlow($flowId);

        return $startSignFlow->handle();
    }

    /**
     * 签署流程撤销
     *
     * @param $flowId
     * @return mixed|string
     */
    public function revokeSignFlow($flowId)
    {
        $revokeSignFlow = SignFile::revokeSignFlow($flowId);

        return $revokeSignFlow->handle();
    }

    /**
     * 签署流程归档
     *
     * @param $flowId
     * @return mixed|string
     */
    public function archiveSignFlow($flowId)
    {
        $archiveSignFlow = SignFile::archiveSignFlow($flowId);

        return $archiveSignFlow->handle();
    }

    /**
     * 签署过程数据存储凭据
     *
     * @param $flowId
     * @return mixed|string
     */
    public function getVoucherSignFlow($flowId)
    {
        $getVoucherSignFlow = SignFile::getVoucherSignFlow($flowId);

        return $getVoucherSignFlow->handle();
    }
}