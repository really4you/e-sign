<?php

namespace really4you\E\Sign\Services\Signet;

use really4you\E\Sign\EsignRequest;
use really4you\E\Sign\HttpEmun;
use really4you\E\Sign\Traits\Properties;

/**
 * 创建机构模板印章
 *
 * Class CreateOfficialTemplate
 * @package really4you\E\Sign\Services\Signet
 */
class CreateOfficialTemplate extends EsignRequest implements \JsonSerializable
{
    use Properties;

    /**
     * 机构id
     *
     * @var
     */
    private $orgId;

    /**
     * 印章别名
     *
     * @var
     */
    private $alias;

    /**
     * 印章颜色，RED-红色，BLUE-蓝色，BLACK-黑色
     *
     * @var
     */
    private $color;

    /**
     * 印章高度，默认159px
     *
     * @var
     */
    private $height;

    /**
     * 印章宽度，默认159px
     *
     *
     * @var
     */
    private $width;

    /**
     * 横向文，可设置0-8个字，企业名称超出25个字后，不支持设置横向文
     *
     * @var
     */
    private $htext;

    /**
     * 下弦文，可设置0-20个字，企业企业名称超出25个字后，不支持设置下弦文
     *
     * @var
     */
    private $qtext;

    /**
     * 模板类型 TEMPLATE_ROUND : 圆章 , TEMPLATE_OVAL: 椭圆章
     *
     * @var
     */
    private $type;

    /**
     * 中心图案类型
     *
     * @var
     */
    private $central;

    /**
     * 如果没有传参，需要设置的默认参数
     *
     * @var array
     */
    protected $defaultProperties = ['type','central','color'];

    public function __construct($option)
    {
        $this->setProperties($option);
    }

    public function getOrgId()
    {
        return $this->orgId;
    }

    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color = 'RED')
    {
        $this->color = $color;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type = 'TEMPLATE_ROUND')
    {
        $this->type = $type;
    }

    public function getHeight()
    {
        return $this->color;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHtext()
    {
        return $this->htext;
    }

    public function setHtext($htext)
    {
        $this->htext = $htext;
    }

    public function getQtext()
    {
        return $this->qtext;
    }

    public function setQtext($qtext)
    {
        $this->qtext = $qtext;
    }

    public function getAlias()
    {
        return $this->width;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getCentral()
    {
        return $this->central;
    }

    public function setCentral($central = 'STAR')
    {
        $this->central = $central;
    }

    function build()
    {
        $this->setUrl(sprintf("/v1/organizations/%s/seals/officialtemplate", $this->getOrgId()));
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
            // ex->defaultProperties
            if($value == null || is_array($value)) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}