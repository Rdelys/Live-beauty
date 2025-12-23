<!-- components/chatbot.blade.php -->
@if(Auth::check())

<audio id="adminChatSound" src="/sounds/notificationAction.mp3" preload="auto"></audio>

<!-- 🔒 ANTI-DOUBLE CHARGEMENT -->
<script>
if (window._chatAlreadyLoaded) {
    console.warn("Chatbot déjà chargé → skip");
    throw new Error("Chatbot already loaded");
}
window._chatAlreadyLoaded = true;
</script>

<style>
/* =========================================== */
/* DESIGN SYSTEM - CHATBOT PREMIUM            */
/* =========================================== */

:root {
    --color-primary: #d1001f;
    --color-primary-light: #ff2a4f;
    --color-primary-dark: #700010;
    --color-bg-dark: #0a0a0a;
    --color-bg-card: rgba(20, 20, 20, 0.95);
    --color-bg-input: #111111;
    --color-text-light: #ffffff;
    --color-text-muted: #888888;
    --color-border: rgba(209, 0, 31, 0.3);
    --gradient-primary: linear-gradient(135deg, #d1001f 0%, #ff0037 100%);
    --gradient-dark: linear-gradient(145deg, #0a0a0a 0%, #1a1a1a 100%);
    --shadow-glow: 0 0 20px rgba(209, 0, 31, 0.4);
    --shadow-elevated: 0 8px 32px rgba(0, 0, 0, 0.4);
    --radius-lg: 16px;
    --radius-md: 12px;
    --radius-sm: 8px;
    
    /* ICÔNES SVG CUSTOM - ÉLÉGANTES & SEXY */
    --icon-lip-kiss: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffffff' d='M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z'/%3E%3C/svg%3E");
    --icon-woman-sexy: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffffff' d='M12 1.5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2s2-.9 2-2v-12c0-1.1-.9-2-2-2zm-3.5 10.5c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5 1.5-.7 1.5-1.5-.7-1.5-1.5-1.5zm7 0c-.8 0-1.5.7-1.5 1.5s.7 1.5 1.5 1.5 1.5-.7 1.5-1.5-.7-1.5-1.5-1.5z'/%3E%3C/svg%3E");
    --icon-wave-sexy: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ff2a4f' d='M11 5.08V2c0-.55.45-1 1-1s1 .45 1 1v3.08c4.39.49 7.5 4.41 6.92 8.8-.47 3.55-3.27 6.45-6.83 6.92-4.39.49-8.31-2.53-8.8-6.92-.11-.82.18-1.63.7-2.24.53-.62 1.31-.95 2.13-.95 1.65 0 3 1.35 3 3v.05c0 .55.45 1 1 1s1-.45 1-1v-.05c0-2.76-2.24-5-5-5-.98 0-1.94.29-2.76.83C5.4 8.79 5 9.79 5 10.88c0 4.14 3.36 7.5 7.5 7.5s7.5-3.36 7.5-7.5-3.36-7.5-7.5-7.5z'/%3E%3C/svg%3E");
    --icon-send-arrow: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffffff' d='M2.01 21L23 12 2.01 3 2 10l15 2-15 2z'/%3E%3C/svg%3E");
    --icon-close-x: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffffff' d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z'/%3E%3C/svg%3E");
    --icon-heart: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ff2a4f' d='M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z'/%3E%3C/svg%3E");
}

/* =========================================== */
/* BOUTON FLOTTANT - SEXY & PREMIUM           */
/* =========================================== */
.chatbot-toggle {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: var(--gradient-primary);
    border: 3px solid rgba(255, 255, 255, 0.15);
    color: var(--color-text-light);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 
        0 0 25px rgba(209, 0, 31, 0.6),
        0 12px 40px rgba(0, 0, 0, 0.5),
        inset 0 2px 10px rgba(255, 255, 255, 0.2);
    z-index: 10000;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.chatbot-toggle::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.25) 50%, transparent 70%);
    animation: shine 3s infinite linear;
    pointer-events: none;
}

.chatbot-toggle:hover {
    transform: translateY(-6px) scale(1.08);
    box-shadow: 
        0 0 40px rgba(209, 0, 31, 0.8),
        0 18px 50px rgba(0, 0, 0, 0.6),
        inset 0 2px 12px rgba(255, 255, 255, 0.3);
}

.chatbot-toggle:active {
    transform: translateY(-2px) scale(0.98);
}

