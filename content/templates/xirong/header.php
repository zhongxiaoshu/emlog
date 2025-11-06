<?php
/**
 * Template Name: 息壤企业主题
 * Description: 专为高端企业打造的简约优雅主题，支持深色/浅色模式切换、响应式设计
 * Version: 1.0.0
 * Author: 息壤信息咨询服务
 * Author URL: https://7xr.cn
 */

defined('EMLOG_ROOT') || exit('access denied!');
require_once View::getView('module');

// 检查tpl_options插件 - 提供兼容函数
if (!function_exists('_g')) {
    function _g($key = null, $default = '') {
        return $default;
    }
    function _em($key = null, $default = '') {
        return $default;
    }
    // 在页面顶部显示提示
    echo '<div style="background:#fff3cd;color:#856404;padding:15px;text-align:center;border-bottom:1px solid #ffc107;">请先开启【模板设置】插件以使用息壤主题的全部功能。<a href="/admin/plugin.php" style="color:#856404;text-decoration:underline;margin-left:10px;">去开启</a></div>';
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">

    <title><?php echo $site_title; ?></title>
    <meta name="keywords" content="<?php echo $site_key; ?>">
    <meta name="description" content="<?php echo $site_description; ?>">

    <!-- DNS预解析 -->
    <link rel="dns-prefetch" href="<?php echo BLOG_URL; ?>">

    <!-- 主题色 -->
    <meta name="theme-color" content="#000000" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)">

    <!-- 样式表 -->
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>css/style.css?v=<?php echo Option::EMLOG_VERSION_TIMESTAMP; ?>">

    <?php doAction('index_head'); ?>
</head>
<body class="xr-body">
    <!-- SVG图标库 -->
    <?php xr_svg_icons(); ?>

    <!-- 页面加载动画 - 临时禁用以确保页面能显示 -->
    <!--
    <div class="xr-page-loader" id="page-loader">
        <div class="xr-loader-spinner"></div>
    </div>
    -->

    <!-- 顶部导航栏 -->
    <header class="xr-header" id="main-header">
        <div class="xr-container">
            <div class="xr-header-inner">
                <!-- LOGO -->
                <div class="xr-logo">
                    <a href="<?php echo BLOG_URL; ?>" class="xr-logo-link">
                        <?php
                        // 根据后台设置显示LOGO
                        $logoType = _g('logo_type') ?: 'text';
                        if ($logoType === 'text') {
                            // 文字LOGO
                            echo '<span class="xr-logo-text">7XR.CN</span>';
                        } else {
                            // 图片LOGO
                            $logoImg = _g('logo_image') ?: TEMPLATE_URL . 'images/logo.png';
                            echo '<img src="' . htmlspecialchars($logoImg, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($blogname, ENT_QUOTES, 'UTF-8') . '" class="xr-logo-img">';
                        }
                        ?>
                    </a>
                </div>

                <!-- 导航菜单 -->
                <?php xr_navigation(); ?>

                <!-- 移动端菜单按钮 - 由main.js控制 -->
                <button class="xr-mobile-menu-btn" id="mobile-menu-btn" aria-label="菜单">
                    <svg class="xr-icon"><use xlink:href="#icon-menu"></use></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- 移动端菜单覆盖层 - 由main.js控制 -->
    <div class="xr-mobile-menu-overlay" id="mobile-menu-overlay"></div>
