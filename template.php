<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/sass/style.css">
    <title>Document</title>
</head>
<body>
<header><?php require_once"pages/header.php";?></header>
<sectionr><?php require_once "methode/dpo.php"?></sectionr>
<section><?php require_once"pages/carte.php";?></section>
<?=$content?>
<footer><?php require_once"pages/footer.php";?></footer>
</body>
</html>