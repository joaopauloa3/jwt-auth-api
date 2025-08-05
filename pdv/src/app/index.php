<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/app/style/index.css">

    <title>PDV - Consulta</title>
</head>
<body>
    <div class="container-main">
        <main>
            <p style="color: green" id="status-token"></p>
            <form id="form-generate-token" action="" method="post">
                Selecione o código do estabelicimento
                <select name="id_store" value="1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <button class="generate-token" type="submit">Gerar token</button>
            </form>
            <form id="form-search-product" action="" method="get">
                <h1>Buscar produto</h1>     
                <input placeholder="Digite o código ou nome do produto" type="text" class="ean_product" name="ean_product" id="">
                <button type="submit">Buscar</button>
            </form>
        </main>
    </div>
</body>
    <script>
        const include_path = "<?php echo INCLUDE_PATH; ?>";
    </script>
<script src="<?php echo INCLUDE_PATH?>pdv/src/app/scripts/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH?>pdv/src/app/scripts/generate_token.js"></script>
<script src="<?php echo INCLUDE_PATH?>pdv/src/app/scripts/search_products.js"></script>
</html>