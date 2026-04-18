const faqs = [
  {
    question: "ما هي شركة التوثيق؟",
    keywords: ["ما هي", "التوثيق", "عن الشركة", "نبذة"],
    answer: "شركة التوثيق هي شركة رائدة في مجال التدريب والتطوير، وتهدف إلى تحسين إنتاجية الفرق من خلال الاستشارات المتخصصة، والبرامج التدريبية المصممة خصيصًا، والحلول المهنية."
  },
  {
    question: "ما هي الخدمات التي تقدمونها؟",
    keywords: ["خدمات", "تقدمون", "تقدم", "العروض"],
    answer: "نقدم خدمات الاستشارات وتطوير التدريب، إدارة المشاريع التدريبية، إعداد الخطط التدريبية، التقييمات، وخدمات الشهادات والتراخيص."
  },
  {
    question: "هل يمكنني حجز عرض توضيحي؟",
    keywords: ["عرض", "توضيحي", "حجز", "تجربة"],
    answer: "نعم! يمكنك حجز عرض توضيحي من خلال الموقع، وسيقوم أحد أعضاء الفريق بالتواصل معك خلال يوم عمل واحد."
  },
  {
    question: "هل تقدمون شهادات أو تراخيص؟",
    keywords: ["شهادة", "شهادات", "ترخيص", "اعتماد"],
    answer: "نعم، توفر شركة التوثيق خدمات إصدار الشهادات ويمكنها مساعدتك في الحصول على التراخيص التدريبية الرسمية."
  },
  {
    question: "كيف يمكنني التواصل مع شركة التوثيق؟",
    keywords: ["تواصل", "اتصال", "هاتف", "بريد", "ايميل"],
    answer: "يمكنك التواصل مع شركة التوثيق عبر الهاتف على الرقم +966 553 300 598 أو عبر البريد الإلكتروني info@altawthiq.com."
  },
  {
    question: "أين يقع مقر الشركة؟",
    keywords: ["الموقع", "العنوان", "أين", "المقر"],
    answer: "يقع مقر شركة التوثيق في مدينة الرياض، المملكة العربية السعودية."
  },
  {
    question: "متى يتم الرد على الاستفسارات؟",
    keywords: ["الرد", "متى", "استجابة", "وقت الرد"],
    answer: "عادةً ما يقوم أحد أعضاء الفريق بالتواصل معك خلال يوم عمل واحد بعد إرسال طلبك."
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

// عرض الأسئلة الشائعة عند فتح الدردشة
function showFAQOptions() {
  const chat = document.getElementById("chat-messages");
  
  const intro = document.createElement("div");
  intro.className = "message bot";
  intro.innerText = "مرحبًا 👋 كيف يمكنني مساعدتك؟ إليك بعض الأسئلة الشائعة:";
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

// إضافة رسالة إلى المحادثة
function addMessage(text, sender) {
  const chat = document.getElementById("chat-messages");
  const div = document.createElement("div");
  div.className = `message ${sender}`;
  div.innerText = text;
  chat.appendChild(div);
  chat.scrollTop = chat.scrollHeight;
}

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