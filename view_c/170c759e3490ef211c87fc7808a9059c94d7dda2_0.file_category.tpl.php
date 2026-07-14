<?php
/* Smarty version 5.8.4, created on 2026-07-14 06:40:22
  from 'file:category.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a55d9d6836930_24775637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '170c759e3490ef211c87fc7808a9059c94d7dda2' => 
    array (
      0 => 'category.tpl',
      1 => 1784011202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:card.tpl' => 1,
  ),
))) {
function content_6a55d9d6836930_24775637 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_603246126a55d9d682a8c7_24724022', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_603246126a55d9d682a8c7_24724022 extends \Smarty\Runtime\Block
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

        <div class="toolbar">
            <span class="toolbar__count"><?php echo $_smarty_tpl->getValue('total');?>
 article<?php if ($_smarty_tpl->getValue('total') != 1) {?>s<?php }?></span>
            <form class="toolbar__sort" method="get" action="/category/<?php echo $_smarty_tpl->getValue('category')['id'];?>
">
                <label for="sort">Сортировка</label>
                <?php $_smarty_tpl->assign('labels', array('newest'=>'Новые','oldest'=>'Старые','views'=>'Популярные'), false, NULL);?>
                <select id="sort" name="sort" onchange="this.form.submit()">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('sorts'), 'key');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('key');?>
"<?php if ($_smarty_tpl->getValue('key') == $_smarty_tpl->getValue('sort')) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('labels')[$_smarty_tpl->getValue('key')];?>
</option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </form>
        </div>
        
        <div class="grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('articles'), 'article');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('article')->value) {
$foreach1DoElse = false;
?>
                <?php $_smarty_tpl->renderSubTemplate("file:card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <?php
}
if ($foreach1DoElse) {
?>
                <p class="empty">No articles in this category.</p>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>

        <?php if ($_smarty_tpl->getValue('total_pages') > 1) {?>
            <nav class="pagination">
                <?php if ($_smarty_tpl->getValue('page') > 1) {?>
                    <a class="pagination__link" href="/category/<?php echo $_smarty_tpl->getValue('category')['id'];?>
?sort=<?php echo $_smarty_tpl->getValue('sort');?>
&amp;page=<?php echo $_smarty_tpl->getValue('page')-1;?>
">&laquo; Prev</a>
                <?php }?>

                <?php
$__section_p_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('total_pages')+1) ? count($_loop) : max(0, (int) $_loop));
$__section_p_0_start = min(1, $__section_p_0_loop);
$__section_p_0_total = min(($__section_p_0_loop - $__section_p_0_start), $__section_p_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_p'] = new \Smarty\Variable(array());
if ($__section_p_0_total !== 0) {
for ($__section_p_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] = $__section_p_0_start; $__section_p_0_iteration <= $__section_p_0_total; $__section_p_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']++){
?>
                    <?php if (($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null) == $_smarty_tpl->getValue('page')) {?>
                        <span class="pagination__link is-active"><?php echo ($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null);?>
</span>
                    <?php } else { ?>
                        <a class="pagination__link" href="/category/<?php echo $_smarty_tpl->getValue('category')['id'];?>
?sort=<?php echo $_smarty_tpl->getValue('sort');?>
&amp;page=<?php echo ($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null);?>
"><?php echo ($_smarty_tpl->getValue('__smarty_section_p')['index'] ?? null);?>
</a>
                    <?php }?>
                <?php
}
}
?>

                <?php if ($_smarty_tpl->getValue('page') < $_smarty_tpl->getValue('total_pages')) {?>
                    <a class="pagination__link" href="/category/<?php echo $_smarty_tpl->getValue('category')['id'];?>
?sort=<?php echo $_smarty_tpl->getValue('sort');?>
&amp;page=<?php echo $_smarty_tpl->getValue('page')+1;?>
">Next &raquo;</a>
                <?php }?>
            </nav>
        <?php }?>
    </section>
<?php
}
}
/* {/block "content"} */
}
