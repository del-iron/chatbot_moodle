fetch("http://localhost/chatbot.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ message: "Oi" })
})
.then(response => response.json())
.then(data => console.log(data.response));
