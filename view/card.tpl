<article class="card">
    <a class="card__image" href="/article/{$article.id}">
        <img src="{$article.image|default:'https://placehold.co/600x400'}" alt="{$article.title|escape}" loading="lazy">
    </a>
    <h3 class="card__title">
        <a href="/article/{$article.id}">{$article.title|escape}</a>
    </h3>
    <p class="card__date">{$article.published_at|date_format:'%B %e, %Y'}</p>
    <p class="card__excerpt">{$article.description|escape}</p>
    <a class="card__more" href="/article/{$article.id}">Продолжить чтение</a>
</article>
