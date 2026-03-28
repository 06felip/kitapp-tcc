// Função para alternar a visibilidade do menu
function toggleMenu() {
    const func = document.querySelector('.func');
    const logo = document.querySelector('.logo');
    const burger = document.querySelector('.burger');
    const closeBtn = document.querySelector('.close-btn');

    // Alterna a visibilidade dos links, logo e hambúrguer
    func.classList.toggle('active'); // Exibe/oculta os links de navegação
    logo.classList.toggle('hidden'); // Esconde/mostra a logo
    burger.classList.toggle('hidden'); // Esconde/mostra o ícone do hambúrguer
    closeBtn.classList.toggle('hidden'); // Exibe/oculta o botão "fechar"
}

// Função para fechar o menu e voltar ao layout normal
function closeMenu() {
    const func = document.querySelector('.func');
    const logo = document.querySelector('.logo');
    const burger = document.querySelector('.burger');
    const closeBtn = document.querySelector('.close-btn');

    // Remove a classe "active" dos links de navegação
    func.classList.remove('active');
    logo.classList.remove('hidden');
    burger.classList.remove('hidden');
    closeBtn.classList.add('hidden');
}


