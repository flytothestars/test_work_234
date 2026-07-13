{extends file="layouts.tpl"}
{block name="content"}
    {foreach $blocks as $block}
        <section class="category-block">
            <div class="category-block__head">
                <h2 class="category-block__title">{$block.category.name|escape}</h2>
                <a class="category-block__all" href="#">Смотреть все</a>
            </div>
            <div>
                {foreach $block.articles as $article}
                    <article class="card">
                        <a class="card__image" href="#">
                            <img src="{$article.image}" alt="{$article.title|escape}" loading="lazy">
                        </a>
                        <h3 class="card__title">
                            <a href="#">{$article.title|escape}</a>
                        </h3>
                        <p class="card__date">{$article.published_at|date_format:'%B %e, %Y'}</p>
                        <p class="card__description">{$article.description|escape}</p>
                    </article>
                {/foreach}
            </div>
        </section>
    {foreachelse}
        <li>no categories found</li>        
    {/foreach}
{/block}
