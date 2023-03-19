const form = document.forms.phone_verification_form;

// Get the phone number input element
const phoneNumberInput = form.mobile_number;
const otpCodeInput = form.otp_code;

// Add an event listener to the phone number input to validate the input
phoneNumberInput.addEventListener("input", function () {
    ValidatePhoneNumber(phoneNumberInput);
});

// Add an event listener to the OTP code input to validate the input
otpCodeInput.addEventListener("input", function () {
    validateAlphaNumeric(otpCodeInput, 4);
});

