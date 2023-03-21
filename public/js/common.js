function setValidity(input, isValid, message) {
    input.setCustomValidity(isValid ? "" : message);
    input.classList.toggle("is-invalid", !isValid);
}

function validateEnglishChars(input) {
    const isValid = /^[a-zA-Z ]+$/.test(input.value);
    setValidity(input, isValid, "Please enter only English characters");
}

function validateAlphaNumeric(input, charactersLength) {
    const isValid = new RegExp(`^[a-zA-Z0-9]{${charactersLength},}$`).test(
        input.value
    );
    setValidity(
        input,
        isValid,
        `Please enter at least ${charactersLength} alphanumeric characters`
    );
}

function validateDate(dateInput, isFuture = false) {
    const selectedDate = new Date(dateInput.value);
    const currentDate = new Date();
    const isValid = isFuture
        ? selectedDate > currentDate
        : selectedDate < currentDate;
    setValidity(
        dateInput,
        isValid,
        isFuture
            ? "Please choose a date after today"
            : "Please choose a date before today"
    );
}

function ValidatePhoneNumber(phoneNumberInput) {
    const isValid = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test(
        phoneNumberInput.value
    );
    setValidity(phoneNumberInput, isValid, "Please enter a valid phone number");
}
