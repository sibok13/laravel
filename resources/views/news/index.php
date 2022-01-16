<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
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
    <h1 style="margin: 5px 0;">Категории</h1>

    <div style="display: flex; flex-wrap: wrap; margin-top: 30px;">
        <?php foreach ($categoryList as $item): ?>
            <div style="width: 45%; margin: 0 auto; border: 1px solid #c8c8c8; padding: 20px; margin-bottom: 15px;">
                <a href="<?=route('category.news', ['category' => $item['category']])?>"><h2 style="margin: 5px 0;"><?=$item['title']?></h2></a>
                <div style="margin-top: 15px;"><?=$item['description']?></div>
            </div>
        <?php endforeach; ?>
    </div>
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