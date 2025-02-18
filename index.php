<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot PHP</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        #chat { max-width: 400px; margin: auto; padding: 10px; border: 1px solid #ddd; }
        #messages { height: 200px; overflow-y: auto; border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 10px; }
        input { width: 80%; padding: 5px; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>

    <h2>Chatbot em PHP</h2>
    <div id="chat">
        <div id="messages"></div>
        <input type="text" id="userInput" placeholder="Digite sua mensagem...">
        <button onclick="sendMessage()">Enviar</button>
    </div>

    <script>
        function sendMessage() {
            let input = document.getElementById("userInput");
            let message = input.value.trim();
            if (message === "") return;

            let messagesDiv = document.getElementById("messages");
            messagesDiv.innerHTML += `<p><strong>Você:</strong> ${message}</p>`;

            fetch("chatbot.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ message })
            })
            .then(response => response.json())
            .then(data => {
                messagesDiv.innerHTML += `<p><strong>Bot:</strong> ${data.response}</p>`;
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            });

            input.value = "";
        }
    </script>

</body>
</html>
                