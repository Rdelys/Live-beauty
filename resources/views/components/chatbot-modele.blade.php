<style>
#chat-modele { 
    padding:20px; 
    background:#111; 
    border-radius:12px; 
    color:white; 
    border:1px solid #b0001c;
}
.client-block {
    border:1px solid #550010;
    padding:10px;
    border-radius:10px;
    margin-bottom:10px;
    background:#1a1a1a;
}
.client-block input {
    background:#222;
    border:1px solid #aa0022;
    color:white;
    padding:8px;
    width:100%;
    border-radius:6px;
}
</style>

<div id="chat-modele">
    <h3>💬 Messages des clients</h3>
    <div id="client-messages"></div>
</div>

<script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>

<script>
const socketChat = io("http://localhost:4000");

// Identification
socketChat.emit("identify", {
    type: "modele",
    modeleId: "{{ Auth::user()->id }}"
});

// Réception d'un message client
socketChat.on("modele-new-message", (data) => {
    const div = document.getElementById("client-messages");

    // Si bloc client existe pas → créer
    if (!document.getElementById("client-" + data.userId)) {
        div.innerHTML += `
            <div class="client-block" id="client-${data.userId}">
                <h5>${data.pseudo}</h5>
                <div class="chat-list"></div>
                <input class="reply-input" data-userid="${data.userId}" placeholder="Répondre à ${data.pseudo}…">
            </div>
        `;
    }

    const box = document.querySelector(`#client-${data.userId} .chat-list`);
    box.innerHTML += `<p><strong>${data.pseudo} :</strong> ${data.message}</p>`;
});

// Réponse modèle
document.addEventListener("keydown", function(e){
    if (e.target.classList.contains("reply-input") && e.key === "Enter") {
        const userId = e.target.getAttribute("data-userid");
        const msg = e.target.value;

        socketChat.emit("modele-reply", {
            userId,
            modelePseudo: "{{ Auth::user()->pseudo }}",
            message: msg
        });

        const box = document.querySelector(`#client-${userId} .chat-list`);
        box.innerHTML += `<p><strong style="color:#ff2a4f">Moi :</strong> ${msg}</p>`;

        e.target.value = "";
    }
});
</script>
