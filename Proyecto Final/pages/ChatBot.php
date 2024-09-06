<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Estil.css">
    <title>RecipeEase Chatbot</title>
    <style>
        .chat-input {
            display: flex;
            align-items: center;
        }
        .response-container {
            flex: 1; /* Takes up the remaining space */
            height: 50px; /* Adjust height as needed */
            overflow: hidden;
            background-color: #e9ecef; /* Light background color */
            border-radius: 20px;
            padding: 10px;
            box-sizing: border-box; /* Ensures padding is included in the height */
            margin-right: 10px; /* Space between container and button */
            display: flex;
            align-items: center;
            justify-content: center; /* Center the text */
        }
        .response-text {
            font-size: 16px; /* Adjust font size as needed */
            color: #333; /* Dark text color for contrast */
            text-align: center; /* Center text horizontally */
        }
        .btn {
            border-radius: 20px;
            width: 100px;
        }
    </style>
</head>
<body class="">
    <?php 
    if(isset($_SESSION["Registrado"])){   
        include "../includes/header-ingresado.php";
    } else {
        include "../includes/header.php";
    }
    ?>

    <div class="container-fluid vh-100 d-flex flex-column justify-content-between p-0">
        <div class="row w-100 h-100">
            <div class="col-12 col-md-8 col-lg-6 mx-auto p-0 d-flex flex-column">

                <div class="chat-header bg-dark text-white p-3">
                    <h4 class="m-0">RecipeEase Chatbot</h4>
                </div>

                <div id="chat-messages" class="flex-grow-1 p-3" style="background-color: #f4f4f4; overflow-y: auto;">
                    <!-- Messages will appear here -->
                    <div id="response-text" class="response-text">
                        <p id="response">Aquí se mostrará la respuesta del chatbot.</p>
                    </div>
                </div>

                <div class="chat-input p-3 bg-light">
                    <div class="response-container">
                        <!-- This div can be used for additional features or styling -->
                    </div>
                    <input type="text" name="message" id="userPrompt" class="form-control me-3" placeholder="Escribe tu mensaje aquí..." required>
                    <button onclick="fetchOpenAIResponse()" type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchOpenAIResponse() {
            // Simulate fetching response (replace this with actual API call)
            var responseText = "Esta es una respuesta simulada del chatbot."; // Replace this with actual response from the API
            
            // Update the response text in the HTML
            document.getElementById('response').innerText = responseText;
        }
    </script>
    <script defer src="../assets/js/Cod.js"></script>
    <script defer src="../assets/js/chatbo.js"></script>
    <script defer src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
