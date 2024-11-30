
const salaId = new URLSearchParams(window.location.search).get("cd_sala");

const chat = document.querySelector(".chat");
const chatForm = chat.querySelector(".chat__form");
const chatInput = chat.querySelector(".chat__input");
const chatMessages = chat.querySelector(".chat__messages");

const colors = ["cadetblue", "darkgoldenrod", "cornflowerblue", "darkkhaki", "hotpink", "gold"];

const getRandomColor = () => {
    const randomIndex = Math.floor(Math.random() * colors.length);
    return colors[randomIndex];
};  

const user = { id: "", name: "", color: "" };

let websocket;

// Função para buscar os dados do usuário autenticado
const fetchUserData = async () => {
    try {
        const response = await fetch("./funcoes/funcaoVerificaChat.php", {
            method: "GET",
            credentials: "include" 
        });

        if (response.ok) {
            const data = await response.json();

            // Preencher as informações do usuário
            user.id = data.cd_usuario;
            user.name = data.log_usuario;
            user.color = getRandomColor();

            chat.style.display = "flex";

            // Conectar ao WebSocket da sala específica
            websocket = new WebSocket(`ws://localhost:3001?room=${salaId}`);
            websocket.onmessage = processMessage;
        } else {
            console.error("Erro: Usuário não autenticado");
        }
    } catch (error) {
        console.error("Erro ao buscar dados do usuário:", error);
    }
};

 const scrollToBottom = () => {
     chatMessages.scrollBottom = chatMessages.scrollHeight;
 };

// Função para exibir mensagem
const processMessage = ({ data }) => {
    const { userId, userName, userColor, content } = JSON.parse(data);
    displayMessage(userId, userName, userColor, content);
};

const displayMessage = (userId, userName, userColor, content) => {
    const message = userId === user.id
        ? createMessageSelfElement(content)
        : createMessageOtherElement(content, userName, userColor);

    chatMessages.appendChild(message);

    scrollToBottom();
};

 const createMessageSelfElement = (content) => {
     const div = document.createElement("div");
     div.classList.add("message--self");
     div.innerHTML = content;
     return div;
 };

 const createMessageOtherElement = (content, sender, senderColor) => {
     const div = document.createElement("div");
     const span = document.createElement("span");

     div.classList.add("message--other");
     span.classList.add("message--sender");
     span.style.color = senderColor;

     span.innerHTML = sender;
     div.appendChild(span);
     div.innerHTML += content;

     return div;
 };

// Função para enviar uma mensagem
const sendMessage = (event) => {
    event.preventDefault();

    const message = {
        userId: user.id,
        userName: user.name,
        userColor: user.color,
        content: chatInput.value,
    };

    websocket.send(JSON.stringify(message));
    chatInput.value = "";

    
};

// Inicializa o chat
window.onload = fetchUserData;
chatForm.addEventListener("submit", sendMessage);
