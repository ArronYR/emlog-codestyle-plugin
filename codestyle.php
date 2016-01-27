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

?>

<?php
function codestyle_menu(){
    echo '<div class="sidebarsubmenu"><a href="./plugin.php?plugin=codestyle">CodeStyle</a></div>';
}?>

<?php
    addAction('adm_sidebar_ext', 'codestyle_menu');
?>