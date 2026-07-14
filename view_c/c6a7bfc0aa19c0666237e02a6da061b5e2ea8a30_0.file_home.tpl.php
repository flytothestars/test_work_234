<?php
/* Smarty version 5.8.4, created on 2026-07-13 12:06:32
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a54d4c868db27_33482107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6a7bfc0aa19c0666237e02a6da061b5e2ea8a30' => 
    array (
      0 => 'home.tpl',
      1 => 1783944341,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:card.tpl' => 1,
  ),
))) {
function content_6a54d4c868db27_33482107 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18725679336a54d4c8671722_85925097', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_18725679336a54d4c8671722_85925097 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
?>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('blocks'), 'block');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('block')->value) {
$foreach0DoElse = false;
?>
        <section class="category-block">
            <div class="category-block__head">
                <h2 class="category-block__title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('block')['category']['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <a class="category-block__all" href="/category/<?php echo $_smarty_tpl->getValue('block')['category']['id'];?>
">View All</a>
            </div>

            <div class="grid">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('block')['articles'], 'article');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach1DoElse = false;
?>
                    <?php $_smarty_tpl->renderSubTemplate("file:card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        </section>
    <?php
}
if ($foreach0DoElse) {
?>
        <p class="empty">No categories found.</p>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
/* {/block "content"} */
}
