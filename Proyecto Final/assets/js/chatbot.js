let currentPrompt = ''; 
let recipeHistory = [];  

document.getElementById("userPrompt").addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        FetchOpenAIResponse();
    }
});


async function FetchOpenAIResponse() {
    const apiKey = '';
    const url = 'https://api.openai.com/v1/chat/completions';
    var userPrompt = document.getElementById('userPrompt').value.trim();

    document.getElementById('loading').style.display = 'block';
    document.getElementById('title').innerHTML = " ";
    document.getElementById('ingredients').innerHTML = " ";
    document.getElementById('instructions').innerHTML = " ";
    document.getElementById('optional-ingredients').innerHTML = ""; 

    if (!userPrompt) {
        document.getElementById('userPrompt').textContent = 'Por favor, ingrese una pregunta.';
        return;
    }

    currentPrompt = userPrompt;
    document.getElementById('userPrompt').value = '';  
    const context = `Eres RecipeEase, un asistente inteligente diseñado exclusivamente para ayudar a los usuarios a cocinar. Tu objetivo es proporcionar recetas basadas únicamente en los ingredientes proporcionados. También sugieres ingredientes opcionales para mejorar o cambiar la receta, pero estos no influyen hasta que el usuario los seleccione.

                    Reglas estrictas:
                    Temática: Responde solo preguntas sobre cocina, ingredientes, recetas, utensilios, técnicas culinarias, o cualquier cosa relacionada con la gastronomía.
                    
                    Generación de recetas: Si un usuario te proporciona una lista de ingredientes, siempre generas una receta que pueda ser hecha con ellos. Si los ingredientes no son suficientes para una receta común, sugieres ingredientes adicionales que puedan mejorar la receta o hacerla viable.
                    
                    Formato de respuesta:
                    
                    Devuélveme el título de la receta en una línea.
                    Luego, sigue con los ingredientes bajo el encabezado "Ingredientes:".
                    Incluye el procedimiento bajo el encabezado "Instrucciones:".
                    Si hay ingredientes opcionales, devuélvelos bajo el encabezado "Ingredientes opcionales:" sin incluirlos en la receta.
                    Si se agregan nuevos ingredientes, genera una nueva receta.
                    Si el usuario te proporciona la misma lista de ingredientes que la ultima vez, generá una receta distinta a la ultima receta manteniendo los ingredientes que te haya enviado el usuario
                    Que si bien esten enumerado los puntos si hay un espacio vacio que este no cuente como un punto.
                    Preguntas irrelevantes: Si el usuario te hace una pregunta que no tiene nada que ver con la cocina o la gastronomía, simplemente responde:
                    
                    "RecipeEase solo está diseñado para ayudarte con temas relacionados con la cocina y las recetas. ¿En qué te gustaría cocinar hoy?"
                    
                    Tono: Mantén siempre un tono amigable, motivador y profesional. Tu objetivo es animar al usuario a explorar nuevas recetas y aprender más sobre cocina.
                    
                    Claridad: Mantén las respuestas lo más claras y concisas posibles, sin entrar en detalles innecesarios.
                    
                    Ejemplo de una buena interacción:
                    Usuario: "Tengo pollo, papas y cebolla, ¿qué puedo cocinar?"
                    RecipeEase:
                    
                    "Pollo al horno con papas"
                    Ingredientes:
                    
                    1 pechuga de pollo
                    4 papas medianas
                    1 cebolla
                    Instrucciones:
                    
                    Precalienta el horno a 180°C.
                    Coloca el pollo y las papas en una bandeja.
                    Hornea durante 45 minutos.
                    Ingredientes opcionales:
                    
                    [Agregar Sal]
                    [Agregar Pimienta]
                    Ejemplo de una mala interacción:
                    Usuario: "¿Quién ganó el último partido de fútbol?"
                    RecipeEase:
                    
                    "RecipeEase está diseñado para ayudarte exclusivamente en temas relacionados con la cocina. ¿Qué te gustaría cocinar hoy?"

                    Aquí está la consulta del usuario: ${userPrompt}`;

                    try {
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'Authorization': `Bearer ${apiKey}`,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                model: 'gpt-4',
                                messages: [{ role: 'user', content: context }]
                            })
                        });
                
                        document.getElementById('loading').style.display = 'none';
                
                        if (!response.ok) throw new Error('Error al obtener la respuesta');
                
                        const data = await response.json();
                        const responseText = data.choices[0].message.content;
                
                        const sections = parseRecipeResponse(responseText);
                        document.getElementById('title').innerHTML = `<h2>${sections.title}</h2>`;
                        document.getElementById('ingredients').innerHTML = sections.ingredients ? `<h3>Ingredientes</h3><ul>${sections.ingredients}</ul>` : '';
                        document.getElementById('instructions').innerHTML = sections.instructions ? `<h3>Instrucciones</h3><ol>${sections.instructions}</ol>` : '';
                        document.getElementById('optional-ingredients').innerHTML = sections.optionalIngredients ? `<h3>Instrucciones</h3><ol>${sections.optionalIngredients}</ol>` : '';
                
                        recipeHistory.push({
                            title: sections.title,
                            ingredients: sections.ingredients,
                            instructions: sections.instructions
                        });
                
                        await sendTitleToDatabase(sections.title, sections.ingredients, sections.instructions);
                
                        if (sections.optionalIngredients && sections.optionalIngredients.length > 0) {
                            const optionalSection = sections.optionalIngredients.map(ingredient => {
                                return `<li>${ingredient} <a href="#" onclick="addOptionalIngredient('${ingredient}')">[Agregar]</a></li>`;
                            }).join('');
                            document.getElementById('optional-ingredients').innerHTML = `<h3>Ingredientes opcionales</h3><ul>${optionalSection}</ul>`;
                        }
                    } catch (error) {
                        document.getElementById('title').textContent = error.message;
                    }
                }
