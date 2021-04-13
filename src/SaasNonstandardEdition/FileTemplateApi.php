<?php

namespace really4you\E\Sign\SaasNonstandardEdition;

use really4you\E\Sign\Services\Base\FileTemplate;
use really4you\E\Sign\Services\FileTemplate\UploadFile;

/**
 * 文件模板API
 *
 * Class FileTemplateApi
 * @package really4you\E\Sign\SaasNonstandardEdition
 */
class  FileTemplateApi
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

        return $file->handle();
    }

    /**
     * 通过上传方式创建模板
     *
     * @param array $option
     * @return mixed
     * @throws \really4you\E\Sign\Exceptions\InvalidArgumentException
     */
    public function createTemplateByUploadUrl(array $option)
    {
        $file = FileTemplate::CreateTemplateByUploadUrl($option);

        return $file->getRequestResult()->getBody();
    }

    /**
     * 查询模板详情/下载模板
     *
     * @param $templateId
     * @return mixed
     */
    public function templatesInfo($templateId)
    {
        $file = FileTemplate::TemplatesInfo($templateId);

        return $file->handle();
    }

    /**
     * 文件流上传
     *
     * @param $filePath
     * @param $uploadUrl
     * @param string $contentType
     * @return mixed
     */
    public function uploadFile($filePath, $uploadUrl, $contentType = "application/octet-stream")
    {
        $uploadFile = new UploadFile($filePath, $uploadUrl, $contentType);
        $uploadFileResp = $uploadFile->execute();

        return $uploadFileResp->getBody();
    }
}