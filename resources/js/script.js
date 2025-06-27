document.addEventListener('DOMContentLoaded', function () {
    var video = document.getElementById('background-video');
    video.playbackRate = 0.75; // Ralentit la vidéo à 75% de la vitesse normale
});

const welcomeTextElement = document.getElementById('welcome-text');
const welcomeMessages = [
    "أهلا وسهلا", // Arabe (Ahlan wa sahlan)
    "Bienvenue",   // Français
    "Welcome",     // Anglais
    "Bienvenido",  // Espagnol
    "Willkommen",  // Allemand
    "Benvenuto",   // Italien
    "Slaw",        // Kurde
    "स्वागत है",   // Hindi (Swagat Hai)
    "欢迎",        // Chinois (Huānyíng)
    "ようこそ",   // Japonais (Yōkoso)
    "환영합니다",  // Coréen (Hwan-yeong-hamnida)
    "Добро пожаловать", // Russe (Dobro pozhalovat)
    "Velkommen",   // Danois
    "Tervetuloa",  // Finnois
    "Selamat datang", // Malais
    "Swaagat hai", // Bengali
    "Welkom",      // Néerlandais
    "Wilujeng sumping", // Indonésien
    "Sveiki atvykę", // Lituanien
    "Hau'oli",     // Hawaïen
    "Witam",       // Polonais
    "Fáilte",      // Irlandais
    "Tere tulemast", // Estonien
    "Pū́jatā",     // Tamoul
    "Καλησπέρα",  // Grec
    "خوش آمدید"   // Ourdou (Khush āmdid)
];

let currentIndex = 0;

function showWelcomeMessage() {
    welcomeTextElement.innerText = welcomeMessages[currentIndex];
    welcomeTextElement.style.opacity = 1;

    setTimeout(() => {
        welcomeTextElement.style.opacity = 0;
    }, 2000);

    currentIndex = (currentIndex + 1) % welcomeMessages.length;
}

showWelcomeMessage();
setInterval(showWelcomeMessage, 3000);

// Sélection du conteneur des actualités
const actualitesContainer = document.querySelector('.actualites-items');

let isDragging = false;
let startX;
let scrollLeft;

// Démarrage du glissement
actualitesContainer.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.pageX - actualitesContainer.offsetLeft;
    scrollLeft = actualitesContainer.scrollLeft;
    actualitesContainer.classList.add('dragging');
});

// Arrêt du glissement au relâchement de la souris
actualitesContainer.addEventListener('mouseup', () => {
    isDragging = false;
    actualitesContainer.classList.remove('dragging');
});

// Arrêt du glissement en sortant de la zone
actualitesContainer.addEventListener('mouseleave', () => {
    isDragging = false;
    actualitesContainer.classList.remove('dragging');
});

// Glissement de l'élément
actualitesContainer.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    const x = e.pageX - actualitesContainer.offsetLeft;
    const walk = (x - startX) * 1.5; // Ajustez la vitesse de défilement
    actualitesContainer.scrollLeft = scrollLeft - walk;
});

// Empêche la sélection d’éléments au clic lors d’un glissement
actualitesContainer.addEventListener('click', (e) => {
    if (isDragging) {
        e.preventDefault();
        isDragging = false;
    }
});

// Sélectionner le conteneur
const scrollContainer = document.querySelector('.horizontal-scroll-container');

// Désactiver le défilement vertical en capturant le mouvement vertical
scrollContainer.addEventListener('wheel', (e) => {
    if (e.deltaY !== 0) { // Si défilement vertical
        e.preventDefault(); // Bloque le défilement vertical
        scrollContainer.scrollLeft += e.deltaY; // Convertit en défilement horizontal
    }
});


/* Page Contact */

document.getElementById('customContactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('customEmailInput').value;
    const feedback = document.getElementById('customFeedbackMessage');
    
    // Expression régulière pour vérifier le format de l'adresse e-mail
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!emailPattern.test(email)) {
        feedback.textContent = "Veuillez entrer une adresse e-mail valide.";
        feedback.style.color = "red";
        return;
    }

    feedback.textContent = "Message envoyé avec succès!";
    feedback.style.color = "green";

    // Réinitialisation du formulaire (optionnel)
    document.getElementById('customContactForm').reset();
});



