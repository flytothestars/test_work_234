<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>{$title}</h1>
    <ul>
    {foreach $categories as $category}
        <li>{$category.name|escape}</li>
    {foreachelse}
        <li>no categories found</li>
    {/foreach}
</ul>
</body>
</html>
