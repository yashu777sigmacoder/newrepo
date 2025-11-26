// script.js

$(document).ready(function () {
    const $form = $("#registrationForm");
    const $errorBox = $("#errorBox");

    // Add a small focus highlight effect via class (just for fun)
    $("input, select, textarea").on("focus", function () {
        $(this).closest(".form-group").addClass("focused");
    }).on("blur", function () {
        $(this).closest(".form-group").removeClass("focused");
    });

    $form.on("submit", function (e) {
        let isValid = true;
        $errorBox.hide();

        // Check all required inputs, selects, textareas
        $form.find("input[required], select[required], textarea[required]").each(function () {
            const $field = $(this);

            // Special handling for radio and checkbox groups
            if ($field.attr("type") === "radio") {
                const name = $field.attr("name");
                if ($(`input[name='${name}']:checked`).length === 0) {
                    isValid = false;
                    return false; // break each loop
                }
            } else if ($field.attr("type") === "checkbox") {
                if (!$field.is(":checked")) {
                    isValid = false;
                    return false;
                }
            } else {
                if (!$field.val().trim()) {
                    isValid = false;
                    return false;
                }
            }
        });

        if (!isValid) {
            e.preventDefault();
            $errorBox.fadeIn(150);
        }
    });

    // Hide error on reset
    $("#resetBtn").on("click", function () {
        $errorBox.hide();
    });
});
