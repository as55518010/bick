<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // +----------------------------------------------------------------------
    // | 應用設置
    // +----------------------------------------------------------------------

    // 應用命名空間
    'app_namespace'          => 'app',
    // 應用調試模式
    'app_debug'              => true,
    // 應用Trace
    'app_trace'              => false,
    // 應用模式狀態
    'app_status'             => '',
    // 是否支持多模塊
    'app_multi_module'       => true,
    // 入口自動綁定模塊
    'auto_bind_module'       => false,
    // 註冊的根命名空間
    'root_namespace'         => [],
    // 擴展函數文件
    'extra_file_list'        => [THINK_PATH . 'helper' . EXT],
    // 默認輸出類型
    'default_return_type'    => 'html',
    // 默認AJAX 數據返回格式,可選json xml ...
    'default_ajax_return'    => 'json',
    // 默認JSONP格式返回的處理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默認JSONP處理方法
    'var_jsonp_handler'      => 'callback',
    // 默認時區
    'default_timezone'       => 'PRC',
    // 是否開啟多語言
    'lang_switch_on'         => false,
    // 默認全局過濾方法 用逗號分隔多個
    'default_filter'         => '',
    // 默認語言
    'default_lang'           => 'zh-cn',
    // 應用類庫後綴
    'class_suffix'           => false,
    // 控制器類後綴
    'controller_suffix'      => false,

    // +----------------------------------------------------------------------
    // | 模塊設置
    // +----------------------------------------------------------------------

    // 默認模塊名
    'default_module'         => 'index',
    // 禁止訪問模塊
    'deny_module_list'       => ['common'],
    // 默認控制器名
    'default_controller'     => 'Index',
    // 默認操作名
    'default_action'         => 'index',
    // 默認驗證器
    'default_validate'       => '',
    // 默認的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法後綴
    'action_suffix'          => '',
    // 自動搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL設置
    // +----------------------------------------------------------------------

    // PATHINFO變量名 用於兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO獲取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL偽靜態後綴
    'url_html_suffix'        => 'html',
    // URL普通方式參數 用於自動生成
    'url_common_param'       => false,
    // URL參數方式 0 按名稱成對解析 1 按順序解析
    'url_param_type'         => 0,
    // 是否開啟路由
    'url_route_on'           => true,
    // 路由使用完整匹配
    'route_complete_match'   => false,
    // 路由配置文件（支持配置多個）
    'route_config_file'      => ['route'],
    // 是否強制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如thinkphp.cn
    'url_domain_root'        => '',
    // 是否自動轉換URL中的控制器和操作名
    'url_convert'            => true,
    // 默認的訪問控制器層
    'url_controller_layer'   => 'controller',
    // 表單請求類型偽裝變量
    'var_method'             => '_method',

    // +----------------------------------------------------------------------
    // | 模板設置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板引擎類型 支持 php think 支持擴展
        'type'         => 'Think',
        // 模板路徑
        'view_path'    => '',
        // 模板後綴
        'view_suffix'  => 'htm',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通標籤開始標記
        'tpl_begin'    => '{',
        // 模板引擎普通標籤結束標記
        'tpl_end'      => '}',
        // 標籤庫標籤開始標記
        'taglib_begin' => '{',
        // 標籤庫標籤結束標記
        'taglib_end'   => '}',
    ],

      // 視圖輸出字符串內容替換
    'view_replace_str'       => [        
        '__ROOT__' => 'http://'.$_SERVER['HTTP_HOST'],
        '__INDEX__'=>'http://'.$_SERVER['HTTP_HOST'].'/public/static/index',
        '__PUBLIC__'=>'http://'.$_SERVER['HTTP_HOST'].'/public',
         '__ADMIN__' =>'http://'.$_SERVER['HTTP_HOST'].'/public/static/admin',
    ],
    // 默認跳轉頁面對應的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 異常及錯誤設置
    // +----------------------------------------------------------------------

    // 異常頁面的模板文件
    'exception_tmpl'         => THINK_PATH . 'tpl' . DS . 'think_exception.tpl',

    // 錯誤顯示信息,非調試模式有效
    'error_message'          => '頁面錯誤！請稍後再試～',
    // 顯示錯誤信息
    'show_error_msg'         => false,
    // 異常處理handle類 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 日誌設置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日誌記錄方式，內置 file socket 支持擴展
        'type'  => 'File',
        // 日誌保存目錄
        'path'  => LOG_PATH,
        // 日誌記錄級別
        'level' => [],
    ],

    // +----------------------------------------------------------------------
    // | Trace設置 開啟 app_trace 後 有效
    // +----------------------------------------------------------------------
    'trace'                  => [
        // 內置Html Console 支持擴展
        'type' => 'Html',
    ],

    // +----------------------------------------------------------------------
    // | 緩存設置
    // +----------------------------------------------------------------------

    'cache'                  => [
        // 驅動方式
        'type'   => 'File',
        // 緩存保存目錄
        'path'   => CACHE_PATH,
        // 緩存前綴
        'prefix' => '',
        // 緩存有效期 0表示永久緩存
        'expire' => 0,
    ],

    // +----------------------------------------------------------------------
    // | 會話設置
    // +----------------------------------------------------------------------

    'session'                => [
        'id'             => '',
        // SESSION_ID的提交變量,解決flash上傳跨域
        'var_session_id' => '',
        // SESSION 前綴
        'prefix'         => 'think',
        // 驅動方式 支持redis memcache memcached
        'type'           => '',
        // 是否自動開啟 SESSION
        'auto_start'     => true,
    ],

    // +----------------------------------------------------------------------
    // | Cookie設置
    // +----------------------------------------------------------------------
    'cookie'                 => [
        // cookie 名稱前綴
        'prefix'    => '',
        // cookie 保存時間
        'expire'    => 0,
        // cookie 保存路徑
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 啟用安全傳輸
        'secure'    => false,
        // httponly設置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],

    //分頁配置
    'paginate'               => [
        'type'      => 'bootstrap',
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
    //驗證碼配置規則
    'captcha'  => [
        // 驗證碼字符集合
        'codeSet'  => '123456789', 
        // 驗證碼字體大小(px)
        'fontSize' => 25, 
        // 是否畫混淆曲線
        'useCurve' => true, 
        // 驗證碼位數
        'length'   => 4, 
        // 驗證成功後是否重置        
        'reset'    => true
    ],
];
