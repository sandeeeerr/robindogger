import {
    Livewire,
    Alpine,
} from '../../vendor/livewire/livewire/dist/livewire.esm'

import Tooltip from '@ryangjchandler/alpine-tooltip'

Alpine.plugin(Tooltip)

Livewire.start()

// DARK MODE TOGGLE BUTTON
const themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
const themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");
const themeToggleBtn = document.getElementById("theme-toggle");

// Alleen de localStorage-check; geen check op device dark mode.
if (localStorage.getItem("color-theme") === "dark") {
    document.documentElement.classList.add("dark");
    themeToggleLightIcon.classList.remove("hidden");
    themeToggleDarkIcon.classList.add("hidden");
} else {
    // Default: light mode
    document.documentElement.classList.remove("dark");
    themeToggleDarkIcon.classList.remove("hidden");
    themeToggleLightIcon.classList.add("hidden");
}

themeToggleBtn.addEventListener("click", function () {
    if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("color-theme", "light");
        themeToggleDarkIcon.classList.remove("hidden");
        themeToggleLightIcon.classList.add("hidden");
    } else {
        document.documentElement.classList.add("dark");
        localStorage.setItem("color-theme", "dark");
        themeToggleDarkIcon.classList.add("hidden");
        themeToggleLightIcon.classList.remove("hidden");
    }
});

// Functie om video's correct af te spelen op iOS
const initializeVideos = () => {
document.querySelectorAll("video[autoplay]").forEach((video) => {
    video.muted = true; // Zorg ervoor dat de video gemute is, anders blokkeert iOS autoplay
    video.play().catch((error) => {
    console.warn(`Autoplay prevented: ${error}`);
    });
});
};

// Initialiseer video's bij laden van de pagina
document.addEventListener("DOMContentLoaded", () => {
initializeVideos();
});

// Optioneel: Als je Livewire of AJAX gebruikt, herstart autoplay na updates
document.addEventListener("livewire:navigated", () => {
initializeVideos();
});
