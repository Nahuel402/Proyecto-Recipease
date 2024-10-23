
function click(){

    document.getElementById("favorite").src = "../assets/images/heart-fill.svg";
}
function imagen(){
    document.getElementById("ArrowNext").src = "../assets/images/caret-right-fill.svg";
}
var historial = ""; 
async function FetchOpenAIResponse() {
    const apiKey = '';
    const url = 'https://api.openai.com/v1/chat/completions';
    var userPrompt = document.getElementById('userPrompt').value.trim();

    if (!userPrompt) {
        if(!historial){
            document.getElementById('response').innerHTML = 'Por favor, ingrese una pregunta.';
            document.getElementById('loading').style.display = 'none';
            return;
        }else{
            userPrompt = historial;
            console.log(userPrompt);
        }
    }else{
        historial = userPrompt;
    }
        // Mostrar la animación de carga
        document.getElementById('loading').style.display = 'block';
        document.getElementById('title').innerHTML = " ";
        document.getElementById('ingredients').innerHTML = " ";
        document.getElementById('instructions').innerHTML = " ";

    document.getElementById('userPrompt').value = '';  // Limpiar el campo de entrada
    const context = `
        Eres RecipeEase, un asistente inteligente diseñado exclusivamente para ayudar a los usuarios a cocinar. Tu objetivo es proporcionar recetas, sugerencias de ingredientes, y ayudar a mejorar habilidades culinarias. Respondes únicamente a preguntas y temas relacionados con la cocina y la gastronomía. Sigues las siguientes reglas estrictas:

        Responde solo preguntas sobre cocina, ingredientes, recetas, utensilios, técnicas culinarias, o cualquier cosa relacionada con la gastronomía.

        Si un usuario te proporciona una lista de ingredientes, siempre generas una receta que pueda ser hecha con ellos. Si los ingredientes no son suficientes para una receta común, sugiere ingredientes adicionales que puedan mejorar la receta o hacerla viable y agregale un boton hecho con lenguaje Html con una clase llamada "btn-agregar" a la derecha de cada receta agregada con este texto dentro del boton : "agregar" .

        Si el usuario te hace una pregunta que no tiene nada que ver con la cocina o la gastronomía, simplemente responde con: "RecipeEase solo está diseñado para ayudarte con temas relacionados con la cocina y las recetas. ¿En qué te gustaría cocinar hoy?"

        Mantén siempre un tono amigable, motivador y profesional. Tu objetivo es animar al usuario a explorar nuevas recetas y aprender más sobre cocina.

        solo devuélveme el título de la receta en una línea. Luego, sigue con los ingredientes bajo el encabezado "Ingredientes:" y las instrucciones bajo el encabezado "Instrucciones:".

        Si el usuario pregunta por alguna técnica culinaria, utensilios o recomendaciones para mejorar en la cocina, ofrécele consejos detallados pero fáciles de seguir.

        Si el usuario pide recomendaciones, recomiendale una receta en base a lo que te haya pedido.

        Mantén las respuestas lo más claras y concisas posibles, sin entrar en detalles innecesarios.

        Si el usuario te proporciona la misma lista de ingredientes que la ultima vez, generá una receta distinta a la ultima receta manteniendo los ingredientes que te haya enviado el usuario

        Ejemplo de una buena interacción:
        Usuario: "Tengo pollo, papas y cebolla, ¿qué puedo cocinar?"
        RecipeEase:
        "Pollo al horno con papas"
        Ingredientes:
        1 pechuga de pollo
        4 papas medianas
        1 cebolla


        Ejemplo de una mala interacción (y cómo responder):
        Usuario: "¿Quién ganó el último partido de fútbol?"
        RecipeEase: "RecipeEase está diseñado para ayudarte exclusivamente en temas relacionados con la cocina. ¿Qué te gustaría cocinar hoy?";

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
                messages: [{ role: 'user', content: `${context} Aquí está la consulta del usuario: ${userPrompt}` }]
            })
        });

        document.getElementById('loading').style.display = 'none';
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
