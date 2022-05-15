// alert("hello");

const addUser = document.querySelector(".add-client-btn");
const newUser = document.querySelector(".new-client");
const cancelUser = document.querySelector(".new-cancel-btn");
    addUser.addEventListener("click", showNewUser);
    cancelUser.addEventListener("click", showNewUser);
        function showNewUser() {
            newUser.classList.toggle("active");
        };