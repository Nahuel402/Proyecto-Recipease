async function fetchOpenAIResponse() {
    const apiKey = 'sk-AUHn3OcdPOo2iLOPiLise0h76b1effcAQItS4n-X4KT3BlbkFJcwnxkfwTv16Qic81TpXkHlm-gbg2YCQyeuwWEIOZoA';
    const url = 'https://api.openai.com/v1/chat/completions';
    const userPrompt = document.getElementById('userPrompt').value;
    //esto verifica si el usuario ingreso algo, si el usuario agrego algo .trim es false y no entra al if
    if (!userPrompt.trim()) {
        document.getElementById('response').textContent = 'Por favor, ingrese una pregunta.';
        return;
    }
    //Respuesta del boton codigo a analizar
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${apiKey}`,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            model: 'gpt-4',
            messages: [
                { role: 'user', content: userPrompt }
            ]
        })
    });

    if (!response.ok) {
        document.getElementById('response').textContent = 'Error al obtener la respuesta';
        return;
    }

    const data = await response.json();
    const responseText = data.choices[0].message.content;
    document.getElementById('response').textContent = `Respuesta: ${responseText}`;
}