<?php
/* Smarty version 3.1.30, created on 2017-02-27 20:17:34
  from "C:\wamp64\www\PHP.learn\mvc1.0\tpl\admin\leftmenu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b4895ea62724_77469541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd398f97003e4b44c526c8973170c2a695d57497' => 
    array (
      0 => 'C:\\wamp64\\www\\PHP.learn\\mvc1.0\\tpl\\admin\\leftmenu.html',
      1 => 1402863938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b4895ea62724_77469541 (Smarty_Internal_Template $_smarty_tpl) {
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
