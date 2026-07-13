<?php
/* Smarty version 5.8.4, created on 2026-07-13 10:25:39
  from 'file:card.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a54bd234d0225_99101487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '038978698e7ca5ca73807345497437b12d510cc1' => 
    array (
      0 => 'card.tpl',
      1 => 1783938337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a54bd234d0225_99101487 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/view';
?><article class="card">
    <a class="card__image" href="#">
        <img src="<?php echo (($tmp = $_smarty_tpl->getValue('article')['image'] ?? null)===null||$tmp==='' ? 'https://placehold.co/600x400' ?? null : $tmp);?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['title'], ENT_QUOTES, 'UTF-8', true);?>
" loading="lazy">
    </a>
    <h3 class="card__title">
        <a href="#"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
    </h3>
    <p class="card__date"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('article')['published_at'],'%B %e, %Y');?>
</p>
    <p class="card__excerpt"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('article')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <a class="card__more" href="#">Продолжить чтение</a>
</article>
<?php }
}
