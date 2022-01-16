<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новость</title>
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

    <h1 style="margin: 5px 0;"><?=$news['title']?></h1>
    <div style="font-size: smaller;">Дата публикации: <?=$news['date']?></div>
    <div style="font-size: smaller;">Автор: <?=$news['author']?></div>
    <div style="margin-top: 15px;"><?=$news['description']?></div>
    <div style="margin-top: 10px;"><a href="<?=route('category.index')?>">Обратно к списку новостей</a></div>
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