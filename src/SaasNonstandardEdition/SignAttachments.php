<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SignFile;

/**
 * 流程附件
 *
 * Class SignAttachments
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class SignAttachments
{
    /**
     * 流程附件添加
     *
     * @param $flowId
     * @param array $attachments
     * @return mixed|string
     */
    public function createAttachments($flowId, array $attachments)
    {
        $createAttachments = SignFile::createAttachments($flowId, $attachments);

        return $createAttachments->handle();
    }

    /**
     * 流程附件列表
     *
     * @param $flowId
     * @return mixed|string
     */
    public function QryAttachments($flowId)
    {
        $Attachments = SignFile::qryAttachments($flowId);

        return $Attachments->handle();
    }

    /**
     * 流程附件删除
     *
     * @param $flowId
     * @param $fileIds
     * @return mixed|string
     */
    public function deleteAttachments($flowId, $fileIds)
    {
        $Attachments = SignFile::deleteAttachments($flowId, $fileIds);

        return $Attachments->handle();
    }
}