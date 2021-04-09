<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\FileTemplate;

/**
 * 文件模板API
 *
 * Class FileTemplateApi
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class FileTemplateApi
{
    /**
     * 通过模板创建文件
     *
     * @param $name
     * @param $templateId
     * @param $simpleFormFields
     * @return \Psr\Http\Message\StreamInterface
     */
    public function createFileByTemplate(array $option)
    {
        $file = FileTemplate::createFileByTemplate($option);

        $resp = $file->handle();
        $json = $resp->getBody();

        return $json;
    }

    /**
     * 通过上传方式创建模板
     *
     * @param array $option
     * @return mixed
     * @throws \really4you\E\Sign\Exceptions\InvalidArgumentException
     */
    public function CreateTemplateByUploadUrl(array $option)
    {
        $file = FileTemplate::CreateTemplateByUploadUrl($option);

        $resp = $file->handle();
        $json = $resp->getBody();

        return $json;
    }

    /**
     * 查询模板详情/下载模板
     *
     * @param $templateId
     * @return mixed
     */
    public function TemplatesInfo($templateId)
    {
        $file = FileTemplate::TemplatesInfo($templateId);

        $resp = $file->handle();
        $json = $resp->getBody();

        return $json;
    }
}