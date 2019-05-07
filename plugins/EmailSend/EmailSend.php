<?php
// +----------------------------------------------------------------------
// | 邮件发送插件
// +----------------------------------------------------------------------
// | 版权所有 2018~2019 依然网络 [ http://www.0634yr.com]
// +----------------------------------------------------------------------
// | Author by LaoWu <316247278@qq.com>
// +----------------------------------------------------------------------
namespace plugins\EmailSend;


use app\common\controller\Plugin;



class EmailSend extends Plugin
{
    /**
     * @var array 插件信息
     */
    public $info = [
        // 插件名[必填]
        'name'        => 'EmailSend',
        // 插件标题[必填]
        'title'       => '发送邮件',
        // 插件唯一标识[必填],格式：插件名.开发者标识.plugin
        'identifier'  => 'emailsend.wuxiuhe.plugin',
        // 插件图标[选填]
        'icon'        => 'fa fa-fw fa-tty',
        // 插件描述[选填]
        'description' => '这是一个发送邮件的插件，可以用来发送邮箱验证的验证码或通知信息',
        // 插件作者[必填]
        'author'      => 'WuXiuHe',
        // 作者主页[选填]
        'author_url'  => 'http://www.0634yr.com',
        // 插件版本[必填],格式采用三段式：主版本号.次版本号.修订版本号
        'version'     => '1.0.1',
        // 是否有后台管理功能
        'admin'       => '1',
    ];
    
    /**
     * @var array 管理界面字段信息
     */
    public $admin = [
        'title'        => '邮件模板列表', // 后台管理标题
        'table_name'   => 'plugin_email_template', // 数据库表名，如果没有用到数据库，则留空
        'order'        => 'template_name', // 需要排序功能的字段，多个字段用逗号隔开
        'filter'       => '', // 需要筛选功能的字段，多个字段用逗号隔开
        'search_title' => '', // 搜索框提示文字,一般不用填写
        'search_field' => [ // 需要搜索的字段，如果需要搜索，则必填，否则不填
            'template_name' => '模板名称',
        ],
        'search_url' => '', // 搜索框url链接,如：'user/index'，一般不用填写
    
        // 后台列表字段
        'columns' => [
            ['id', 'ID'],
            ['template_name', '模板名称'],
            ['template_content', '模版内容'],
            ['template_keys', '模版参数'],
            ['status', '状态', 'switch'],
            ['right_button', '操作', 'btn']
        ],
    
        // 右侧按钮
        'right_buttons' => [
            'edit',          // 使用系统自带的编辑按钮
            'enable',       // 使用系统自带的启用按钮
            'disable',      // 使用系统自带的禁用按钮
            'delete',        // 使用系统自带的删除按钮
            // 自定义按钮，可定义多个
            'customs' => [
                [
                    'title'  => '发送测试',
                    'icon'  => 'fa fa-list',
                    'href'   => [
                        'url' => 'EmailSend/Admin/sendtest',
                    ],
                    'target' => '_blank',
                ],
                
            ],
            
        ],
    
        // 顶部栏按钮
        'top_buttons' => [
            'add',    // 使用系统自带的添加按钮
            'enable', // 使用系统自带的启用按钮
            'disable',// 使用系统自带的禁用按钮
            'delete', // 使用系统自带的删除按钮
        ],
    ];
    /**
     * @var array 新增或编辑的字段
     */
    public $fields = [
        [
            'name'  => 'template_name',
            'title' => '模板名称',
            'type'  => 'text',
            'value' => '',
        ],
        [
            'name'  => 'template_content',
            'title' => '模版内容',
            'type'  => 'ueditor',
            'value' => '',
            'tip'   => '',
        ],
        [
        'name'  => 'template_keys',
        'title' => '模版参数',
        'type'  => 'tags',
        'value' => '',
        'tip'   => '',
        ]
    ];
    /**
     * @var string 原数据库表前缀
     * 用于在导入插件sql时，将原有的表前缀转换成系统的表前缀
     * 一般插件自带sql文件时才需要配置
     */
    public $database_prefix = 'dp_';
    
    
    
    /**
     * 安装方法必须实现
     * 一般只需返回true即可
     * 如果安装前有需要实现一些业务，可在此方法实现
     * @return bool
     */
    public function install(){
        return true;
    }
    
    /**
     * 卸载方法必须实现
     * 一般只需返回true即可
     * 如果安装前有需要实现一些业务，可在此方法实现
     * @return bool
     */
    public function uninstall(){
        return true;
    }
    
}