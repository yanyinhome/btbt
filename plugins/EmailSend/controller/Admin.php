<?php
// +----------------------------------------------------------------------
// | 发送邮件插件
// +----------------------------------------------------------------------
// | 版权所有 2018~2019 依然网络 [ http://www.0634yr.com]
// +----------------------------------------------------------------------
// | Author by LaoWu <316247278@qq.com>
// +----------------------------------------------------------------------
namespace plugins\EmailSend\controller;

use app\common\builder\ZBuilder;
use app\common\controller\Common;
use plugins\EmailSend\model\EmailsendTemplate;
use plugins\EmailSend\validate\EmailsendTemplate as EmailsendTemplateValidate;

/**
 * 插件后台管理控制器
 * @package plugins\EmailSend\controller
 */
class Admin extends Common
{
    /**
     * 插件管理页
     * @author 吴秀贺<316247278@qq.com>
     * @return mixed
     */
    public function index()
    {
        // 查询条件
        $map = $this->getMap();

        $data_list = EmailsendTemplate::where($map)->order('id desc')->paginate();
        // 分页数据
        $page = $data_list->render();

       
        $btnBack['title'] = '返回插件列表';
        $btnBack['icon'] = 'fa fa-reply';
        $btnBack['href'] = url('plugin/index');
        $btnBack['class'] = 'btn btn-warning';

        // 自定义按钮
        $btnOne = [
            'title'  => '发送测试',
            'icon'  => 'fa fa-cogs',
            'href'   => plugin_url('EmailSend/Admin/sendtest',['id'=>'__id__']),
            'target' => '',
        ];
        
        // 用TableBuilder渲染模板
        return ZBuilder::make('table')
            ->setPageTitle('数据列表')
            ->setSearch(['id' => 'ID', 'template_name' => '模板名称'])
            ->addColumn('id', 'ID')
            ->addColumns([
                ['template_name', '模板名称'],
                ['template_keys', '模版参数'],
                ['template_content', '模版内容'],
                ['status', '状态', 'switch'],
                ['right_button', '操作', 'btn']
                
            ])
            ->addTopButton('custom', $btnBack)
            ->addTopButton('add', ['plugin_name' => 'EmailSend'])
            ->addTopButtons('enable,disable,delete')
            ->addRightButton('edit', ['plugin_name' => 'EmailSend'])
            ->addRightButtons('enable,disable,delete')
            ->addRightButton('custom', $btnOne,true)
            ->setTableName('plugin_email_template')
            ->setRowList($data_list)
            ->setPages($page)
            ->fetch();
    }

    /**
     * 新增
     * @author 吴秀贺<316247278@qq.com>
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            // 验证数据
            $result = $this->validate($data, [
                'template_name|模版名称' => 'require',
            ]);
            if(true !== $result){
                // 验证失败 输出错误信息
                return $this->error($result);
            }

            // 插入数据
            if (EmailsendTemplate::create($data)) {
                return $this->success('新增成功', cookie('__forward__'));
            } else {
                return $this->error('新增失败');
            }
        }

        // 使用ZBuilder快速创建表单
        return ZBuilder::make('form')
            ->setPageTitle('新增')
            ->addFormItem('text', 'template_name', '模板名称')
            ->addFormItem('tags', 'template_keys', '模版参数','每一个请按回车输入')
            ->addFormItem('ueditor', 'template_content', '模版内容','请用{$key}代替变量参数名,key表示你填写的模板参数')
            ->fetch();
    }

    /**
     * 编辑
     * @author 吴秀贺<316247278@qq.com>
     */
    public function edit()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();

            // 使用自定义的验证器验证数据
            $validate = new EmailsendTemplateValidate();
            if (!$validate->check($data)) {
                // 验证失败 输出错误信息
                return $this->error($validate->getError());
            }

            // 更新数据
            if (EmailsendTemplate::update($data)) {
                return $this->success('编辑成功', cookie('__forward__'));
            } else {
                return $this->error('编辑失败');
            }
        }

        $id = input('param.id');

        // 获取数据
        $info = EmailsendTemplate::get($id);

        // 使用ZBuilder快速创建表单
        return ZBuilder::make('form')
            ->setPageTitle('编辑')
            ->addFormItem('hidden', 'id')
            ->addFormItem('text', 'template_name', '模板名称')
            ->addFormItem('tags', 'template_keys', '模版参数','每一个请按回车输入')
            ->addFormItem('ueditor', 'template_content', '模版内容','请用{$key}代替变量参数名,key表示你填写的模板参数')
            ->setFormData($info)
            ->fetch();
    }

    /**
     * 发送测试
     * @author 吴秀贺<316247278@qq.com>
     */
    public function sendtest()
    {
        if ($this->request->isPost()) {
            $param = $this->request->param();
            
            
            $reponse = plugin_action('EmailSend/SendEmail/send',[$param]);
            if ($reponse['error']==0) {
                $this->success($reponse['message']);
            } else {
                $this->error($reponse['message']);
            }
            
            
        }
        
        
        $template_id  = input('param.id');;//模板ID
        $templateinfo = EmailsendTemplate::get($template_id);
        
        $subject = $templateinfo['template_name'];
       
        
        $template_keys = explode(',', $templateinfo['template_keys']);
        
        
        
       //return $this->fetch(config('plugin_path'). 'EmailSend/view/sendtest', $template_keys);
        $this->assign('url',plugin_url('EmailSend/Admin/sendtest'));
        $this->assign('template_id',$template_id);
        $this->assign('template_keys',$template_keys);
        return $this->pluginView();
        
        
    }
   

   
}
