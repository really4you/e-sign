<?php

namespace really4you\E\Sign\Services\SignFile\Documents;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;

class CreateDocuments extends EsignRequest implements \JsonSerializable
{
    /**
     * 流程id
     *
     * @var
     */
    private $flowId;

    /**
     * 文档列表数据
     * fileId string 文档id
     * encryption int32 是否加密，0-不加密，1-加密，默认0
     * fileName string  文件名称（必须带上文件扩展名，不然会导致后续发起流程校验过不去 示例：合同.pdf ）；
     * filePassword string 文档密码, 如果encryption值为1, 文档密码不能为空，默认没有密码
     *
     * @var array
     */
    private $docs = [];

    public function __construct($flowId, $docs)
    {
        $this->flowId = $flowId;
        $this->docs = $docs;
    }

    public function getFlowId()
    {
        return $this->flowId;
    }

    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    public function getDocs()
    {
        return $this->docs;
    }

    public function setDocs(array $docs)
    {
        $this->docs = $docs;
        return $this;
    }

    function build()
    {
        $this->setUrl(sprintf('/v1/signflows/%s/documents', $this->getFlowId()));
        $this->setReqType(HttpEmun::POST);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if($value === null || $key =='flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}