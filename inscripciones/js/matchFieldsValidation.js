function validate_personalId2(personalIdConfirm) {
    if (personalIdConfirm.value !== $("#personalId").val()) {
        personalIdConfirm.setCustomValidity("Los campos DNI deben coincidir");
    } else {
        personalIdConfirm.setCustomValidity(""); // is valid
    }
}

function validate_email2(emailConfirm) {
    if (emailConfirm.value !== $("#email").val()) {
        emailConfirm.setCustomValidity("Los campos eMails deben coincidir");
    } else {
        emailConfirm.setCustomValidity(""); // is valid
    }
}