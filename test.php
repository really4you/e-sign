<?php
require "vendor/autoload.php";

use \really4you\E\Sign\Esign;
Esign::init('7438819368','5eb5b91cbfbc282fa858cffd97967a0f');

// 创建个人签署账号

//$option = ['thirdPartyUserId'=>'1232133232'];
//$Test = new \really4you\E\Sign\SaasNonstandardEdition\Personal();
//$res  = $Test->addPersonAccountID($option);
//var_dump($res);exit;
//
//// 创建机构账号
//$option = ['thirdPartyUserId'=>'8872534919e3413aa06404fad9044413','name'=>'四川天投123','idNumber'=>'513902198910015837','test'=>12121];
//$Test = new \really4you\E\Sign\SaasNonstandardEdition\Organizations();
//$res = $Test->createOrganizationsByThirdPartyUserId($option);
//var_dump($res);exit;
//


$Test = new \really4you\E\Sign\SaasNonstandardEdition\Organizations();
$option = ['orgId'=>'8872534919e3413aa06404fad9044413','name'=>'四川天投123','idNumber'=>'513902198910015837','test'=>12121];
$res = $Test->updateOrganizationsByOrgId($option);
var_dump($res);exit;
//
//$res = $Test->updateOrganizationsByOrgId('8872534919e3413aa06404fad9044413','四川天投1','','',
//    '513902198910015837');
//var_dump($res);exit;
//$res  = $Test->createOrganizationsByThirdPartyUserId('279057911','fffbcd01c77744c2802e0b96b66c0060',
//    '四川天投');
//var_dump($res);exit;
//
//
//// 创建个人模板印章
$s = new \really4you\E\Sign\SaasNonstandardEdition\SignetApi();
$option = ['accountId'=>'fffbcd01c77744c2802e0b96b66c0060'];
$r = $s->CreatePersonalTemplate($option);
var_dump($r);exit;

//   创建机构模板印章
//$option = ['orgId'=>'8872534919e3413aa06404fad9044413'];
//$res = $s->CreateOfficialtemplate($option);
//var_dump($res);exit;

//$option = ['accountId'=>'fffbcd01c77744c2802e0b96b66c0060','email'=>'zqlpcs@qq.com'];
//
//$res = $Test->UpdatePersonAccountByAccountId($option);
//var_dump($res);exit;


// 通过上传方式创建模板
$option = ['filePath'=>'/mnt/d/application/test.pdf'];
$t = new \really4you\E\Sign\SaasNonstandardEdition\FileTemplateApi();
//$res = $t->CreateTemplateByUploadUrl($option);  // templateId:f812bbf7d24041d298545c2c4b7bb83b
//var_dump($res);exit;

var_dump($t->TemplatesInfo('f812bbf7d24041d298545c2c4b7bb83b'));exit;
$option = ['templateId'=>'f812bbf7d24041d298545c2c4b7bb83b','name'=>'测试文件.pdf','simpleFormFields'=>['name'=>'test111']];
$res = $t->createFileByTemplate($option);
var_dump($res);exit;
// 通过模板创建文件

$t = new \really4you\E\Sign\Authentication\Personal\CertificationServicesApi();
$res = $t->bankCard4Factors('fffbcd01c77744c2802e0b96b66c0060','13056687707','6227003813251825127');
var_dump($res);exit;



