<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 50px;
        }
        .qr-container {
            border: 2px solid #000;
            padding: 20px;
            margin-bottom: 20px;
        }
        .instructions {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 20px;
        }
        /* Tamanho fixo para a imagem do QR Code */
        img {
            width: 150px;  /* Tamanho fixo de largura */
            height: 150px; /* Tamanho fixo de altura */
            object-fit: contain; /* Garante que a imagem seja redimensionada proporcionalmente */
        }
    </style>
    <script>
        function copyPixKey() {
            var pixKey = "sua chave piquix";
            navigator.clipboard.writeText(pixKey).then(function() {
                alert('Chave copiada com sucesso!');
            }, function() {
                alert('Falha ao copiar a chave.');
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Escaneie o QR Code para finalizar o pagamento</h2>
        <div class="qr-container">
            <img src="/imagem/qr-code.jpg" alt="QR Code Pix">
        </div>
        <p><strong>Valor Total: R$ 99,99</strong></p>
        <p><strong>Chave:</strong></p>
        <p>311f1816-c758-4bb4-986d-d5b59bc3101a</p>
        <button onclick="copyPixKey()">Copiar Chave</button>
        <div class="instructions">
            <h3>Instruções para pagamento</h3>
            <p>1. Abra o aplicativo do seu banco.</p>
            <p>2. Procure pela opção de pagamento via Pix.</p>
            <p>3. Escolha a opção "Ler QR Code" e escaneie o código acima.</p>
            <p>4. Confirme os dados e finalize o pagamento.</p>
            <p>5. Caso prefira, copie a chave Pix e cole na opção de pagamento Pix do seu banco.</p>
        </div>
    </div>
</body>
</html>
