<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Screen Chat with Toggle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #chat-container {
            width: 100%;
            height: 100%;
            max-width: 800px;
            max-height: 800px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }
        #messages {
            overflow-y: scroll;
            flex-grow: 1;
            padding: 10px;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            max-width: 70%;
            word-wrap: break-word;
            display: flex;
            align-items: center;
        }
        .message.right {
            align-self: flex-end;
            background-color: #4caf50;
            color: white;
            margin-left: auto;
            text-align: right;
        }
        .message.left {
            align-self: flex-start;
            background-color: #e0e0e0;
            color: black;
        }
        #input-area {
            display: flex;
            border-top: 1px solid #ccc;
        }
        #input-area input {
            flex-grow: 1;
            padding: 15px;
            border: none;
            border-radius: 0 0 5px 5px;
        }
        #input-area button {
            padding: 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 0 0 5px 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <div id="messages"></div>
        <div id="input-area">
            <input type="text" id="message-input" placeholder="Escribe un mensaje">
            <button onclick="sendMessage()">Enviar</button>
        </div>
    </div>

    <script>
        let isRightSide = true;  // El lado por defecto para los mensajes del usuario

        async function sendMessage() {
            const message = document.getElementById('message-input').value;
            if (!message.trim()) {
                return;
            }

            // Muestra el mensaje del usuario a la derecha
            displayMessage(message, 'right');
            saveMessageToServer(message, 'right');

            // Envía el mensaje al chatbot y muestra su respuesta
            const chatbotResponse = await FetchOpenAIResponse(message);
            displayMessage(chatbotResponse, 'left');
            saveMessageToServer(chatbotResponse, 'left');

            document.getElementById('message-input').value = '';
        }

        async function FetchOpenAIResponse(userPrompt) {
            const apiKey = '';
            const url = 'https://api.openai.com/v1/chat/completions';

            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${apiKey}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    model: 'gpt-4',
                    messages: [
                        { role: 'user', content: `Eres RecipeEase, un asistente de cocina. Aquí está la consulta del usuario: ${userPrompt}` }
                    ]
                })
            });

            if (!response.ok) {
                return "Error al obtener la respuesta del chatbot";
            }

            const data = await response.json();
            return data.choices[0].message.content;
        }

        function displayMessage(message, side) {
            const messagesContainer = document.getElementById("messages");
            const messageElement = document.createElement("div");
            messageElement.className = `message ${side}`;
            messageElement.textContent = message;
            messagesContainer.appendChild(messageElement);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function saveMessageToServer(message, side) {
            fetch('chatbot.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message, side })
            });
        }

        function loadMessages() {
            fetch('chatbot.php')
                .then(response => response.json())
                .then(messages => {
                    messages.forEach(msg => {
                        displayMessage(msg.Mensaje, msg.Lado);
                    });
                });
        }

        document.addEventListener('DOMContentLoaded', loadMessages);
    </script>
</body>
</html>