.chatbot-toggle .icon {
    width: 34px;
    height: 34px;
    background-image: var(--icon-lip-kiss);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.4));
    z-index: 2;
    transition: transform 0.3s ease;
}

.chatbot-toggle:hover .icon {
    transform: scale(1.1);
}

.chatbot-toggle .badge {
    position: absolute;
    top: -6px;
    right: -6px;
    background: #ff2a4f;
    color: white;
    font-size: 11px;
    font-weight: 700;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
    border: 2px solid var(--color-bg-dark);
    box-shadow: 0 0 15px rgba(255, 42, 79, 0.7);
    z-index: 3;
    animation: pulse 1.5s infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

@keyframes pulse {
    0%, 100% { 
        opacity: 1;
        transform: scale(1);
    }
    50% { 
        opacity: 0.8;
        transform: scale(1.1);
    }
}

/* =========================================== */
/* CONTAINER CHAT - DESIGN ÉLÉGANT            */
/* =========================================== */
.chatbot-container {
    position: fixed;
    bottom: 120px;
    right: 30px;
    width: 400px;
    max-height: 580px;
    background: var(--color-bg-card);
    backdrop-filter: blur(25px) saturate(200%);
    border: 1px solid rgba(209, 0, 31, 0.4);
    border-radius: var(--radius-lg);
    box-shadow: 
        0 15px 50px rgba(0, 0, 0, 0.5),
        0 0 30px rgba(209, 0, 31, 0.3);
    overflow: hidden;
    display: none;
    flex-direction: column;
    z-index: 9999;
    transform-origin: bottom right;
    animation: slideInUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(25px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* =========================================== */
/* EN-TÊTE - STYLE SEXY                       */
/* =========================================== */
.chatbot-header {
    background: linear-gradient(135deg, #d1001f 0%, #ff0037 50%, #ff2a4f 100%);
    padding: 20px 24px;
    color: var(--color-text-light);
    position: relative;
    overflow: hidden;
}

.chatbot-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
}

.chatbot-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.chatbot-header-content {
    display: flex;
    align-items: center;
    gap: 16px;
}

.chatbot-avatar {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.25);
    border-radius: 50%;
    backdrop-filter: blur(15px);
    background-image: var(--icon-woman-sexy);
    background-size: 60%;
    background-repeat: no-repeat;
    background-position: center;
    border: 2px solid rgba(255, 255, 255, 0.4);
    box-shadow: 
        0 0 20px rgba(255, 255, 255, 0.2),
        inset 0 0 15px rgba(255, 255, 255, 0.1);
    color: transparent;
    transition: all 0.3s ease;
}

.chatbot-avatar:hover {
    transform: rotate(10deg) scale(1.05);
    box-shadow: 
        0 0 25px rgba(255, 255, 255, 0.4),
        inset 0 0 20px rgba(255, 255, 255, 0.2);
}

.chatbot-info h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.chatbot-info p {
    margin: 6px 0 0;
    font-size: 13px;
    opacity: 0.95;
    font-weight: 300;
}

.chatbot-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    z-index: 10;
}

.chatbot-close::after {
    content: '';
    width: 16px;
    height: 16px;
    background-image: var(--icon-close-x);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    transition: transform 0.3s ease;
}

.chatbot-close:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: rotate(90deg) scale(1.1);
}

.chatbot-close:hover::after {
    transform: scale(1.1);
}

/* =========================================== */
/* BARRE DE STATUT - ÉLÉGANTE                 */
/* =========================================== */
.chatbot-status {
    padding: 14px 24px;
    background: linear-gradient(90deg, rgba(209, 0, 31, 0.12), rgba(255, 42, 79, 0.08));
    border-bottom: 1px solid rgba(209, 0, 31, 0.15);
    display: flex;
    align-items: center;
    justify-content: space-between;
    backdrop-filter: blur(10px);
}

.status-indicator {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    color: var(--color-text-light);
    font-weight: 500;
}

.status-dot {
    width: 10px;
    height: 10px;
    background: #4caf50;
    border-radius: 50%;
    box-shadow: 0 0 10px #4caf50;
    animation: pulse 2s infinite;
}

.language-selector {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(209, 0, 31, 0.4);
    color: var(--color-text-light);
    padding: 7px 14px;
    border-radius: var(--radius-sm);
    font-size: 13px;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    font-weight: 500;
}

