document.addEventListener("DOMContentLoaded", function() {
    window.openModal = (type) => {
        const modal = document.getElementById("modal");
        const allContents = modal.querySelectorAll(".modal__container");

        allContents.forEach(content => content.style.display = "none");

        const activeContent = modal.querySelector(`.modal__container[data-modal-type="${type}"]`);
        if (activeContent) {
            activeContent.style.display = "grid";
        }

        modal.style.display = "flex";

        document.body.classList.add('modal-open')
    }

    document.querySelectorAll(".modal__close").forEach(closeBtn => {
        closeBtn.addEventListener("click", function() {
            document.getElementById("modal").style.display = "none";
            document.body.classList.toggle('modal-open')
        });
    });
});
