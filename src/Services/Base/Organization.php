<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\Account\Organization\CreateOrganizationsByThirdPartyUserId;
use really4you\E\Sign\Services\Account\Organization\DeleteOrganizationsByOrgId;
use really4you\E\Sign\Services\Account\Organization\DeleteOrganizationsByThirdId;
use really4you\E\Sign\Services\Account\Organization\QryOrganizationsByOrgId;
use really4you\E\Sign\Services\Account\Organization\QryOrganizationsByThirdId;
use really4you\E\Sign\Services\Account\Organization\UpdateOrganizationsByOrgId;
use really4you\E\Sign\Services\Account\Organization\UpdateOrganizationsByThirdId;

/**
 * 机构相关API
 *
 * Class Organization
 * @package really4you\E\Sign\Services\Base
 */
class Organization
{
    /**
     * 机构账号创建
     *
     * @param $thirdPartyUserId
     * @param $creator
     * @param $name
     * @param $idType
     * @param $idNumber
     * @return CreateOrganizationsByThirdPartyUserId
     */
    public static function createOrganizationsByThirdPartyUserId($option)
    {
        return new CreateOrganizationsByThirdPartyUserId($option);
    }

    /**
     * 注销机构账号（按照账号ID注销）
     *
     * @param $orgId
     * @return DeleteOrganizationsByOrgId
     */
    public static function deleteOrganizationsByOrgId($orgId)
    {
        return new DeleteOrganizationsByOrgId($orgId);
    }

    /**
     * 注销机构账号（按照第三方机构ID注销）
     *
     * @param $thirdPartyUserId
     * @return DeleteOrganizationsByThirdId
     */
    public static function deleteOrganizationsByThirdId($thirdPartyUserId)
    {
        return new DeleteOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 查询机构账号（按照账号ID查询）
     *
     * @param $orgId
     * @return QryOrganizationsByOrgId
     */
    public static function qryOrganizationsByOrgId($orgId)
    {
        return new QryOrganizationsByOrgId($orgId);
    }

    /**
     * 查询机构账号（按照第三方机构ID查询）
     *
     * @param $thirdPartyUserId
     * @return QryOrganizationsByThirdId
     */
    public static function qryOrganizationsByThirdId($thirdPartyUserId)
    {
        return new QryOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 机构账号修改（按照账号ID修改）
     *
     * @param $orgId
     * @return UpdateOrganizationsByOrgId
     */
    public static function updateOrganizationsByOrgId($option)
    {
        return new UpdateOrganizationsByOrgId($option);
    }

    /**
     * 机构账号修改（按照第三方机构ID修改）
     *
     * @param $thirdPartyUserId
     * @return UpdateOrganizationsByThirdId
     */
    public static function updateOrganizationsByThirdId($thirdPartyUserId)
    {
        return new UpdateOrganizationsByThirdId($thirdPartyUserId);
    }
}