function parseRecipeResponse(responseText) {
    const cleanedResponse = responseText.replace(/•/g, '').replace(/\d+\.\s*/g, '').trim();
    const title = cleanedResponse.split("\n")[0].trim();
    const ingredients = cleanedResponse.match(/Ingredientes:(.*?)(?=Instrucciones|$)/s)?.[1]?.trim().split('\n').map(i => `<li>${i}</li>`).join('') || '';
    const instructions = cleanedResponse.match(/Instrucciones:(.*)/s)?.[1]?.trim().split('\n').map(i => `<li>${i}</li>`).join('') || '';
    const optionalIngredients = cleanedResponse.match(/Ingredientes opcionales:(.*?)(?=Instrucciones|$)/s)?.[1]?.trim().split('\n') || [];

    return { title, ingredients, instructions, optionalIngredients };
}

function addOptionalIngredient(ingredient) {
    const newPrompt = `${currentPrompt}, ${ingredient}`;
    document.getElementById('userPrompt').value = newPrompt;
    FetchOpenAIResponse();
}

function showPreviousRecipe(index) {
    const recipe = recipeHistory[index];
    document.getElementById('title').innerHTML = `<h2>${recipe.title}</h2>`;
    document.getElementById('ingredients').innerHTML = `<h3>Ingredientes</h3><ul>${recipe.ingredients}</ul>`;
    document.getElementById('instructions').innerHTML = `<h3>Instrucciones</h3><ol>${recipe.instructions}</ol>`;
}

async function sendTitleToDatabase(title, ingredients, instructions) {
    try {
        const response = await fetch('../base_de_datos/SaveRecipe.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `title=${encodeURIComponent(title)}&ingredients=${encodeURIComponent(ingredients)}&instructions=${encodeURIComponent(instructions)}`
        });

        if (!response.ok) throw new Error('Error al guardar la receta en la base de datos');

        const data = await response.text();
        console.log("Respuesta del servidor:", data);
    } catch (error) {
        console.error("Error al enviar los datos:", error);
    }
}
