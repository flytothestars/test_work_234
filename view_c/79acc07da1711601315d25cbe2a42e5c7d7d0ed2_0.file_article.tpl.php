<?php
/* Smarty version 5.8.4, created on 2026-07-14 06:39:57
  from 'file:article.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a55d9bdf2a621_79337177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79acc07da1711601315d25cbe2a42e5c7d7d0ed2' => 
    array (
      0 => 'article.tpl',
      1 => 1784009872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:card.tpl' => 1,
  ),
))) {
function content_6a55d9bdf2a621_79337177 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18405459346a55d9bdf22de8_18804307', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_18405459346a55d9bdf22de8_18804307 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
?>

    <article class="article">
        <div class="article__cats">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
                <a class="tag" href="#"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('cat')['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>

        <h1 class="article__title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['title'], ENT_QUOTES, 'UTF-8', true);?>
</h1>

        <div class="article__meta">
            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('article')['published_at'],'%B %e, %Y');?>
</span>
            <span>&middot;</span>
            <span><?php echo $_smarty_tpl->getValue('article')['views'];?>
</span>
        </div>

        <?php if ($_smarty_tpl->getValue('article')['image']) {?>
            <img class="article__image" src="<?php echo $_smarty_tpl->getValue('article')['image'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['title'], ENT_QUOTES, 'UTF-8', true);?>
">
        <?php }?>

        <p class="article__lead"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>

        <div class="article__body">
            <?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->getValue('article')['body'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>

        </div>
    </article>

    <?php if ($_smarty_tpl->getValue('similar')) {?>
        <section class="similar">
            <h2 class="similar__title">Похожие статьи</h2>
            <div class="grid">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('similar'), 'article');
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
    <?php }
}
}
/* {/block "content"} */
}
