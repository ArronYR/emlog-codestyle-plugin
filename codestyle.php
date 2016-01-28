<?php
/*
Plugin Name: 代码高亮样式插件
Version: 1.0
Plugin URL: http://www.helloarron.com/
Description: 在博文中选择代码高亮样式。技术博客必备。采用prettify插件，兼容官方后台编辑器提供的所有编程语言。
Author: Arron
Author Email: yangyun4814@1gmail.com
ForEmlog: > 5.1.0
Author URL: http://www.helloarron.com/
*/

!defined('EMLOG_ROOT') && exit('access deined!');

require_once 'codestyle_config.php';

function codestyle(){
    global $config;
?>
    <link href="<?php echo BLOG_URL;?>content/plugins/codestyle/css/prettify-<?php echo $config["style"];?>-theme.css" rel="stylesheet" type="text/css" />
    <?php if($config["jquery"] == 'yes'): ?>
    <script src="<?php echo BLOG_URL;?>/include/lib/js/jquery/jquery-1.7.1.js" type="text/javascript"></script>
    <?php endif;?>
    <script src="<?php echo BLOG_URL;?>/content/plugins/codestyle/js/prettify.js" type="text/javascript"></script>
    <script src="<?php echo BLOG_URL;?>/content/plugins/codestyle/js/codestyle.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
            <?php if($config["numlines"] == 'yes'): ?>
                numlines();
            <?php else:?>
                noNumlines();
            <?php endif;?>
        });
    </script>

<?php }?>

<?php
function codestyle_menu(){
    echo '<div class="sidebarsubmenu"><a href="./plugin.php?plugin=codestyle">CodeStyle</a></div>';
}?>

<?php
    if ($config['on'] == 'yes') {
        addAction('index_footer','codestyle');
    }
    addAction('adm_sidebar_ext', 'codestyle_menu');
?>