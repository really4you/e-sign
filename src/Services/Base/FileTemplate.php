<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\FileTemplate\CreateFileByTemplate;
use really4you\E\Sign\Services\FileTemplate\CreateTemplateByUploadUrl;
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

    public static function TemplatesInfo($templateId)
    {
        return new TemplatesInfo($templateId);
    }

    /**
     * 通过上传方式创建文件
     *
     * @param $contentMd5
     * @param $contentType
     * @param $convert2Pdf
     * @param $fileName
     * @param $fileSize
     * @return GetFileUploadUrl
     */
    public static function getFileUploadUrl($contentMd5, $contentType, $convert2Pdf, $fileName, $fileSize)
    {
        return new GetFileUploadUrl($contentMd5, $contentType, $convert2Pdf, $fileName, $fileSize);
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
}