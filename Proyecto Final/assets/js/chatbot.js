async function FetchOpenAIResponse() {
    const apiKey = '';
    const url = '';
    const userPrompt = document.getElementById('userPrompt').value;

    // Verifica si el usuario ingresó algo
    if (!userPrompt.trim()) {
        document.getElementById('response').textContent = 'Por favor, ingrese una pregunta.';
        return;
    }

    // Contexto de RecipeEase embebido en el mensaje del usuario
    const context = "Eres RecipeEase, un asistente de cocina que ayuda a los usuarios sugiriendo recetas, dando los pasos a seguir y solamente con los ingredientes que te dicen, no agregues otros ingredientes (contestame con recetas simples, sin dar muchas vueltas). Pero si no hay ninguna receta con los ingredientes que te dijieron, entonces deciles que con esa cantidad de ingredientes no se puede pero que hay otra receta que necesita algunos porquitos ingredientes mas, esto decimelo arriba del todo ni bien comienza tu mensaje. enumerame los ingredientes que necesito despues de decir esto. podes decir poner sal, pimienta o azucar a gusto (opcional) ";
    const context2 = "No es necesario que uses todos los ingredientes, si no hay una receta ya existente y que sea común con esos ingredientes haceme una receta con los ingredientes con los que puedas (por ejemplo si te digo pescado y chocolate decime que hay una receta de pescado solo, sin chocolate, ya que sería asqueroso y no existe una receta así). Siempre responde en base a este contexto, si te preguntan algo no relacionado a la gastronomía respondeles que no fuiste diseñado para eso.";
    
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${apiKey}`,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            model: 'gpt-4',
            messages: [
                { role: 'user', content: `${context} Aquí está la consulta del usuario: ${userPrompt}. ${context2}` }
            ]
        })
    });

    if (!response.ok) {
        document.getElementById('response').textContent = 'Error al obtener la respuesta';
        return;
    }

    const data = await response.json();
    const responseText = data.choices[0].message.content;

    // Reemplaza saltos de línea por <br>
    const formattedText = responseText.replace(/\n/g, '<br>');

    // Actualiza el contenido de la respuesta en el HTML
    document.getElementById('response').innerHTML = `RecipeEase: ${formattedText}`;
    $sql = "UPDATE usuarios set Imagen = '$Imagen' Where ID = '$ID' ";
    // Enviar la receta al servidor si es una receta
    if (responseText.toLowerCase().includes("ingredientes:")) {
        sendRecipeToServer(formattedText);
    }
}