.language-selector:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: var(--color-primary-light);
    box-shadow: 0 0 15px rgba(209, 0, 31, 0.3);
}

.language-selector option {
    background: var(--color-bg-dark);
    color: var(--color-text-light);
    padding: 10px;
}

/* =========================================== */
/* ZONE DES MESSAGES - DESIGN PREMIUM         */
/* =========================================== */
.chatbot-messages {
    flex: 1;
    padding: 24px;
    overflow-y: auto;
    background: linear-gradient(180deg, var(--color-bg-dark) 0%, #151515 100%);
    position: relative;
}

.chatbot-messages::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(209, 0, 31, 0.3), transparent);
}

/* Message de bienvenue - SEXY */
.welcome-container {
    text-align: center;
    margin-bottom: 28px;
    padding: 24px;
    background: linear-gradient(135deg, rgba(209, 0, 31, 0.15), rgba(255, 42, 79, 0.1));
    border-radius: var(--radius-md);
    border: 1px solid rgba(209, 0, 31, 0.25);
    position: relative;
    overflow: hidden;
}

.welcome-container::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 42, 79, 0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.welcome-avatar {
    width: 70px;
    height: 70px;
    margin: 0 auto 20px;
    background: var(--gradient-primary);
    border-radius: 50%;
    backdrop-filter: blur(10px);
    background-image: var(--icon-wave-sexy);
    background-size: 55%;
    background-repeat: no-repeat;
    background-position: center;
    border: 2px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 0 25px rgba(209, 0, 31, 0.5),
        inset 0 0 20px rgba(255, 255, 255, 0.1);
    color: transparent;
    position: relative;
    z-index: 2;
    transition: transform 0.5s ease;
}

.welcome-avatar:hover {
    transform: rotate(20deg) scale(1.1);
}

.welcome-text h4 {
    margin: 0 0 12px;
    color: var(--color-text-light);
    font-size: 18px;
    font-weight: 700;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 2;
}

.welcome-text p {
    margin: 0;
    color: rgba(255, 255, 255, 0.9);
    font-size: 14px;
    line-height: 1.6;
    font-weight: 400;
    position: relative;
    z-index: 2;
}

/* Bulles de message - DESIGN ÉLÉGANT */
.message {
    max-width: 82%;
    margin-bottom: 18px;
    animation: messageSlide 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

@keyframes messageSlide {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.message-incoming {
    align-self: flex-start;
}

.message-outgoing {
    align-self: flex-end;
}

.message-bubble {
    padding: 14px 18px;
    border-radius: var(--radius-md);
    position: relative;
    line-height: 1.5;
    font-size: 14px;
    font-weight: 400;
    backdrop-filter: blur(10px);
}

.message-incoming .message-bubble {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.05));
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: rgba(255, 255, 255, 0.95);
    border-bottom-left-radius: 6px;
    box-shadow: 
        0 4px 15px rgba(0, 0, 0, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.message-outgoing .message-bubble {
    background: var(--gradient-primary);
    color: white;
    border-bottom-right-radius: 6px;
    box-shadow: 
        0 4px 20px rgba(209, 0, 31, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.message-time {
    display: block;
    font-size: 11px;
    opacity: 0.8;
    margin-top: 6px;
    text-align: right;
    font-weight: 300;
}

.message-sender {
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 12px;
    opacity: 0.9;
    letter-spacing: 0.5px;
}

/* =========================================== */
/* ZONE DE SAISIE - STYLE PREMIUM             */
/* =========================================== */
.chatbot-input {
    padding: 24px;
    background: linear-gradient(180deg, rgba(10, 10, 10, 0.95) 0%, #0f0f0f 100%);
    border-top: 1px solid rgba(209, 0, 31, 0.25);
    position: relative;
}

.chatbot-input::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(209, 0, 31, 0.5), transparent);
}

.input-wrapper {
    display: flex;
    gap: 16px;
    align-items: center;
}

.chatbot-input-field {
    flex: 1;
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(209, 0, 31, 0.4);
    border-radius: var(--radius-md);
    color: var(--color-text-light);
    font-size: 15px;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    font-weight: 400;
}

.chatbot-input-field:focus {
    outline: none;
    border-color: var(--color-primary-light);
    background: rgba(255, 255, 255, 0.1);
    box-shadow: 
        0 0 0 4px rgba(209, 0, 31, 0.15),
        0 0 20px rgba(209, 0, 31, 0.2);
}

.chatbot-input-field::placeholder {
    color: rgba(255, 255, 255, 0.5);
    font-weight: 300;
}

.chatbot-send {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
    box-shadow: 
        0 4px 20px rgba(209, 0, 31, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

.chatbot-send::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.3) 50%, transparent 70%);
    animation: shine 2s infinite linear;
}

.chatbot-send svg {
    display: none;
}

.chatbot-send::after {
    content: '';
    width: 22px;
    height: 22px;
    background-image: var(--icon-send-arrow);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    position: relative;
    z-index: 2;
    transition: transform 0.3s ease;
}

.chatbot-send:hover {
    transform: translateY(-4px);
    box-shadow: 
        0 8px 30px rgba(209, 0, 31, 0.7),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
}

.chatbot-send:hover::after {
    transform: translateX(3px);
}

.chatbot-send:active {
    transform: translateY(-1px);
}

.input-hint {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.6);
    margin-top: 12px;
    text-align: center;
    font-weight: 300;
    letter-spacing: 0.5px;
}

/* =========================================== */
/* SCROLLBAR CUSTOM - ÉLÉGANTE                */
/* =========================================== */
.chatbot-messages::-webkit-scrollbar {
    width: 8px;
}

.chatbot-messages::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 4px;
    margin: 4px 0;
}

