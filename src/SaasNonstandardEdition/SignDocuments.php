<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\SignFile;

/**
 * 流程文档
 *
 * Class SignDocuments
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class SignDocuments
{
    /**
     * 流程文档添加
     *
     * @param $flowId
     * @param array $docs
     * @return mixed|string
     */
    public function createDocuments($flowId, array $docs)
    {
        $createDocuments = SignFile::createDocuments($flowId, $docs);

        return $createDocuments->handle();
    }

    /**
     * 流程文档删除
     *
     * @param $flowId
     * @param array $docs
     * @return mixed|string
     */
    public function deleteDocuments($flowId, $fileIds)
    {
        $createDocuments = SignFile::deleteDocuments($flowId, $fileIds);

        return $createDocuments->handle();
    }

    /**
     * 流程文档下载
     *
     * @param $flowId
     * @return mixed|string
     */
    public function downDocuments($flowId)
    {
        $createDocuments = SignFile::downDocuments($flowId);

        return $createDocuments->handle();
    }
}