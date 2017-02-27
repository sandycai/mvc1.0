<?php
/* Smarty version 3.1.30, created on 2017-02-27 19:34:36
  from "C:\wamp64\www\PHP.learn\mvc\tpl\admin\leftmenu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b47f4c34b906_44371916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bc45ed230d2040a0c26b6e6dae862a971a9f1c8' => 
    array (
      0 => 'C:\\wamp64\\www\\PHP.learn\\mvc\\tpl\\admin\\leftmenu.html',
      1 => 1402863938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b47f4c34b906_44371916 (Smarty_Internal_Template $_smarty_tpl) {
?>
<aside id="sidebar" class="column">
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="admin.php?controller=admin&method=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="admin.php?controller=admin&method=newslist">管理新闻</a></li>
	</ul>
	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="admin.php?controller=admin&method=logout">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar --><?php }
}
