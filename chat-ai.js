const API_KEY = "AIzaSyAKq4kF6Tg61GA14ho4YVlYbyDLAWSAEi4";

async function sendMessage() {

let input = document.getElementById("userInput").value;
let messages = document.getElementById("chat-messages");

messages.innerHTML += "<p><b>You:</b> " + input + "</p>";

const response = await fetch(
"https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" + API_KEY,
{
method: "POST",
headers: {
"Content-Type": "application/json"
},
body: JSON.stringify({
contents: [{
parts: [{ text: input }]
}]
})
});

const data = await response.json();

let reply = data.candidates[0].content.parts[0].text;

messages.innerHTML += "<p><b>Bot:</b> " + reply + "</p>";

document.getElementById("userInput").value = "";
}