const express = require('express');
const bodyParser = require('body-parser');
const axios = require('axios');
const path = require('path'); // Módulo para manejar rutas de archivos

const app = express();
const PORT = process.env.PORT || 4000;

// Middleware
app.use(bodyParser.json());

// Middleware para servir archivos estáticos desde la carpeta 'public'
app.use(express.static(path.join(__dirname, 'public')));

// Endpoint para recibir mensajes del frontend
app.post('/message', async (req, res) => {
  try {
    const { message } = req.body;

    if (!message) {
      return res.status(400).json({ error: 'Message is required' });
    }

    // Enviar el mensaje a Wit.ai para procesamiento
    const response = await axios.get('https://api.wit.ai/message', {
      params: {
        q: message,
        v: '20240624' // Puedes cambiar esta versión a la que estés usando en Wit.ai
      },
      headers: {
        Authorization: 'BZROF73FDPN37KCCPOACEXRIMFUMNE2P',
        'Content-Type': 'application/json'
      }
    });

    const { data } = response;
    res.json(data);
  } catch (error) {
    console.error('Error:', error.response ? error.response.data : error.message);
    res.status(error.response ? error.response.status : 500).json({ error: 'Something went wrong' });
  }
});

// Middleware para manejar rutas no encontradas
app.use((req, res) => {
  res.status(404).json({ error: 'Route not found' });
});

// Iniciar el servidor
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
