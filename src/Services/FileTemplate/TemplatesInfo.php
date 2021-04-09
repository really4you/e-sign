<?php

namespace really4you\E\Sign\Services\FileTemplate;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Services\Contracts\RequestUrl;

/**
 * 查询模板详情/下载模板
 *
 * Class TemplatesInfo
 * @package really4you\E\Sign\Services\FileTemplate
 */
class TemplatesInfo extends EsignRequest implements \JsonSerializable,RequestUrl
{
    private $templateId;

    public function __construct($templateId)
    {
        $this->templateId = $templateId;
    }

    public function getTemplateId()
    {
        return $this->templateId;
    }

    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

    function build()
    {
        $this->setUrl(sprintf("/v1/docTemplates/%s",$this->getTemplateId()));
        $this->setReqType(HttpEmun::GET);
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
            if($value === null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}