async function fetchOpenAIResponse() {
    const apiKey = 'sk-AUHn3OcdPOo2iLOPiLise0h76b1effcAQItS4n-X4KT3BlbkFJcwnxkfwTv16Qic81TpXkHlm-gbg2YCQyeuwWEIOZoA';
    const url = 'https://api.openai.com/v1/chat/completions';
    const userPrompt = document.getElementById('userPrompt').value;

    // Verifica si el usuario ingresó algo
    if (!userPrompt.trim()) {
        document.getElementById('response').textContent = 'Por favor, ingrese una pregunta.';
        return;
    }

    // Contexto de RecipeEase embebido en el mensaje del usuario
    const context = "Eres RecipeEase, un asistente de cocina que ayuda a los usuarios sugiriendo receta y solamente con recetas con pasos a seguir e ingredientes (contestame con recetas simples, sin dar muchas vueltas) basadas en los ingredientes que tienen disponibles. ";
    const context2 = "No es necesario que uses todos los ingredientes, si no hay una receta ya existente y comun con esos ingredientes decime que solo con esos es imposible y haceme una receta con los posibles ingredientes (por ejemplo si te digo pescado y chocolate decime que hay una receta de pescado solo, sin chocolate, ya que seria asqueroso y no existe una receta asi). Siempre responde en base a este contexto, si te preguntan algo no relacionado a la gastronomia respondeles que no fuiste diseñado para eso."
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
    document.getElementById('response').textContent = `RecipeEase: ${responseText}`;
}
