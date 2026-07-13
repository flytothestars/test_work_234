<?php
/* Smarty version 5.8.4, created on 2026-07-13 10:22:47
  from 'file:layouts.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a54bc772603d3_07199074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c6f3490a35aa2bf4254b1a9b7b3957ce4ebfc55' => 
    array (
      0 => 'layouts.tpl',
      1 => 1783938086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a54bc772603d3_07199074 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->getValue('title');?>
</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">

</head>
<body>
    <header class="site-header">
        <div class="container">
            <a class="brand" href="/">Post<span>.</span></a>
        </div>
    </header>
    <main class="container">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18851524196a54bc7725fb84_38108651', "content");
?>

    </main>
    <footer class="site-footer">
        <div class="container">
            Copyright @2026. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
<?php }
/* {block "content"} */
class Block_18851524196a54bc7725fb84_38108651 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
}
}
/* {/block "content"} */
}
