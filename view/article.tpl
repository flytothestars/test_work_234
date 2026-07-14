{extends file="layouts.tpl"}

{block name="content"}
    <article class="article">
        <div class="article__cats">
            {foreach $categories as $cat}
                <a class="tag" href="#">{$cat.name|escape}</a>
            {/foreach}
        </div>

        <h1 class="article__title">{$article.title|escape}</h1>

        <div class="article__meta">
            <span>{$article.published_at|date_format:'%B %e, %Y'}</span>
            <span>&middot;</span>
            <span>{$article.views}</span>
        </div>

        {if $article.image}
            <img class="article__image" src="{$article.image}" alt="{$article.title|escape}">
        {/if}

        <p class="article__lead">{$article.description|escape}</p>

        <div class="article__body">
            {$article.body|escape|nl2br}
        </div>
    </article>
{/block}
