<?php
// +----------------------------------------------------------------------
// | 发送邮件插件
// +----------------------------------------------------------------------
// | 版权所有 2018~2019 依然网络 [ http://www.0634yr.com]
// +----------------------------------------------------------------------
// | Author by LaoWu <316247278@qq.com>
// +----------------------------------------------------------------------
namespace plugins\EmailSend\controller;


use app\common\controller\Common;
use plugins\EmailSend\model\EmailsendTemplate;
require_once(dirname(dirname(__FILE__))."/phpmailer/class.phpmailer.php");
require_once(dirname(dirname(__FILE__))."/phpmailer/class.smtp.php");
/**
 * 插件后台管理控制器
 * @package plugins\EmailSend\controller
 */
class SendEmail extends Common
{
    public function send($param=[]){
        
        $address       = $param['email'];//邮箱
        
        
        $template_id          = $param['template_id'];//模板ID
        $templateinfo = EmailsendTemplate::get($template_id);
        
        $subject = $templateinfo['template_name'];
        $message = htmlspecialchars_decode($templateinfo['template_content']);
        
        $template_keys = explode(',', $templateinfo['template_keys']);
        
        foreach($template_keys as $keys){
            $keys = trim($keys);
            $message = str_replace('{$'.$keys.'}', $param[$keys], $message);
        }
        
        
        $smtpSetting = plugin_config("EmailSend");
        
        $expire_minute = intval($smtpSetting['expire_minute']);
        $expire_minute = empty($expire_minute) ? 30 : $expire_minute;
        $expire_time   = time() + $expire_minute * 60;
        
        $checkmail='/^[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+[-.])+([a-z]{2,5})$/ims';
        if(!preg_match($checkmail,$address)){
            return ["error" => 1, 'expire_time'=>$expire_time,"message" => "邮箱格式不正确"];
        }
        
        
        //halt(time().$expire_time);
        $mail        = new \PHPMailer();
        // 设置PHPMailer使用SMTP服务器发送Email
        $mail->IsSMTP();
        $mail->IsHTML(true);
        //$mail->SMTPDebug = 3;
        // 设置邮件的字符编码，若不指定，则为'UTF-8'
        $mail->CharSet = 'UTF-8';
        // 添加收件人地址，可以多次使用来添加多个收件人
        $mail->AddAddress($address);
        // 设置邮件正文
        $mail->Body = $message;
        //$mail->SMTPDebug = 2;
        // 设置邮件头的From字段。
        $mail->From = $smtpSetting['from'];
        // 设置发件人名字
        $mail->FromName = $smtpSetting['from_name'];
        // 设置邮件标题
        $mail->Subject = $subject;
        // 设置SMTP服务器。
        $mail->Host = $smtpSetting['host'];
        //by Rainfer
        // 设置SMTPSecure。
        $Secure           = $smtpSetting['smtp_secure'];
        $mail->SMTPSecure = empty($Secure) ? '' : $Secure;
        // 设置SMTP服务器端口。
        $port       = $smtpSetting['port'];
        $mail->Port = empty($port) ? "25" : $port;
        // 设置为"需要验证"
        $mail->SMTPAuth    = true;
        $mail->SMTPAutoTLS = false;
        $mail->Timeout     = 10;
        // 设置用户名和密码。
        $mail->Username = $smtpSetting['username'];
        $mail->Password = $smtpSetting['password'];
        // 发送邮件。
        if (!$mail->Send()) {
            $mailError = $mail->ErrorInfo;
            return ["error" => 1, 'expire_time'=>$expire_time,"message" => $mailError];
        } else {
            return ["error" => 0,'expire_time'=>$expire_time, "message" => "发送成功"];
        }
        
        
    }
}