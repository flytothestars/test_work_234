{extends file="layouts.tpl"}

{block name="content"}
    <section class="category-page">
        <header class="category-page__head">
            <h1 class="category-page__title">{$category.name|escape}</h1>
            {if $category.description}
                <p class="category-page__desc">{$category.description|escape}</p>
            {/if}
        </header>

        <div class="toolbar">
            <span class="toolbar__count">{$total} article{if $total != 1}s{/if}</span>
            <form class="toolbar__sort" method="get" action="/category/{$category.id}">
                <label for="sort">Сортировка</label>
                {assign var=labels value=['newest'=>'Новые','oldest'=>'Старые','views'=>'Популярные']}
                <select id="sort" name="sort" onchange="this.form.submit()">
                    {foreach $sorts as $key}
                        <option value="{$key}"{if $key == $sort} selected{/if}>{$labels[$key]}</option>
                    {/foreach}
                </select>
            </form>
        </div>
        
        <div class="grid">
            {foreach $articles as $article}
                {include file="card.tpl"}
            {foreachelse}
                <p class="empty">No articles in this category.</p>
            {/foreach}
        </div>

        {if $total_pages > 1}
            <nav class="pagination">
                {if $page > 1}
                    <a class="pagination__link" href="/category/{$category.id}?sort={$sort}&amp;page={$page-1}">&laquo; Prev</a>
                {/if}

                {section name=p start=1 loop=$total_pages+1}
                    {if $smarty.section.p.index == $page}
                        <span class="pagination__link is-active">{$smarty.section.p.index}</span>
                    {else}
                        <a class="pagination__link" href="/category/{$category.id}?sort={$sort}&amp;page={$smarty.section.p.index}">{$smarty.section.p.index}</a>
                    {/if}
                {/section}

                {if $page < $total_pages}
                    <a class="pagination__link" href="/category/{$category.id}?sort={$sort}&amp;page={$page+1}">Next &raquo;</a>
                {/if}
            </nav>
        {/if}
    </section>
{/block}
