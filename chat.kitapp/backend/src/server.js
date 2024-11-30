

const { WebSocketServer } = require("ws");
const dotenv = require("dotenv");

dotenv.config();

const wss = new WebSocketServer({ port: process.env.PORT || 8080 });

// Armazena salas e seus clientes
const salas = {};

wss.on("connection", (ws, req) => {
    const urlParams = new URLSearchParams(req.url.split('?')[1]);
    const salaId = urlParams.get("room");

    // Cria uma nova sala caso não exista
    if (!salas[salaId]) {
        salas[salaId] = [];
    }

    // Adiciona o cliente na sala
    salas[salaId].push(ws);

    ws.on("error", console.error);

    // Ao receber uma mensagem, envia para todos os clientes da mesma sala
    ws.on("message", (data) => {
        const message = JSON.parse(data);

        if (salas[salaId]) {
            salas[salaId].forEach((client) => {
                if (client.readyState === client.OPEN) {
                    client.send(JSON.stringify(message));
                }
            });
        }
    });

  

    console.log(`Cliente conectado na sala ${salaId}`);
});
