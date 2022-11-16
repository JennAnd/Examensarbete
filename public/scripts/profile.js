const form = document.querySelector(".edit-form");
const editButton = document.querySelector(".button-edit-contact");
const contactBox = document.querySelector(".profile-info");

editButton.addEventListener("click", showForm);

function showForm() {
    form.style.display = "block";
    contactBox.style.display = "none";
}
