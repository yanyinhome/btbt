<?php
// +----------------------------------------------------------------------
// | 发送邮件插件
// +----------------------------------------------------------------------
// | 版权所有 2018~2019 依然网络 [ http://www.0634yr.com]
// +----------------------------------------------------------------------
// | Author by LaoWu <316247278@qq.com>
// +----------------------------------------------------------------------
namespace plugins\EmailSend\validate;

use think\Validate;

/**
 * 后台插件验证器
 * 
 */
class EmailsendTemplate extends Validate
{
    //定义验证规则
    protected $rule = [
        'template_name|模版名称' => 'require',
    ];
}