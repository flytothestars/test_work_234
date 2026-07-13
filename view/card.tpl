<article class="card">
    <a class="card__image" href="#">
        <img src="{$article.image|default:'https://placehold.co/600x400'}" alt="{$article.title|escape}" loading="lazy">
    </a>
    <h3 class="card__title">
        <a href="#">{$article.title|escape}</a>
    </h3>
    <p class="card__date">{$article.published_at|date_format:'%B %e, %Y'}</p>
    <p class="card__excerpt">{$article.description|escape}</p>
    <a class="card__more" href="#">Продолжить чтение</a>
</article>
