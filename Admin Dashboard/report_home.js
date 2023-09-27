// button 1
document.addEventListener("DOMContentLoaded", function () {
    const copyButton = document.getElementById("copyButton");
    const usernameInput = document.getElementById("username");

    copyButton.addEventListener("click", function () {
      // Select the text inside the input element
      usernameInput.select();
      usernameInput.setSelectionRange(0, 99999); // For mobile devices

      // Copy the selected text to the clipboard
      document.execCommand("copy");

      // Deselect the input field
      usernameInput.blur();

      // Optionally, provide user feedback (e.g., change button text)
      copyButton.textContent = "Copied!";
      setTimeout(function () {
        copyButton.textContent = "Copy";
      }, 2000); // Reset button text after 2 seconds
    });
  });

// button 2
  document.addEventListener("DOMContentLoaded", function () {
const copyButton = document.getElementById("Button");
const usernameInput = document.getElementById("link");

copyButton.addEventListener("click", function () {
  // Select the text inside the input element
  usernameInput.select();
  usernameInput.setSelectionRange(0, 99999); // For mobile devices

  // Copy the selected text to the clipboard
  document.execCommand("copy");

  // Deselect the input field
  usernameInput.blur();

  // Optionally, provide user feedback (e.g., change button text)
  copyButton.textContent = "Copied!";
  setTimeout(function () {
    copyButton.textContent = "Copy";
  }, 2000); // Reset button text after 2 seconds
});
});

// button 3

document.addEventListener("DOMContentLoaded", function () {
    const copyButton = document.getElementById("Button1");
    const usernameInput = document.getElementById("link2");
    
    copyButton.addEventListener("click", function () {
      // Select the text inside the input element
      usernameInput.select();
      usernameInput.setSelectionRange(0, 99999); // For mobile devices
    
      // Copy the selected text to the clipboard
      document.execCommand("copy");
    
      // Deselect the input field
      usernameInput.blur();
    
      // Optionally, provide user feedback (e.g., change button text)
      copyButton.textContent = "Copied!";
      setTimeout(function () {
        copyButton.textContent = "Copy";
      }, 2000); // Reset button text after 2 seconds
    });
    });

    // button 4
    document.addEventListener("DOMContentLoaded", function () {
        const copyButton = document.getElementById("Button2");
        const usernameInput = document.getElementById("link3");
        
        copyButton.addEventListener("click", function () {
          // Select the text inside the input element
          usernameInput.select();
          usernameInput.setSelectionRange(0, 99999); // For mobile devices
        
          // Copy the selected text to the clipboard
          document.execCommand("copy");
        
          // Deselect the input field
          usernameInput.blur();
        
          // Optionally, provide user feedback (e.g., change button text)
          copyButton.textContent = "Copied!";
          setTimeout(function () {
            copyButton.textContent = "Copy";
          }, 2000); // Reset button text after 2 seconds
        });
        });