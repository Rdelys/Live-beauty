<div id="privateLivePopup" 
     class="private-live-popup shadow-lg"
     style="display:none;">
    <div class="popup-header">
        <i class="fas fa-lock text-danger me-2"></i>
        <strong id="popupModelName">Live privé</strong>
        <span id="popupClose" class="popup-close">&times;</span>
    </div>
    <button id="popupJoinBtn" class="btn btn-sm btn-danger w-100 fw-bold mt-2">
        🔥 Rejoindre
    </button>
</div>

<style>
.private-live-popup {
    position: fixed;
    bottom: 20px;
    left: -300px; /* caché hors écran */
    width: 250px;
    padding: 15px;
    background: rgba(0, 0, 0, 0.9);
    color: white;
    border: 2px solid #e91e63;
    border-radius: 12px;
    z-index: 1050;
    transition: left 0.6s ease-in-out; /* animation slide */
}

.private-live-popup.active {
    left: 20px; /* visible */
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.popup-close {
    cursor: pointer;
    font-size: 1.2rem;
    font-weight: bold;
    color: #aaa;
}
.popup-close:hover {
    color: #fff;
}
</style>

<script>
async function checkPrivateLive() {
    try {
        const response = await fetch('/api/live/private');
        const lives = await response.json();

        const popup = document.getElementById("privateLivePopup");
        const modelName = document.getElementById("popupModelName");
        const joinBtn = document.getElementById("popupJoinBtn");
        const closeBtn = document.getElementById("popupClose");

        // Filtrer seulement les lives en cours
        const active = lives.filter(show => show.etat && show.etat.toLowerCase() === "en cours");

        if (active.length > 0) {
            const show = active[0];
            modelName.textContent = `${show.modele.prenom} est en live !`;

            // Générer URL Laravel
            const url = "{{ route('live.private.show', ['modeleId' => ':modeleId', 'showPriveId' => ':showPriveId']) }}"
                .replace(':modeleId', show.modele.id)
                .replace(':showPriveId', show.id);

            joinBtn.onclick = () => window.location.href = url;

            popup.style.display = "block";
            setTimeout(() => popup.classList.add("active"), 50); // déclenche animation

            closeBtn.onclick = () => {
                popup.classList.remove("active");
                setTimeout(() => popup.style.display = "none", 600);
            };
        } else {
            popup.classList.remove("active");
            setTimeout(() => popup.style.display = "none", 600);
        }
    } catch (err) {
        console.error("Erreur vérification show privé", err);
    }
}

// Vérifie au chargement et toutes les 30 sec
checkPrivateLive();
setInterval(checkPrivateLive, 30000);
</script>
