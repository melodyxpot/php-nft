<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE_PATH ?>/css/global.css" rel="stylesheet" />
    <link href="<?= BASE_PATH ?>/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>NFTS</title>
</head>
<body>

<header>
    <div class="wrap items-flex align-center just-space-between w95 center">
        <div class="col w15 logo">
            <h1><a>Raissa<span style="color:var(--purple-weak);">Coin</span></a></h1>
        </div>
        <nav class="w60 menu">
            <ul class="col items-flex align-center">
                <li><a href="/home">Home</a></li>
                <li><a href="/market">Market</a></li>
                <li><a href="/global-nfts">Global NFTs</a></li>
                <li><a href="/wallet">Wallet</a></li>
                <li><a href="/become-vendor?type=vendor">Become Vendor</a></li>
            </ul>
        </nav>
        <nav class="col w25 items-flex align-center just-end">
            <a href="/wallet" class="button button-form button-clean button-default mr-right-small">Create Wallet</a>
            <a href="<?= $params['isUser']['Link'] ?>" class="button button-default"><?= $params['isUser']['Text'] ?></a>
        </nav>
    </div>
</header>
