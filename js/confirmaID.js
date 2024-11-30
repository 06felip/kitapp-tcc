let salaId; // Variável global para armazenar o ID da sala

// Função para abrir o modal de confirmação e capturar o ID da sala
function confirmarEntrada(element) {
    salaId = element.getAttribute("data-id"); // Captura o data-id do elemento clicado
    document.getElementById("confirmModal").style.display = "block";
}

function fecharModal() {
    document.getElementById("confirmModal").style.display = "none";
}

function entrarSala() {
    // Redireciona para o PHP com o ID da sala
    window.location.href = "../pages/funcoes/insertUserSala.php?cd_sala=" + salaId;
}
