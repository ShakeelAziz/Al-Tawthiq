const texts = [
    "your Journey of Success",
    "your future now",
    "your first step"
];

let index = 0;
const textElement = document.getElementById("changing-text");

function changeText() {
    // Reset animation
    textElement.style.animation = "none";
    void textElement.offsetWidth; // Force reflow
    textElement.style.animation = "";

    // Apply animation again
    textElement.style.animation = "fadeInUp 0.6s ease forwards";

    // Change text
    textElement.textContent = texts[index];

    // Move to next
    index = (index + 1) % texts.length;
}

// Initial text
changeText();

// Change every 2 seconds
setInterval(changeText, 2000);