<?php
/* Smarty version 5.8.4, created on 2026-07-13 09:44:27
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a54b37b2ca755_93608549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6a7bfc0aa19c0666237e02a6da061b5e2ea8a30' => 
    array (
      0 => 'home.tpl',
      1 => 1783935864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a54b37b2ca755_93608549 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1><?php echo $_smarty_tpl->getValue('title');?>
</h1>
    <ul>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
        <li><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>
</li>
    <?php
}
if ($foreach0DoElse) {
?>
        <li>no categories found</li>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</ul>
</body>
</html>
<?php }
}
