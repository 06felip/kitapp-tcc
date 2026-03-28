document.addEventListener("DOMContentLoaded", function () {
    const modalCad = document.querySelector(".modal-cadastro");
    const modalLogin = document.querySelector(".modalLogin");
    const fade = document.querySelector(".fade");

    const openModalBtns = [
        document.getElementById("openModalBtn"),
        document.getElementById("openModalBtnLink"),
        document.getElementById("openModalCad"),
    ];
    const openModalLogin = document.getElementById("openModalLogin");
    const closeModalBtns = document.querySelectorAll(".close-modal");

    function openModal(modal) {
        fade.style.display = "block";
        modal.style.display = "block";

        setTimeout(() => {
            fade.classList.add("show");
            modal.classList.add("show");
        }, 10);
    }

    function closeModal(modal) {
        modal.classList.remove("show");
        fade.classList.remove("show");

        setTimeout(() => {
            modal.style.display = "none";
            if (!modalCad.classList.contains("show") && !modalLogin.classList.contains("show")) {
                fade.style.display = "none";
            }
        }, 300); // Tempo de transição
    }

    // Abre o modal de cadastro
    openModalBtns.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            closeModal(modalLogin); // Fecha o modal de login se estiver aberto
            openModal(modalCad); // Abre o modal de cadastro
        });
    });

    // Abre o modal de login
    openModalLogin.addEventListener("click", function (event) {
        event.preventDefault();
        closeModal(modalCad); // Fecha o modal de cadastro se estiver aberto
        openModal(modalLogin); // Abre o modal de login
    });

    // Fecha os modais ao clicar nos botões de fechar
    closeModalBtns.forEach(button => {
        button.addEventListener("click", function () {
            closeModal(modalCad);
            closeModal(modalLogin);
        });
    });

    // Fecha os modais ao clicar no fade
    fade.addEventListener("click", function () {
        closeModal(modalCad);
        closeModal(modalLogin);
    });
});
