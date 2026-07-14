<?php
/* Smarty version 5.8.4, created on 2026-07-14 04:55:38
  from 'file:category.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a55c14abb1c16_92616545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '170c759e3490ef211c87fc7808a9059c94d7dda2' => 
    array (
      0 => 'category.tpl',
      1 => 1784004937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:card.tpl' => 1,
  ),
))) {
function content_6a55c14abb1c16_92616545 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19761875636a55c14abaea58_67052094', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_19761875636a55c14abaea58_67052094 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
?>

    <section class="category-page">
        <header class="category-page__head">
            <h1 class="category-page__title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
            <?php if ($_smarty_tpl->getValue('category')['description']) {?>
                <p class="category-page__desc"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php }?>
        </header>

        <div class="grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('articles'), 'article');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach0DoElse = false;
?>
                <?php $_smarty_tpl->renderSubTemplate("file:card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <?php
}
if ($foreach0DoElse) {
?>
                <p class="empty">No articles in this category.</p>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>

    </section>
<?php
}
}
/* {/block "content"} */
}