.chatbot-messages::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, var(--color-primary), var(--color-primary-light));
    border-radius: 4px;
    border: 2px solid transparent;
    background-clip: content-box;
    transition: all 0.3s ease;
}

.chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, var(--color-primary-light), #ff4d6d);
    background-clip: content-box;
}

/* =========================================== */
/* ANIMATIONS ET ÉTATS - SEXY                 */
/* =========================================== */
.typing-indicator {
    display: flex;
    gap: 6px;
    padding: 16px 20px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
    border-radius: var(--radius-md);
    width: fit-content;
    margin-bottom: 16px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
}

.typing-dot {
    width: 8px;
    height: 8px;
    background: var(--color-primary-light);
    border-radius: 50%;
    animation: typingBounce 1.4s infinite ease-in-out;
    box-shadow: 0 0 10px rgba(255, 42, 79, 0.5);
}

.typing-dot:nth-child(1) { animation-delay: -0.32s; }
.typing-dot:nth-child(2) { animation-delay: -0.16s; }

@keyframes typingBounce {
    0%, 80%, 100% { 
        transform: translateY(0);
        opacity: 0.6;
    }
    40% { 
        transform: translateY(-8px);
        opacity: 1;
    }
}

/* Message système */
.system-message {
    text-align: center;
    margin: 16px 0;
    padding: 12px 20px;
    background: linear-gradient(135deg, rgba(209, 0, 31, 0.15), rgba(255, 42, 79, 0.1));
    border-radius: var(--radius-md);
    color: var(--color-primary-light);
    font-size: 13px;
    border: 1px solid rgba(209, 0, 31, 0.25);
    backdrop-filter: blur(10px);
    font-weight: 500;
    letter-spacing: 0.3px;
}

/* Effet de cœur pour les messages spéciaux */
.heart-message::after {
    content: '';
    position: absolute;
    right: -10px;
    top: -10px;
    width: 20px;
    height: 20px;
    background-image: var(--icon-heart);
    background-size: contain;
    background-repeat: no-repeat;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(10deg); }
}

/* =========================================== */
/* RESPONSIVE                                  */
/* =========================================== */
@media (max-width: 640px) {
    .chatbot-container {
        width: calc(100vw - 40px);
        right: 20px;
        bottom: 110px;
        max-height: 75vh;
        border-radius: 20px;
    }
    
    .chatbot-toggle {
        bottom: 25px;
        right: 25px;
        width: 65px;
        height: 65px;
    }
    
    .chatbot-toggle .icon {
        width: 30px;
        height: 30px;
    }
    
    .chatbot-avatar {
        width: 42px;
        height: 42px;
    }
    
    .welcome-avatar {
        width: 60px;
        height: 60px;
    }
}

/* =========================================== */
/* TRANSITIONS                                 */
/* =========================================== */
* {
    scroll-behavior: smooth;
}

.fade-enter {
    opacity: 0;
    transform: translateY(15px) scale(0.98);
}

