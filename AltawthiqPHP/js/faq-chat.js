const faqs = [
  {
    question: "What is Al Tawthiq?",
    keywords: ["what", "al tawthiq", "about"],
    answer: "Al Tawthiq is a leading training and development company focused on improving team productivity through expert consulting, tailored training, and professional solutions."
  },
  {
    question: "What services do you provide?",
    keywords: ["services", "offer", "provide", "trainings", "training"],
    answer: "We offer consulting and training development, training project management, training plans, assessments, and certification/licensing services."
  },
  {
    question: "Can I book a demo?",
    keywords: ["demo", "book", "trial", "free"],
    answer: "Yes! You can book a demo through the site and a member of the team will contact you within one business day."
  },
  {
    question: "Do you offer certifications?",
    keywords: ["certification", "license", "certifications"],
    answer: "Yes, Al Tawthiq provides certification services and can help you obtain official training licenses."
  },
  {
    question: "How can I contact Al Tawthiq?",
    keywords: ["contact", "phone", "email", "address"],
    answer: "You can contact Al Tawthiq via phone at +966 553 300 598 or email at info@altawthiq.com."
  },
  {
    question: "Where are you located?",
    keywords: ["location", "address", "where"],
    answer: "Al Tawthiq is located in Al-Muorabba District, Near Passport Metro Station, Riyadh, Saudi Arabia."
  },
  {
    question: "How soon will someone respond?",
    keywords: ["response", "contact time", "reply"],
    answer: "Typically, a team member will contact you within one business day after you submit your request."
  }
];

const API_KEY = "AIzaSyAKq4kF6Tg61GA14ho4YVlYbyDLAWSAEi4";


function toggleChat() {
  const chat = document.getElementById("chatbot");
  chat.classList.toggle("hidden");

  if (!chat.classList.contains("hidden")) {
    const messages = document.getElementById("chat-messages");

    if (messages.innerHTML.trim() === "") {
      showFAQOptions();
    }
  }
}
// Show FAQs when chat opens
function showFAQOptions() {
  const chat = document.getElementById("chat-messages");

  const intro = document.createElement("div");
  intro.className = "message bot";
  intro.innerText = "Hi 👋 How can I help you? Here are some common questions:";
  chat.appendChild(intro);

  faqs.forEach(faq => {
    const btn = document.createElement("div");
    btn.className = "faq-option";
    btn.innerText = faq.question;
    btn.onclick = () => {
      addMessage(faq.question, "user");
      setTimeout(() => addMessage(faq.answer, "bot"), 400);
    };
    chat.appendChild(btn);
  });

  chat.scrollTop = chat.scrollHeight;
}

async function sendMessage() {
  const input = document.getElementById("userInput");
  const message = input.value.trim();
  if (!message) return;

  addMessage(message, "user");
  input.value = "";

  const faqReply = getBotReply(message.toLowerCase());

  // If FAQ found → use it
  if (faqReply) {
    setTimeout(() => addMessage(faqReply, "bot"), 400);
  }
  else {

    addMessage("Typing...", "bot");

    const aiReply = await askGemini(message);

    document.querySelector(".message.bot:last-child").remove();

    addMessage(aiReply, "bot");
  }
}

function getBotReply(message) {
  for (let faq of faqs) {
    if (faq.keywords.some(word => message.includes(word))) {
      return faq.answer;
    }
  }
  return null;
}


async function askGemini(question) {

  try {

    const response = await fetch(
      `https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key=${API_KEY}`,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          contents: [{
            parts: [{
              text: `
You are a support chatbot for Al Tawthiq Training Company in Riyadh.

Company Information:
- Training consulting
- Certification services
- Training project management
- Located in Al-Muorabba, Riyadh
- Phone: +966553300598
- Email: info@altawthiq.com

User Question: ${question}
`
            }]
          }]
        })
      }
    );

    const data = await response.json();
    console.log(data); // helps debugging

    if (data.candidates && data.candidates.length > 0) {
      return data.candidates[0].content.parts[0].text;
    }
    else if (data.error) {
      return "Error: " + data.error.message;
    }
    else {
      return "Sorry, I couldn't generate a response.";
    }

  } catch (error) {
    console.error(error);
    return "AI service is currently unavailable.";
  }
}

// // Send message manually
// function sendMessage() {
//   const input = document.getElementById("userInput");
//   const message = input.value.trim();
//   if (!message) return;

//   addMessage(message, "user");
//   input.value = "";

//   const reply = getBotReply(message.toLowerCase());
//   setTimeout(() => addMessage(reply, "bot"), 400);
// }


// // Find matching FAQ
// function getBotReply(message) {
//   for (let faq of faqs) {
//     if (faq.keywords.some(word => message.includes(word))) {
//       return faq.answer;
//     }
//   }
//  return "Sorry, I couldn’t find an answer to that. You can contact us at info@altawthiq.com for more help.";
// }


// Add message bubble
function addMessage(text, sender) {
  const chat = document.getElementById("chat-messages");
  const div = document.createElement("div");
  div.className = `message ${sender}`;
  div.innerText = text;
  chat.appendChild(div);
  chat.scrollTop = chat.scrollHeight;
}

document.getElementById("userInput").addEventListener("keypress", function (event) {
  if (event.key === "Enter") {
    sendMessage();
  }
});