<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости категории</title>
</head>
<body style="background-color: #c8c8c8;">
    <head>
        <div style="background-color: #f0f0f0; margin: 20px auto; padding: 20px 30px; width: 90%; border: 1px solid #c8c8c8; display: flex; justify-content: space-around;">
            <div style="display: flex;">
                <div style="width: 300px; text-align: center;"><a href="/">Главная</a></div>
                <div style="width: 300px; text-align: center;"><a href="/category">Категории</a></div>
                <div style="width: 300px; text-align: center;">Вход</div>
            </div>
        </div>
    </head>
    <main style="background-color: #f0f0f0; margin: 20px auto; padding: 15px 30px; width: 90%; min-height: 400px; border: 1px solid #c8c8c8;">

    <h1>Новости категории</h1>

    <?php foreach ($newsList as $news): ?>
        <div style="border: 1px solid #c8c8c8; padding: 20px; margin-bottom: 15px;">
            <h2 style="margin: 5px 0;"><?=$news['title']?></h2>
            <div style="font-size: smaller;">Дата публикации: <?=$news['date']?></div>
            <div style="font-size: smaller;">Автор: <?=$news['author']?></div>
            <div style="margin-top: 15px;"><?=$news['description']?></div>
            <div style="margin-top: 5px;"><a href="<?=route('news.item', ['id' => $news['id']])?>">Читать далее...</a></div>
        </div>
    <?php endforeach; ?>

    </main>

    <footer>
    <div style="background-color: #f0f0f0; margin: 20px auto; padding: 15px 30px; width: 90%; border: 1px solid #c8c8c8; display: flex; justify-content: space-around;">
            <div style="display: flex;">
                <div style="width: 100%; text-align: center;">Copyright, 2022</div>
            </div>
        </div>
    </footer>
</body>
</html>