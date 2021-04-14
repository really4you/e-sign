<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\SignFile\CreateFlowOneStep;
use really4you\E\Sign\Services\SignFile\DataSign\DataVerify;
use really4you\E\Sign\Services\SignFile\PdfVerify\PdfVerify;
use really4you\E\Sign\Services\SignFile\Attachments\CreateAttachments;
use really4you\E\Sign\Services\SignFile\Attachments\DeleteAttachments;
use really4you\E\Sign\Services\SignFile\Attachments\QryAttachments;
use really4you\E\Sign\Services\SignFile\DataSign\DataSign;
use really4you\E\Sign\Services\SignFile\Documents\CreateDocuments;
use really4you\E\Sign\Services\SignFile\Documents\DeleteDocuments;
use really4you\E\Sign\Services\SignFile\Documents\DownDocuments;
use really4you\E\Sign\Services\SignFile\Signers\GetFileSignUrl;
use really4you\E\Sign\Services\SignFile\Signers\QrySigners;
use really4you\E\Sign\Services\SignFile\Signers\RushSign;
use really4you\E\Sign\Services\SignFile\SignFields\CreateAutoSign;
use really4you\E\Sign\Services\SignFile\SignFields\CreateHandSign;
use really4you\E\Sign\Services\SignFile\SignFields\CreatePlatformSign;
use really4you\E\Sign\Services\SignFile\SignFields\DeleteSignFields;
use really4you\E\Sign\Services\SignFile\SignFields\QrySignFields;
use really4you\E\Sign\Services\SignFile\SignFlows\ArchiveSignFlow;
use really4you\E\Sign\Services\SignFile\SignFlows\CreateSignFlow;
use really4you\E\Sign\Services\SignFile\SignFlows\GetVoucherSignFlow;
use really4you\E\Sign\Services\SignFile\SignFlows\QrySignFlow;
use really4you\E\Sign\Services\SignFile\SignFlows\RevokeSignFlow;
use really4you\E\Sign\Services\SignFile\SignFlows\StartSignFlow;

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

    /**
     * 流程文档添加
     * @param $flowId
     * @param $docs
     * @return CreateDocuments
     */
    public static function createDocuments($flowId, $docs)
    {
        return new CreateDocuments($flowId, $docs);
    }

    /**
     * 流程文档删除
     * @param $flowId
     * @param $fileIds
     * @return DeleteDocuments
     */
    public static function deleteDocuments($flowId, $fileIds)
    {
        return new DeleteDocuments($flowId, $fileIds);
    }

    /**
     * 流程文档下载
     *
     * @param $flowId
     * @return DownDocuments
     */
    public static function downDocuments($flowId)
    {
        return new DownDocuments($flowId);
    }

    /**
     * 流程附件添加
     *
     * @param $flowId
     * @param $attachments
     * @return CreateAttachments
     */
    public static function createAttachments($flowId, $attachments)
    {
        return new CreateAttachments($flowId, $attachments);
    }

    /**
     * 流程附件删除
     *
     * @param $flowId
     * @param $fileIds
     * @return DeleteAttachments
     */
    public static function deleteAttachments($flowId, $fileIds)
    {
        return new DeleteAttachments($flowId, $fileIds);
    }

    /**
     * 流程附件列表
     *
     * @param $flowId
     * @return QryAttachments
     */
    public static function qryAttachments($flowId)
    {
        return new QryAttachments($flowId);
    }

    /**
     * 平台方&平台用户文本签
     *
     * @param $data
     * @param $type
     * @return DataSign
     */
    public static function dataSign($data, $type)
    {
        return new DataSign($data, $type);
    }

    /**
     * 文本签验签
     *
     * @param $data
     * @param $signResult
     * @return DataVerify
     */
    public static function ataVerify($data, $signResult)
    {
        return new DataVerify($data, $signResult);
    }

    /**
     * 文件验签
     *
     * @param $fileId
     * @return PdfVerify
     */
    public static function pdfVerify($fileId)
    {
        return new PdfVerify($fileId);
    }

    /**
     * 获取签署地址
     *
     * @param $flowId
     * @param $accountId
     * @return GetFileSignUrl
     */
    public static function getFileSignUrl($flowId, $accountId)
    {
        return new GetFileSignUrl($flowId, $accountId);
    }

    /**
     * 流程签署人列表
     *
     * @param $flowId
     * @return QrySigners
     */
    public static function qrySigners($flowId)
    {
        return new QrySigners($flowId);
    }

    /**
     * 流程签署人催签
     *
     * @param $flowId
     * @return RushSign
     */
    public static function rushSign($flowId)
    {
        return new RushSign($flowId);
    }

    /**
     * 添加签署方自动盖章签署区
     *
     * @param $flowId
     * @param array $signfields
     * @return CreateAutoSign
     */
    public static function createAutoSign($flowId,array $signfields)
    {
        return new CreateAutoSign($flowId,$signfields);
    }

    /**
     * 添加手动盖章签署区
     *
     * @param $flowId
     * @param array $signfields
     * @return CreateHandSign
     */
    public static function createHandSign($flowId, array $signfields)
    {
        return new CreateHandSign($flowId, $signfields);
    }

    /**
     * 添加平台自动盖章签署区
     *
     * @param $flowId
     * @param array $signfields
     * @return CreatePlatformSign
     */
    public static function createPlatformSign($flowId, $signfields)
    {
        return new CreatePlatformSign($flowId,$signfields);
    }

    /**
     * 删除签署区
     *
     * @param $flowId
     * @param $signfieldIds
     * @return DeleteSignFields
     */
    public static function deleteSignFields($flowId, $signfieldIds)
    {
        return new DeleteSignFields($flowId, $signfieldIds);
    }

    /**
     * 查询签署区列表
     *
     * @param $flowId
     * @return QrySignFields
     */
    public static function qrySignFields($flowId)
    {
        return new QrySignFields($flowId);
    }

    /**
     * 签署流程归档
     *
     * @param $flowId
     * @return ArchiveSignFlow
     */
    public static function archiveSignFlow($flowId)
    {
        return new ArchiveSignFlow($flowId);
    }


    /**
     * 流程签署数据存储凭据
     * @param $flowId
     * @return GetVoucherSignFlow
     */
    public static function getVoucherSignFlow($flowId)
    {
        return new GetVoucherSignFlow($flowId);
    }

    /**
     * 签署流程查询
     *
     * @param $flowId
     * @return QrySignFlow
     */
    public static function qrySignFlow($flowId)
    {
        return new QrySignFlow($flowId);
    }

    /**
     * 签署流程撤销
     *
     * @param $flowId
     * @return RevokeSignFlow
     */
    public static function revokeSignFlow($flowId)
    {
        return new RevokeSignFlow($flowId);
    }

    /**
     * 签署流程开启
     *
     * @param $flowId
     * @return StartSignFlow
     */
    public static function startSignFlow($flowId)
    {
        return new StartSignFlow($flowId);
    }

    /**
     * 一步发起签署
     *
     * @param $option
     * @return CreateFlowOneStep
     */
    public static function createFlowOneStep($option)
    {
        return new CreateFlowOneStep($option);
    }
}