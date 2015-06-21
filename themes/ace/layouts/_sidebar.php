<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;
?>
<div id="sidebar" class="sidebar responsive">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success"><i class="ace-icon fa fa-signal"></i></button>
            <button class="btn btn-info"><i class="ace-icon fa fa-pencil"></i></button>
            <!-- #section:basics/sidebar.layout.shortcuts -->
            <button class="btn btn-warning"><i class="ace-icon fa fa-users"></i></button>
            <button class="btn btn-danger"><i class="ace-icon fa fa-cogs"></i></button>
            <!-- /section:basics/sidebar.layout.shortcuts -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <?php
    $items = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, function($menu) {
        $icons = [
            'rbac' => '<i class="menu-icon fa fa-user-secret"></i>',
            'settings' => '<i class="menu-icon fa fa-cog"></i>',
        ];
        $icon = isset($icons[strtolower($menu['name'])]) ? $icons[strtolower($menu['name'])] : '';

        $item = [
            'label' => $menu['name'],
            'url' => \mdm\admin\components\MenuHelper::parseRoute($menu['route']),
            'active' => stripos(Yii::$app->request->getUrl(), rtrim($menu['route'], '/index')) === false ? null : true,
            // 二级以下菜单链接样式
            'template' => "\n<a href=\"{url}\"><i class=\"menu-icon fa fa-caret-right\"></i> <span class=\"menu-text\">{label}</span></a> <b class=\"arrow\"></b>\n",
        ];

        if ($menu['children'] != []) {
            $item['items'] = $menu['children'];
            // 顶级菜单链接样式
            $item['template'] = "\n<a href=\"{url}\" class=\"dropdown-toggle\">{$icon} <span class=\"menu-text\">{label}</span> <b class=\"arrow fa fa-angle-down\"></b></a> <b class=\"arrow\"></b>\n";
        }

        return $item;
    }, true);

    array_unshift($items, [
        'label' => 'Dashboard',
        'url' => Url::toRoute('/fuckme'),
        'template' => "\n<a href=\"{url}\"><i class=\"menu-icon fa fa-tachometer\"></i> <span class=\"menu-text\">{label}</span></a> <b class=\"arrow\"></b>\n",
    ]);

    echo Menu::widget([
        'options'           => ['class' => 'nav nav-list'],
        'items'             => $items,
        'submenuTemplate'   => "\n<ul class=\"submenu\">\n{items}\n</ul>\n",
        'activateParents'   => true,
    ]);
    ?>

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
    <!-- /section:basics/sidebar.layout.minimize -->
</div>
