// Function to generate the form dynamically
function generateForm() {
    const formContainer = document.getElementById('dynamicFormContainer');
    
    // Create a form element
    const form = document.createElement('form');
    form.action = '/submit.php'; // Specify the form action
    form.method = 'post'; // Specify the form method

    // Create and append the form fields
    const courseNameInput = createInput('text', 'name', 'Enter Your Course Name', true);
    const courseCodeInput = createInput('text', 'CourseCode', 'Enter Course Code', true);
    const batchInput = createInput('text', 'Batch', 'Enter Your Batch', true);
    const calendarInput = createInput('date', 'calendar', 'Enter Date Of Survey', true);

    // Create a submit button
    const submitButton = document.createElement('button');
    submitButton.type = 'submit';
    submitButton.innerText = 'Submit';

    // Append form fields to the form
    form.appendChild(courseNameInput);
    form.appendChild(courseCodeInput);
    form.appendChild(batchInput);
    form.appendChild(calendarInput);
    form.appendChild(submitButton);

    // Append the form to the container
    formContainer.appendChild(form);
}

// Function to create an input field
function createInput(type, name, placeholder, required) {
    const input = document.createElement('input');
    input.type = type;
    input.name = name;
    input.placeholder = placeholder;
    if (required) {
        input.required = true;
    }
    return input;
}

// Event listener for the button click to generate the form
document.getElementById('generateFormButton').addEventListener('click', generateForm);
