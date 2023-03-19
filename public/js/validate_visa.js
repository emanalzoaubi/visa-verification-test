
const form = document.forms.visa_form;
const firstNameInput = form.first_name;
const lastNameInput = form.last_name;
const dobInput = form.date_of_birth;
const passportNoInput = form.passport_no;
const issueDateInput = form.issue_date;
const expiryDateInput = form.expiry_date;
const arrivalDateInput = form.arrival_date;

const travelingWithCompanionInput = form.traveling_with_companion;

const comapnionTemplate = document.getElementById("companion-template");

travelingWithCompanionInput.addEventListener('change', (event) => {
    // Get the selected value
    const selectedValue = event.target.value;
    if (selectedValue === 'yes') {
        comapnionTemplate.style.display = "block";
        ValidateCompanionData();
        addRequiredForInputs(comapnionTemplate);
    } else {
        comapnionTemplate.style.display = "none";
    }
})


firstNameInput.addEventListener('input', () => {
    validateEnglishChars(firstNameInput);
});

lastNameInput.addEventListener('input', () => {
    validateEnglishChars(lastNameInput);
});

dobInput.addEventListener('input', () => {
    validateDate(dobInput);
});

passportNoInput.addEventListener('input', () => {
    validateAlphaNumeric(passportNoInput, 6);
});

issueDateInput.addEventListener('input', () => {
    validateDate(issueDateInput);
});

expiryDateInput.addEventListener('input', () => {
    validateDate(expiryDateInput, true);
});

arrivalDateInput.addEventListener('input', () => {
    validateDate(arrivalDateInput, true);
});

function ValidateCompanionData() {
    const companionFirstNameInput = form.companion_first_name;
    const companionLastNameInput = form.companion_last_name;
    const companionDobInput = form.companion_date_of_birth;
    const companionPassportNoInput = form.companion_passport_no;
    const companionIssueDateInput = form.companion_issue_date;
    const companionExpiryDateInput = form.companion_expiry_date;
    const companionArrivalDateInput = form.companion_arrival_date;

    companionFirstNameInput.addEventListener('input', () => {
        validateEnglishChars(companionFirstNameInput);
    });

    companionLastNameInput.addEventListener('input', () => {
        validateEnglishChars(companionLastNameInput);
    });

    companionDobInput.addEventListener('input', () => {
        validateDate(companionDobInput);
    });

    companionPassportNoInput.addEventListener('input', () => {
        validateAlphaNumeric(companionPassportNoInput, 6);
    });

    companionIssueDateInput.addEventListener('input', () => {
        validateDate(companionIssueDateInput);
    });

    companionExpiryDateInput.addEventListener('input', () => {
        validateDate(companionExpiryDateInput, true);
    });

    companionArrivalDateInput.addEventListener('input', () => {
        validateDate(companionArrivalDateInput, true);
    });
}

function addRequiredForInputs(comapnionTemplate) {
    $('#companion-section').html(comapnionTemplate);
    // Add the "required" attribute to the inputs in the companion section
    $('#companion-section input').attr('required', true);
}

function removeRequiredForInputs() {
    $('#companion-section').empty();
    // Remove the "required" attribute from the inputs in the companion section
    $('#companion-section input').removeAttr('required');
}