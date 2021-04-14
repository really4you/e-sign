<?php

namespace really4you\E\Sign\Services\Base;

use really4you\E\Sign\Services\Account\Personal\CreatePersonByThirdPartyUserId;
use really4you\E\Sign\Services\Account\Personal\DeletePersonByAccountId;
use really4you\E\Sign\Services\Account\Personal\DeletePersonByThirdId;
use really4you\E\Sign\Services\Account\Personal\QryPersonByaccountId;
use really4you\E\Sign\Services\Account\Personal\QryPersonByThirdId;
use really4you\E\Sign\Services\Account\Personal\UpdatePersonAccountByAccountId;
use really4you\E\Sign\Services\Account\Personal\UpdatePersonAccountByThirdId;
use really4you\E\Sign\Services\Account\SetSignPwd;

/**
 * 个人相关API
 *
 * Class Account
 * @package really4you\E\Sign\Services\Base
 */
class Account
{
    public static function createPersonByThirdPartyUserId($option)
    {
        return new CreatePersonByThirdPartyUserId($option);
    }

    /**
     * 注销个人账户（按照账号ID注销）
     * @param $accountId
     * @return DeletePersonByAccountId
     */
    public static function deletePersonByAccountId($accountId)
    {
        return new DeletePersonByAccountId($accountId);
    }

    /**
     * 注销个人账户（按照第三方用户ID注销）
     * @param $thirdPartyUserId
     * @return DeletePersonByThirdId
     */
    public static function deletePersonByThirdId($thirdPartyUserId)
    {
        return new DeletePersonByThirdId($thirdPartyUserId);
    }


    /**
     * 查询机构账号（按照账号ID查询）
     * @param $accountId
     * @return QryPersonByaccountId
     */
    public static function qryPersonByaccountId($accountId)
    {
        return new QryPersonByaccountId($accountId);
    }

    /**
     * 查询个人账户（按照第三方用户ID查询）
     * @param $thirdPartyUserId
     * @return QryPersonByThirdId
     */
    public static function qryPersonByThirdId($thirdPartyUserId)
    {
        return new QryPersonByThirdId($thirdPartyUserId);
    }

    /**
     * 设置签署密码
     * @param $accountId
     * @param $password
     * @return SetSignPwd
     */
    public static function setSignPwd($accountId, $password)
    {
        return new SetSignPwd($accountId, $password);
    }


    /**
     * 个人账户修改(按照账号ID修改)
     *
     * @param $option
     * @return UpdatePersonAccountByAccountId
     */
    public static function updatePersonAccountByAccountId($option)
    {
        return new UpdatePersonAccountByAccountId($option);
    }

    /**
     * 个人账户修改(按照第三方用户ID修改)
     * @param $thirdPartyUserId
     * @return UpdatePersonAccountByThirdId
     */
    public static function updatePersonAccountByThirdId($thirdPartyUserId)
    {
        return new UpdatePersonAccountByThirdId($thirdPartyUserId);
    }
}