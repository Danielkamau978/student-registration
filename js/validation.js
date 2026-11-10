document.addEventListener('DOMContentLoaded', function () {
    const studentForm = document.getElementById('studentForm');
    if (studentForm) {
        studentForm.addEventListener('submit', function (event) {
            let isValid = true;
            const nameInput = document.getElementById('name');
            const courseInput = document.getElementById('course');
            const ageInput = document.getElementById('age');
            clearErrors();

            if (nameInput.value.trim() === '') {
                showError(nameInput, 'Student name is required.');
                isValid = false;
            }

            if (courseInput.value.trim() === '') {
                showError(courseInput, 'Course name is required.');
                isValid = false;
            }

            const ageVal = parseInt(ageInput.value.trim(), 10);
            if (ageInput.value.trim() === '') {
                showError(ageInput, 'Age is required.');
                isValid = false;
            } else if (isNaN(ageVal) || ageVal < 5 || ageVal > 100) {
                showError(ageInput, 'Age must be a number between 5 and 100.');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    }

    const deleteButtons = document.querySelectorAll('.js-delete-btn');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            const confirmed = confirm('Are you sure you want to delete this student record? This action cannot be undone.');
            if (!confirmed) {
                event.preventDefault(); 
            }
        });
    });
    function showError(inputElement, message) {
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error-text';
        errorSpan.innerText = message;
        inputElement.parentNode.appendChild(errorSpan);
        inputElement.style.borderColor = '#dc2626';
    }
    function clearErrors() {
        const errorSpans = document.querySelectorAll('.error-text');
        errorSpans.forEach(function (span) {
            span.remove();
        });

        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(function (input) {
            input.style.borderColor = '#cbd5e1';
        });
    }
});