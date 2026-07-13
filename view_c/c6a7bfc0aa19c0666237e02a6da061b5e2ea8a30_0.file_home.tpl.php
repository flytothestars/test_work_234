<?php
/* Smarty version 5.8.4, created on 2026-07-13 10:07:18
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a54b8d66620e0_70948340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6a7bfc0aa19c0666237e02a6da061b5e2ea8a30' => 
    array (
      0 => 'home.tpl',
      1 => 1783937237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a54b8d66620e0_70948340 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5222070636a54b8d665b372_03598909', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_5222070636a54b8d665b372_03598909 extends \Smarty\Runtime\Block
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
                <a class="category-block__all" href="#">Смотреть все</a>
            </div>
            <div>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('block')['articles'], 'article');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach1DoElse = false;
?>
                    <article class="card">
                        <a class="card__image" href="#">
                            <img src="<?php echo $_smarty_tpl->getValue('article')['image'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['title'], ENT_QUOTES, 'UTF-8', true);?>
" loading="lazy">
                        </a>
                        <h3 class="card__title">
                            <a href="#"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                        </h3>
                        <p class="card__date"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('article')['published_at'],'%B %e, %Y');?>
</p>
                        <p class="card__description"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                    </article>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        </section>
    <?php
}
if ($foreach0DoElse) {
?>
        <li>no categories found</li>        
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}
}
/* {/block "content"} */
}
