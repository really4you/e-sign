<?php

namespace really4you\E\Sign\Services\FileTemplate;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Services\Contracts\RequestUrl;
use really4you\E\Sign\Traits\Properties;

/**
 * 通过模板创建文件
 *
 * Class CreateFileByTemplate
 * @package really4you\E\Sign\Services\FileTemplate
 */
class CreateFileByTemplate extends EsignRequest implements \JsonSerializable,RequestUrl
{
    use Properties;

    private $name;

    /**
     * 模板编号
        （1）正式环境可通过e签宝网站->企业模板下创建和查询
        （2）通过上传方式方式创建模板接口获取模板id和上传链接，文件流上传文件成功之后，模板id可用于这里
     * @var
     */
    private $templateId;

    /**
     * 输入项填充内容，key:value 传入；可使用输入项组件id+填充内容，也可使用输入项组件key+填充内容方式填充
        注意：E签宝官网获取的模板id，在通过模板创建文件的时候只支持输入项组件id+填充内容
     * @var
     */
    private $simpleFormFields;

    public function __construct($option)
    {
        $this->setProperties($option);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param mixed $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    }

    /**
     * @return mixed
     */
    public function getSimpleFormFields()
    {
        return $this->simpleFormFields;
    }

    /**
     * @param mixed $simpleFormFields
     */
    public function setSimpleFormFields($simpleFormFields)
    {
        $this->simpleFormFields = $simpleFormFields;
    }


    function build()
    {
        $this->setUrl("/v1/files/createByTemplate");
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
            if($value === null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}