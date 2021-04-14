<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\FileTemplate\CreateFileByTemplate;
use really4you\E\Sign\Services\FileTemplate\CreateTemplateByUploadUrl;
use really4you\E\Sign\Services\FileTemplate\FilesInfo;
use really4you\E\Sign\Services\FileTemplate\GetFileUploadUrl;
use really4you\E\Sign\Services\FileTemplate\TemplatesInfo;
use really4you\E\Sign\Services\FileTemplate\UploadFile;

class FileTemplate
{
    /**
     * 通过模板创建文件
     *
     * @param $name
     * @param $templateId
     * @param $simpleFormFields
     * @return CreateFileByTemplate
     */
    public static function createFileByTemplate($option)
    {
        return new CreateFileByTemplate($option);
    }

    /**
     * 通过上传方式创建模板
     *
     * @param $option
     * @return CreateTemplateByUploadUrl
     * @throws \really4you\E\Sign\Exceptions\InvalidArgumentException
     */
    public static function createTemplateByUploadUrl($option)
    {
        return new CreateTemplateByUploadUrl($option);
    }

    /**
     * 查询模板详情/下载模板
     *
     * @param $templateId
     * @return TemplatesInfo
     */
    public static function templatesInfo($templateId)
    {
        return new TemplatesInfo($templateId);
    }

    /**
     * 通过上传方式创建文件
     *
     * @param $option
     * @return GetFileUploadUrl
     * @throws \really4you\E\Sign\Exceptions\InvalidArgumentException
     */
    public static function getFileUploadUrl($option)
    {
        return new GetFileUploadUrl($option);
    }

    /**
     * 上传文件
     * @param $filePath
     * @param $contentType
     * @param $url
     * @return UploadFile
     */
    public static function uploadFile($filePath, $contentType, $url)
    {
        return new UploadFile($filePath, $contentType, $url);
    }

    /**
     * 查询文件详情/下载文件
     *
     * @param $fileId
     * @return FilesInfo
     */
    public static function filesInfo($fileId)
    {
        return new FilesInfo($fileId);
    }

}