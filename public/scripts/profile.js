const form = document.querySelector(".edit-form");
const editButton = document.querySelector(".button-edit-contact");
const contactBox = document.querySelector(".profile-info");
const buyButtons = document.querySelectorAll(".button-buy");
const testInput = document.querySelector(".test-input");
const hiddenAmounts = document.querySelectorAll(".hidden-membership-amount");
const hiddenInputAmounts = document.querySelectorAll(".hidden-input-amount");
const passwordForm = document.querySelector(".buy-membership-form");

editButton.addEventListener("click", showForm);

function showForm() {
    form.style.display = "block";
    contactBox.style.display = "none";
}

// buyButtons.forEach((buyButton) => {
//     buyButton.addEventListener("click", showPasswordForm);
// });

// function showPasswordForm() {
//     passwordForm.style.display = "block";
// }
