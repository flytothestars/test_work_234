{extends file="layouts.tpl"}

{block name="content"}
    <section class="category-page">
        <header class="category-page__head">
            <h1 class="category-page__title">{$category.name|escape}</h1>
            {if $category.description}
                <p class="category-page__desc">{$category.description|escape}</p>
            {/if}
        </header>

        <div class="grid">
            {foreach $articles as $article}
                {include file="card.tpl"}
            {foreachelse}
                <p class="empty">No articles in this category.</p>
            {/foreach}
        </div>

    </section>
{/block}
