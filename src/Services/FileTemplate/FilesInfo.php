<?php

namespace really4you\E\Sign\Services\FileTemplate;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

/**
 * 查询文件详情/下载文件
 *
 * Class FilesInfo
 * @package really4you\E\Sign\Services\FileTemplate
 */
class FilesInfo extends EsignRequest implements \JsonSerializable
{
    private $fileId;

    public function __construct($fileId)
    {
        $this->fileId = $fileId;
    }

    public function getFileId()
    {
        return $this->fileId;
    }

    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
    }

    function build()
    {
        $this->setUrl(sprintf("/v1/files/%s",$this->getFileId()));
        $this->setReqType(HttpEmun::GET);
    }

    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if($value === null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}