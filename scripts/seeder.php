<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;
use App\Config\Config;
use Carbon\Carbon;

$config = Config::db();

$pdo    = Database::connect(
    $config['host'],
    $config['port'],
    $config['name'],
    $config['user'],
    $config['password']
);

$categories = [
    ['Технология', 'samsung iphone android'],
    ['Еда', 'пицца картоп бургер'],
    ['Авто', 'китайский автопром и корейский, японский'],
    ['Отдых', 'путишествие заграниций или отдызать везде'],
];


$insertCat = $pdo->prepare('INSERT INTO categories (name, description) VALUES (:name, :description)');
$categoryIds = [];
foreach ($categories as [$name, $description]) {
    $insertCat->execute(['name' => $name, 'description' => $description]);
    $categoryIds[] = (int) $pdo->lastInsertId();
}
echo 'добавлен ' . count($categoryIds);


$images = [
    'https://i.ytimg.com/vi/9q3Uf0vfRSw/maxresdefault.jpg',
    'https://i.pinimg.com/originals/75/5c/8a/755c8a06c54f0d9b62655f7c6d7c3afc.jpg?nii=t',
    'https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/50_Shades_Of_Blue_%28187611681%29.jpeg/1280px-50_Shades_Of_Blue_%28187611681%29.jpeg',
    'https://www.onetwotrip.com/ru/blog/wp-content/uploads/2024/03/9-13.jpg',
    'https://i.pinimg.com/474x/0e/4f/6c/0e4f6ca35bc89794e096bdf3ef03133d.jpg?nii=t',
];

$lead = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit.';

$body = 
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quo sunt tempora dolor 
    laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae illo.
    Aliquid dicta beatae quia porro id est. Quisquam, voluptatum. Necessitatibus,
    voluptate? Quod, quae illo. Sequi, repudiandae fugiat quibusdam voluptas aperiam.
    Architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia
    voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.";


$article = $pdo->prepare(
    'INSERT INTO articles (title, description, body, image, views, published_at)
     VALUES (:title, :description, :body, :image, :views, :published_at)'
);
$articeCat = $pdo->prepare(
    'INSERT IGNORE INTO article_category (article_id, category_id) VALUES (:aid, :cid)'
);

$articleCount = 30;
for ($i = 1; $i <= $articleCount; $i++) {
    $daysAgo      = $articleCount - $i;
    $publishedAt  = Carbon::now()->subDays($daysAgo)->format('Y-m-d H:i:s');

    $article->execute([
        'title'        => "Lorem ipsum dolor sit amet #{$i}",
        'description'  => $lead,
        'body'         => $body,
        'image'        => $images[random_int(0, 4)],
        'views'        => random_int(0, 500),
        'published_at' => $publishedAt,
    ]);
    $articleId = (int) $pdo->lastInsertId();

    $pick = $categoryIds;
    shuffle($pick);
    foreach (array_slice($pick, 0, random_int(1, 2)) as $cid) {
        $articeCat->execute(['aid' => $articleId, 'cid' => $cid]);
    }
}
