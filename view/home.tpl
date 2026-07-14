{extends file="layouts.tpl"}

{block name="content"}
    {foreach $blocks as $block}
        <section class="category-block">
            <div class="category-block__head">
                <h2 class="category-block__title">{$block.category.name|escape}</h2>
                <a class="category-block__all" href="/category/{$block.category.id}">View All</a>
            </div>

            <div class="grid">
                {foreach $block.articles as $article}
                    {include file="card.tpl"}
                {/foreach}
            </div>
        </section>
    {foreachelse}
        <p class="empty">No categories found.</p>
    {/foreach}
{/block}
