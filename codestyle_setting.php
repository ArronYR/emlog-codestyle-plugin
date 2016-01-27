<?php
/**
 * 设置
 */

!defined('EMLOG_ROOT') && exit('access deined!');

require_once 'codestyle_config.php';

function plugin_setting(){
    $style = $_POST["style"]=="" ? "default": $_POST["style"];
    $numlines = $_POST["numlines"]=="" ? "no": $_POST["numlines"];
    $on = $_POST["on"]=="" ? "no" : $_POST["on"];
    $newConfig = '<?php
$config = array(
    "style" => "'.$style.'",
    "numlines" => "'.$numlines.'",
    "on" => "'.$on.'",
);';
    echo $newConfig;
    @file_put_contents(EMLOG_ROOT.'/content/plugins/codestyle/codestyle_config.php', $newConfig);
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo BLOG_URL;?>content/plugins/codestyle/css/codestyle.css"/>

<div class="codestyle-container">
    <div class="codestyle-header">
        <h2>配置文件</h2>
        <?php if(isset($_GET['setting'])){echo "<span class='actived'>设置保存成功!</span>";}?>
    </div>

    <div class="codestyle-form">
        <form action="plugin.php?plugin=codestyle&action=setting" method="post">
            <ul>
                <li>
                    <h4>是否启用该插件</h4>
                    <div class="radio"><input type="radio" name="on" value="yes"<?php if($config["on"] == 'yes'){echo ' checked="checked"';}?> /><label>是</label></div>
                    <div class="radio"><input type="radio" name="on" value="no"<?php if($config["on"]=='no'){echo ' checked="checked"';}?> /><label>否</label></div>
                    <p>如果启用该插件，页面代码样式将被替换，如不需要选择不启用</p>
                </li>
                <li>
                    <h4>开启代码行号</h4>
                    <div class="radio"><input type="radio" name="numlines" value="yes"<?php if($config["numlines"] == 'yes'){echo ' checked="checked"';}?> /><label>是</label></div>
                    <div class="radio"><input type="radio" name="numlines" value="no"<?php if($config["numlines"]=='no'){echo ' checked="checked"';}?> /><label>否</label></div>
                    <p>如果需要在代码前显示行号，请开启该选项，如不需要选择不开启</p>
                </li>
                <div class="sl">
                    注意事项：<br />
                    1、模板必须含有挂载点(没有请自行加上)：&lt;?php doAction('index_footer');?&gt;<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;修改正在使用的主题下的 footer.php ,在body标签结束之前加上。<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;查看当前插件挂载点及说明：<a href="http://wiki.emlog.net/doku.php?id=plugindev" target="_blank">wiki.emlog.net/doku.php?id=plugindev</a><br/>
                    2、默认使用default样式，代码行号开启；<br/>
                    3、修改后上面选择可能不会及时更改，请点击左边菜单栏刷新。
                </div>
            </ul>
            <input type="submit" class="button" name="submit" value="保存设置" />
        </form>
    </div>
</div>