async function FetchOpenAIResponse() {
    const url = 'https://api.openai.com/v1/chat/completions';
    const userPrompt = document.getElementById('userPrompt').value.trim();

    // Verificar si el usuario ingresó algo
    if (!userPrompt) {
        document.getElementById('response').textContent = 'Por favor, ingrese una pregunta.';
        return;
    }

    document.getElementById('userPrompt').value = '';  // Limpiar el campo de entrada
    const context = `
        Eres RecipeEase, un asistente de cocina especializado en sugerir recetas simples basadas únicamente en los ingredientes proporcionados. No agregues ingredientes adicionales, solo usa los proporcionados. 
        Si no puedes sugerir una receta con los ingredientes dados, indica que falta algún ingrediente adicional para hacer una receta viable. Podes decir sal o azucar a gusto.
        Al inicio de cada respuesta, solo devuélveme el título de la receta en una línea. Luego, sigue con los ingredientes bajo el encabezado "Ingredientes:" y las instrucciones bajo el encabezado "Instrucciones:". 
        Evita el uso de lenguaje innecesario.
    `;
    const context2 = `
        Si los ingredientes dados no combinan para una receta común, puedes ajustar o simplificar, pero deja claro que estás eliminando ingredientes que no encajan. Si te hacen una pregunta no relacionada con cocina, di que no fuiste diseñado para eso.
    `;

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${apiKey}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                model: 'gpt-4',
                messages: [{ role: 'user', content: `${context} Aquí está la consulta del usuario: ${userPrompt}. ${context2}` }]
            })
        });

        if (!response.ok) throw new Error('Error al obtener la respuesta');

        const data = await response.json();
        const responseText = data.choices[0].message.content;

        // Desglosar y mostrar la respuesta
        const sections = parseRecipeResponse(responseText);
        document.getElementById('title').innerHTML = `<h2>${sections.title}</h2>`;

        // Mostrar solo si hay ingredientes
        document.getElementById('ingredients').innerHTML = sections.ingredients ? `
            <h3>Ingredientes</h3><ul>${sections.ingredients}</ul>` : '';

        // Mostrar solo si hay instrucciones (y evitar mostrar 'Instrucciones no proporcionadas')
        document.getElementById('instructions').innerHTML = sections.instructions && sections.instructions !== 'Instrucciones no proporcionadas.' ? `
            <h3>Instrucciones</h3><ol>${sections.instructions}</ol>` : '';

            sendTitleToDatabase(sections.title, sections.ingredients, sections.instructions);  // Enviar el título a la base de datos
    } catch (error) {
        document.getElementById('title').textContent = error.message;
    }
}

// Función para desglosar la respuesta
function parseRecipeResponse(responseText) {
    const cleanedResponse = responseText.replace(/•/g, '').replace(/\d+\.\s*/g, '').trim();
    const title = cleanedResponse.split("\n")[0].trim();
    const ingredients = cleanedResponse.match(/Ingredientes:(.*?)(?=Instrucciones|$)/s)?.[1]?.trim().split('\n').map(i => `<li>${i}</li>`).join('') || '';
    const instructions = cleanedResponse.match(/Instrucciones:(.*)/s)?.[1]?.trim().split('\n').map(i => `<li>${i}</li>`).join('') || '';
    
    return { title, ingredients, instructions };
}

// Función para enviar el título a la base de datos
function sendTitleToDatabase(title, ingredients, instructions) {
    fetch('../base_de_datos/SaveRecipeTitle.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `title=${encodeURIComponent(title)}&ingredients=${encodeURIComponent(ingredients)}&instructions=${encodeURIComponent(instructions)}`
    })
    .then(response => response.text())
    .then(data => console.log("Respuesta del servidor:", data))
    .catch(error => console.error("Error al enviar los datos:", error));
}