.fade-enter-active {
    opacity: 1;
    transform: translateY(0) scale(1);
    transition: opacity 0.4s, transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Effet de transition pour l'ouverture */
.chatbot-container[style*="display: flex"] {
    animation: slideInUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

</style>

<!-- =========================================== -->
<!-- HTML STRUCTURE - ICÔNES SEXY               -->
<!-- =========================================== -->
<button class="chatbot-toggle" id="chatbot-toggle">
    <div class="icon"></div>
    <div class="badge" id="unread-badge">0</div>
</button>

<div class="chatbot-container" id="chatbot-container">
    <!-- En-tête -->
    <div class="chatbot-header">
        <div class="chatbot-header-content">
            <div class="chatbot-avatar"></div>
            <div class="chatbot-info">
                <h3>Live Beauty Assistant</h3>
                <p>Connecté en tant que {{ Auth::user()->pseudo }}</p>
            </div>
        </div>
        <button class="chatbot-close" id="close-chatbot"></button>
    </div>
    
    <!-- Barre de statut -->
    <div class="chatbot-status">
        <div class="status-indicator">
            <div class="status-dot"></div>
            <span>En ligne • Réponse instantanée</span>
        </div>
        <select class="language-selector" id="languageSelector">
            <option value="FR" {{ (Auth::user()->preferred_language ?? 'FR') === 'FR' ? 'selected' : '' }}>🇫🇷 Français</option>
            <option value="EN" {{ (Auth::user()->preferred_language ?? 'FR') === 'EN' ? 'selected' : '' }}>🇬🇧 English</option>
            <option value="ES" {{ (Auth::user()->preferred_language ?? 'FR') === 'ES' ? 'selected' : '' }}>🇪🇸 Español</option>
            <option value="IT" {{ (Auth::user()->preferred_language ?? 'FR') === 'IT' ? 'selected' : '' }}>🇮🇹 Italiano</option>
            <option value="DE" {{ (Auth::user()->preferred_language ?? 'FR') === 'DE' ? 'selected' : '' }}>🇩🇪 Deutsch</option>
        </select>
    </div>
    
    <!-- Messages -->
    <div class="chatbot-messages" id="chatbot-messages">
        <!-- Message de bienvenue -->
        <div class="welcome-container">
            <div class="welcome-avatar"></div>
            <div class="welcome-text">
                <h4>Salut {{ Auth::user()->pseudo }} ! 😘</h4>
                <p>Je suis ton assistant beauté personnel. Comment puis-je te gâter aujourd'hui ?</p>
            </div>
        </div>
        
        <!-- Historique des messages -->
        @php
            $history = class_exists('App\Services\ChatStorageService') 
                ? App\Services\ChatStorageService::getUserHistory(Auth::user()->id)
                : collect();
        @endphp
        
        @foreach($history as $message)
            <div class="message {{ $message->sender == 'admin' ? 'message-incoming' : 'message-outgoing' }}">
                <div class="message-bubble">
                    @if($message->sender == 'admin')
                        <div class="message-sender">Beauty Assistant</div>
                    @endif
                    {{ $message->message }}
                    <span class="message-time">
                        {{ $message->created_at->format('H:i') }}
                    </span>
                </div>
            </div>
        @endforeach
        
        <!-- Indicateur de saisie (caché par défaut) -->
        <div class="typing-indicator" id="typing-indicator" style="display: none;">
            <div class="typing-dot"></div>
            <div class="typing-dot"></div>
            <div class="typing-dot"></div>
        </div>
    </div>
    
    <!-- Zone de saisie -->
    <div class="chatbot-input">
        <div class="input-wrapper">
            <input 
                type="text" 
                class="chatbot-input-field" 
                id="chatbot-user-input" 
                placeholder="Dis-moi tout, chéri(e)..."
                autocomplete="off"
            >
            <button class="chatbot-send" id="chatbot-send"></button>
        </div>
        <div class="input-hint">
            Appuie sur Entrée pour m'envoyer un message 💋
        </div>
    </div>
</div>

<script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
<script>
/* =========================================== */
/* GESTIONNAIRE DE CHAT PREMIUM & SEXY        */
/* =========================================== */

class PremiumChat {
    constructor() {
        this.socket = null;
        this.userId = "{{ Auth::user()->id }}";
        this.userPseudo = "{{ Auth::user()->pseudo }}";
        this.unreadCount = 0;
        this.isTyping = false;
        
        this.init();
    }
    
    init() {
        this.cacheElements();
        this.bindEvents();
        this.initSocket();
        this.restoreState();
        this.addWelcomeEffects();
    }
    
    cacheElements() {
        this.elements = {
            toggle: document.getElementById('chatbot-toggle'),
            container: document.getElementById('chatbot-container'),
            close: document.getElementById('close-chatbot'),
            messages: document.getElementById('chatbot-messages'),
            input: document.getElementById('chatbot-user-input'),
            send: document.getElementById('chatbot-send'),
            badge: document.getElementById('unread-badge'),
            typing: document.getElementById('typing-indicator'),
            language: document.getElementById('languageSelector')
        };
    }
    
    bindEvents() {
        // Ouverture/fermeture
        this.elements.toggle.addEventListener('click', () => this.openChat());
        this.elements.close.addEventListener('click', () => this.closeChat());
        
        // Envoi de message
        this.elements.input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') this.sendMessage();
        });
        this.elements.send.addEventListener('click', () => this.sendMessage());
        
        // Typing indicator
        this.elements.input.addEventListener('input', () => this.handleTyping());
        
        // Changement de langue
        this.elements.language.addEventListener('change', () => this.changeLanguage());
        
        // Fermeture en cliquant à l'extérieur
        document.addEventListener('click', (e) => {
            if (!this.elements.container.contains(e.target) && 
                !this.elements.toggle.contains(e.target) && 
                this.isOpen()) {
                this.closeChat();
            }
        });
        
        // Effets visuels sur le bouton d'envoi
        this.elements.send.addEventListener('mouseenter', () => {
            this.elements.send.style.transform = 'translateY(-4px)';
        });
        
        this.elements.send.addEventListener('mouseleave', () => {
            if (document.activeElement !== this.elements.input) {
                this.elements.send.style.transform = 'translateY(0)';
            }
        });
    }
    
    initSocket() {
        if (!window.socketChat) {
            window.socketChat = io("https://livebeautyofficial.com", {
                path: "/chatbot/socket.io",
                transports: ["polling", "websocket"],
                reconnection: true,
                reconnectionAttempts: 5,
                reconnectionDelay: 1000
            });
        }
        
        this.socket = window.socketChat;
        
        // Événements Socket.io
        this.socket.on('connect', () => this.onConnect());
        this.socket.on('chatbot-reply', (data) => this.onMessage(data, 'admin'));
        this.socket.on('bot-reply', (data) => this.onMessage(data, 'bot'));
        this.socket.on('typing', (data) => this.showTyping(data));
        this.socket.on('stop-typing', () => this.hideTyping());
    }
    
    addWelcomeEffects() {
        // Animation du bouton au chargement
        setTimeout(() => {
            this.elements.toggle.style.animation = 'none';
            setTimeout(() => {
                this.elements.toggle.style.animation = '';
            }, 10);
        }, 1000);
        
        // Effet de pulsation périodique
        setInterval(() => {
            if (!this.isOpen() && this.unreadCount === 0) {
                this.elements.toggle.style.boxShadow = 
                    '0 0 35px rgba(209, 0, 31, 0.8), 0 12px 40px rgba(0, 0, 0, 0.5), inset 0 2px 10px rgba(255, 255, 255, 0.2)';
                setTimeout(() => {
                    if (!this.isOpen() && this.unreadCount === 0) {
                        this.elements.toggle.style.boxShadow = 
                            '0 0 25px rgba(209, 0, 31, 0.6), 0 12px 40px rgba(0, 0, 0, 0.5), inset 0 2px 10px rgba(255, 255, 255, 0.2)';
                    }
                }, 500);
            }
        }, 10000);
    }
    
    /* =========================================== */
    /* FONCTIONNALITÉS PRINCIPALES                */
    /* =========================================== */
    
    openChat() {
        this.elements.container.style.display = 'flex';
        this.elements.toggle.style.display = 'none';
        this.resetUnreadCount();
        this.scrollToBottom();
        setTimeout(() => this.elements.input.focus(), 300);
        
        // Effet visuel d'ouverture
        this.elements.container.style.transform = 'translateY(20px) scale(0.95)';
        this.elements.container.style.opacity = '0';
        
        setTimeout(() => {
            this.elements.container.style.transition = 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.4s';
            this.elements.container.style.transform = 'translateY(0) scale(1)';
            this.elements.container.style.opacity = '1';
        }, 10);
    }
    
    closeChat() {
        // Animation de fermeture
        this.elements.container.style.transition = 'transform 0.3s ease, opacity 0.3s';
        this.elements.container.style.transform = 'translateY(20px) scale(0.95)';
        this.elements.container.style.opacity = '0';
        
        setTimeout(() => {
            this.elements.container.style.display = 'none';
            this.elements.toggle.style.display = 'flex';
        }, 300);
    }
    
    isOpen() {
        return this.elements.container.style.display === 'flex';
    }
    
    sendMessage() {
        const message = this.elements.input.value.trim();
        if (!message) return;
        
        // Effet visuel sur le bouton d'envoi
        this.elements.send.style.transform = 'scale(0.9)';
        setTimeout(() => {
            this.elements.send.style.transform = '';
        }, 150);
        
        // Ajouter le message localement
        this.addMessage(message, 'outgoing');
        
        // Envoyer au serveur
        this.socket.emit('client-message', {
            userId: this.userId,
            pseudo: this.userPseudo,
            message: message
        });
        
        // Réinitialiser l'input
        this.elements.input.value = '';
        this.hideTyping();
        
        // Stocker localement
        this.storeMessage(message, 'outgoing');
    }
    
    onConnect() {
        console.log('💋 Connecté au chat Live Beauty');
        this.socket.emit('identify', {
            type: 'client',
            userId: this.userId,
            pseudo: this.userPseudo
        });
        
        // Message de bienvenue animé
        setTimeout(() => {
            this.addSystemMessage('💝 Connecté avec succès ! Prêt à papoter...');
        }, 1000);
    }
    
    onMessage(data, senderType) {
        const sender = senderType === 'admin' ? 'Beauty Assistant' : 'Assistant';
        this.addMessage(data.message, 'incoming', sender);
        
        // Jouer le son si chat fermé
        if (!this.isOpen()) {
            this.incrementUnreadCount();
            this.playNotificationSound();
        }
        
        // Stocker localement
        this.storeMessage(data.message, 'incoming', sender);
    }
    
    addMessage(content, type, sender = null) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message message-${type}`;
        
        const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        // Ajouter un cœur pour les messages spéciaux
        const hasHeart = content.toLowerCase().includes('belle') || 
                        content.toLowerCase().includes('beau') ||
                        content.toLowerCase().includes('amour') ||
                        content.toLowerCase().includes('kiss');
        
        messageDiv.innerHTML = `
            <div class="message-bubble ${hasHeart ? 'heart-message' : ''}">
                ${sender ? `<div class="message-sender">${sender}</div>` : ''}
                ${content}
                <span class="message-time">${time}</span>
            </div>
        `;
        
        // Animation d'entrée
        messageDiv.style.opacity = '0';
        messageDiv.style.transform = 'translateY(15px) scale(0.95)';
        
        this.elements.messages.appendChild(messageDiv);
        
        // Animation
        setTimeout(() => {
            messageDiv.style.transition = 'opacity 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
            messageDiv.style.opacity = '1';
            messageDiv.style.transform = 'translateY(0) scale(1)';
        }, 10);
        
        this.scrollToBottom();
    }
    
    showTyping(data) {
        if (data.userId !== this.userId) {
            this.elements.typing.style.display = 'flex';
            this.scrollToBottom();
        }
    }
    
    hideTyping() {
        this.elements.typing.style.display = 'none';
    }
    
    handleTyping() {
        if (!this.isTyping) {
            this.isTyping = true;
            this.socket.emit('typing', {
                userId: this.userId,
                pseudo: this.userPseudo
            });
            
            setTimeout(() => {
                this.isTyping = false;
                this.socket.emit('stop-typing', {
                    userId: this.userId
                });
            }, 1000);
        }
    }
    
    changeLanguage() {
        const selectedLang = this.elements.language.value;
        
        fetch('/api/set-language', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ language: selectedLang })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.addSystemMessage(`🌹 Langue mise à jour: ${this.getLanguageName(selectedLang)}`);
                
                // Reconnecter le socket pour prendre en compte la nouvelle langue
                if (this.socket) {
                    this.socket.disconnect();
                    this.socket.connect();
                }
            }
        })
        .catch(error => {
            console.error('Erreur changement de langue:', error);
            this.addSystemMessage('💔 Erreur lors du changement de langue');
        });
    }
    
    getLanguageName(code) {
        const languages = {
            'FR': 'Français',
            'EN': 'Anglais',
            'ES': 'Espagnol',
            'IT': 'Italien',
            'DE': 'Allemand'
        };
        return languages[code] || code;
    }
    
    /* =========================================== */
    /* FONCTIONS UTILITAIRES                      */
    /* =========================================== */
    
    addSystemMessage(text) {
        const systemDiv = document.createElement('div');
        systemDiv.className = 'system-message';
        systemDiv.textContent = text;
        
        this.elements.messages.appendChild(systemDiv);
        this.scrollToBottom();
        
        // Animation spéciale pour les messages système
        systemDiv.style.opacity = '0';
        systemDiv.style.transform = 'scale(0.9)';
        
        setTimeout(() => {
            systemDiv.style.transition = 'opacity 0.3s, transform 0.3s';
            systemDiv.style.opacity = '1';
            systemDiv.style.transform = 'scale(1)';
        }, 10);
    }
    
    scrollToBottom() {
        setTimeout(() => {
            this.elements.messages.scrollTo({
                top: this.elements.messages.scrollHeight,
                behavior: 'smooth'
            });
        }, 100);
    }
    
    incrementUnreadCount() {
        this.unreadCount++;
        this.elements.badge.textContent = this.unreadCount > 9 ? '9+' : this.unreadCount;
        this.elements.badge.style.display = 'flex';
        
        // Animation du badge
        this.elements.badge.style.transform = 'scale(1.3)';
        setTimeout(() => {
            this.elements.badge.style.transform = 'scale(1)';
        }, 200);
    }
    
    resetUnreadCount() {
        this.unreadCount = 0;
        this.elements.badge.style.display = 'none';
    }
    
    playNotificationSound() {
        const sound = document.getElementById('adminChatSound');
        if (sound) {
            sound.currentTime = 0;
            sound.play().catch(e => console.log('Audio playback failed:', e));
        }
    }
    
    storeMessage(content, type, sender = null) {
        const messages = JSON.parse(localStorage.getItem('chat_history') || '[]');
        messages.push({
            content,
            type,
            sender: sender || (type === 'outgoing' ? 'Moi' : 'Beauty Assistant'),
            timestamp: new Date().toISOString()
        });
        
        // Garder seulement les 50 derniers messages
        if (messages.length > 50) {
            messages.splice(0, messages.length - 50);
        }
        
        localStorage.setItem('chat_history', JSON.stringify(messages));
    }
    
    restoreState() {
        // Restaurer l'état ouvert/fermé
        const wasOpen = localStorage.getItem('chat_open') === 'true';
        if (wasOpen) {
            setTimeout(() => this.openChat(), 500);
        }
        
        // Restaurer les messages locaux
        const localMessages = JSON.parse(localStorage.getItem('chat_history') || '[]');
        localMessages.forEach(msg => {
            this.addMessage(msg.content, msg.type, msg.sender);
        });
    }
}

/* =========================================== */
/* INITIALISATION                             */
/* =========================================== */
document.addEventListener('DOMContentLoaded', () => {
    // Petit délai pour un effet plus fluide
    setTimeout(() => {
        window.premiumChat = new PremiumChat();
        
        // Animation d'apparition du bouton
        const toggleBtn = document.getElementById('chatbot-toggle');
        toggleBtn.style.opacity = '0';
        toggleBtn.style.transform = 'scale(0.8)';
        
        setTimeout(() => {
            toggleBtn.style.transition = 'opacity 0.5s, transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
            toggleBtn.style.opacity = '1';
            toggleBtn.style.transform = 'scale(1)';
        }, 300);
    }, 800);
});

// Sauvegarder l'état avant de quitter
window.addEventListener('beforeunload', () => {
    const isOpen = document.getElementById('chatbot-container').style.display === 'flex';
    localStorage.setItem('chat_open', isOpen);
});

// Effet de parallaxe sur le bouton
document.addEventListener('mousemove', (e) => {
    const toggleBtn = document.getElementById('chatbot-toggle');
    if (toggleBtn && toggleBtn.style.display !== 'none') {
        const x = (e.clientX / window.innerWidth - 0.5) * 10;
        const y = (e.clientY / window.innerHeight - 0.5) * 10;
        toggleBtn.style.transform = `translate(${x}px, ${y}px) scale(1.05)`;
    }
});

document.addEventListener('mouseleave', () => {
    const toggleBtn = document.getElementById('chatbot-toggle');
    if (toggleBtn && toggleBtn.style.display !== 'none') {
        toggleBtn.style.transform = 'translateY(0) scale(1)';
    }
});
</script>

@endif