<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify-Style Interface</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-900 text-white antialiased">
<div class="flex h-screen overflow-hidden">
    <!-- Mobile & Desktop Sidebar -->
    <aside id="sidebar" class="fixed md:static md:block w-64 bg-gray-800 h-full transform
            -translate-x-full md:translate-x-0
            transition-transform duration-300 ease-in-out
            z-40 md:z-0 overflow-y-auto">
        <div class="p-6">
            <!-- Close Button (Only visible on mobile) -->
            <div class="md:hidden flex justify-between items-center mb-8">
                <div class="flex items-center">
                    <i class="fas fa-music text-green-500 mr-3 text-2xl"></i>
                    <h1 class="text-2xl font-bold text-green-500">MyMusic</h1>
                </div>
                <button id="close-sidebar" class="text-white text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Logo (Visible on desktop) -->
            <div class="hidden md:flex items-center mb-8">
                <i class="fas fa-music text-green-500 mr-3 text-2xl"></i>
                <h1 class="text-2xl font-bold text-green-500">MyMusic</h1>
            </div>

            <!-- Navigation -->
            <nav class="space-y-4">
                <div class="text-sm uppercase text-gray-400 mb-2">Menu</div>
                <div class="space-y-2">
                    <a href="#" class="flex items-center py-2 px-4 rounded hover:bg-gray-700 transition">
                        <i class="fas fa-home mr-3"></i>
                        Home
                    </a>
                    <a href="#" class="flex items-center py-2 px-4 rounded hover:bg-gray-700 transition">
                        <i class="fas fa-search mr-3"></i>
                        Search
                    </a>
                    <a href="#" class="flex items-center py-2 px-4 rounded hover:bg-gray-700 transition">
                        <i class="fas fa-record-vinyl mr-3"></i>
                        Your Library
                    </a>
                </div>
            </nav>

            <!-- Playlists -->
            <div class="mt-8">
                <div class="text-sm uppercase text-gray-400 mb-4">Playlists</div>
                <div class="space-y-2">
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 transition">
                        <i class="fas fa-music mr-3 text-green-500"></i>
                        Hip Hop Vibes
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 transition">
                        <i class="fas fa-globe mr-3 text-blue-500"></i>
                        Top 50 Global
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 transition">
                        <i class="fas fa-cloud mr-3 text-indigo-500"></i>
                        Chill Beats
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Overlay for Mobile Sidebar -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden"></div>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto">
        <!-- Top Bar -->
        <div class="sticky top-0 z-20 bg-gray-900 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Mobile Menu Toggle -->
                    <button id="open-sidebar" class="md:hidden text-white">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>

                    <!-- Search Input -->
                    <input
                            type="text"
                            placeholder="Search"
                            class="bg-gray-800 text-white rounded-full py-2 px-4 w-full max-w-md"
                    >
                </div>

                <!-- Sign Up Button -->
                <button class="bg-green-500 py-2 px-4 rounded-full hover:bg-green-600">
                    Sign Up
                </button>
            </div>
        </div>

        <!-- Content Area -->
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-6">Welcome to MyMusic</h1>
            <!-- Add more content here -->
        </div>
    </main>
</div>

<!-- Music Player Bar -->
<div class="fixed bottom-0 left-0 right-0 bg-gray-800 border-t border-gray-700 p-4 z-50">
    <div class="container mx-auto flex items-center justify-between max-w-screen-xl">
        <!-- Song Info -->
        <div class="flex items-center space-x-4 w-1/4">
            <img id="album-cover" src="https://via.placeholder.com/40" alt="Album Cover" class="w-10 h-10 rounded">
            <div>
                <h4 id="song-title" class="text-sm font-semibold">Currently Playing</h4>
                <p id="artist-name" class="text-xs text-gray-400">Artist Name</p>
            </div>
            <button id="like-button" class="text-gray-400 hover:text-red-500 transition">
                <i class="far fa-heart"></i>
            </button>
        </div>

        <!-- Player Controls -->
        <div class="flex flex-col items-center w-2/4">
            <div class="flex items-center space-x-6">
                <button id="shuffle-button" class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-random text-xl"></i>
                </button>
                <button id="prev-button" class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-step-backward text-xl"></i>
                </button>
                <button id="play-pause-button" class="bg-white rounded-full p-3 hover:scale-105 transition group">
                    <i id="play-pause-icon" class="fas fa-play text-gray-900 text-xl group-hover:scale-110 transition"></i>
                </button>
                <button id="next-button" class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-step-forward text-xl"></i>
                </button>
                <button id="repeat-button" class="text-gray-400 hover:text-white transition">
                    <i class="fas fa-redo text-xl"></i>
                </button>
            </div>
            <!-- Progress Bar -->
            <div class="w-full mt-2 flex items-center space-x-2">
                <span id="current-time" class="text-xs text-gray-400">0:00</span>
                <div class="flex-1 h-1 bg-gray-600 rounded-full cursor-pointer">
                    <div id="progress-bar" class="w-0 h-full bg-green-500 rounded-full"></div>
                </div>
                <span id="total-time" class="text-xs text-gray-400">3:45</span>
            </div>
        </div>

        <!-- Volume Control -->
        <div class="flex items-center space-x-2 w-1/4 justify-end">
            <button id="mute-button" class="text-gray-400 hover:text-white transition">
                <i class="fas fa-volume-up"></i>
            </button>
            <input
                    id="volume-slider"
                    type="range"
                    min="0"
                    max="100"
                    value="50"
                    class="w-24 h-1 bg-gray-600 appearance-none"
            >
        </div>
    </div>
</div>


<script>
    const openSidebarBtn = document.getElementById('open-sidebar');
    const closeSidebarBtn = document.getElementById('close-sidebar');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');

    openSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
    });

    closeSidebarBtn.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
    });

    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
    });

    // Music Player Advanced Functionality
    const audio = new Audio();
    const playPauseButton = document.getElementById('play-pause-button');
    const playPauseIcon = document.getElementById('play-pause-icon');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const shuffleButton = document.getElementById('shuffle-button');
    const repeatButton = document.getElementById('repeat-button');
    const likeButton = document.getElementById('like-button');
    const muteButton = document.getElementById('mute-button');
    const volumeSlider = document.getElementById('volume-slider');
    const progressBar = document.getElementById('progress-bar');
    const currentTimeEl = document.getElementById('current-time');
    const totalTimeEl = document.getElementById('total-time');
    const albumCover = document.getElementById('album-cover');
    const songTitle = document.getElementById('song-title');
    const artistName = document.getElementById('artist-name');

    // Playlist
    const playlist = [
        {
            title: "Blinding Lights",
            artist: "The Weeknd",
            src: "path/to/blinding_lights.mp3",
            cover: "path/to/blinding_lights_cover.jpg"
        },
        {
            title: "Shape of You",
            artist: "Ed Sheeran",
            src: "path/to/shape_of_you.mp3",
            cover: "path/to/shape_of_you_cover.jpg"
        }
    ];

    let currentTrackIndex = 0;
    let isPlaying = false;
    let isShuffled = false;
    let isRepeating = false;

    function loadTrack(track) {
        audio.src = track.src;
        songTitle.textContent = track.title;
        artistName.textContent = track.artist;
        albumCover.src = track.cover;

        // Update total time when metadata is loaded
        audio.addEventListener('loadedmetadata', () => {
            totalTimeEl.textContent = formatTime(audio.duration);
        });
    }

    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }

    function updateProgressBar() {
        const percentage = (audio.currentTime / audio.duration) * 100;
        progressBar.style.width = `${percentage}%`;
        currentTimeEl.textContent = formatTime(audio.currentTime);
    }

    function playPause() {
        if (isPlaying) {
            audio.pause();
            playPauseIcon.classList.remove('fa-pause');
            playPauseIcon.classList.add('fa-play');
        } else {
            audio.play();
            playPauseIcon.classList.remove('fa-play');
            playPauseIcon.classList.add('fa-pause');
        }
        isPlaying = !isPlaying;
    }

    function nextTrack() {
        currentTrackIndex = (currentTrackIndex + 1) % playlist.length;
        loadTrack(playlist[currentTrackIndex]);
        if (isPlaying) audio.play();
    }

    function prevTrack() {
        currentTrackIndex = (currentTrackIndex - 1 + playlist.length) % playlist.length;
        loadTrack(playlist[currentTrackIndex]);
        if (isPlaying) audio.play();
    }

    // Event Listeners
    playPauseButton.addEventListener('click', playPause);
    nextButton.addEventListener('click', nextTrack);
    prevButton.addEventListener('click', prevTrack);

    // Volume Control
    volumeSlider.addEventListener('input', (e) => {
        audio.volume = e.target.value / 100;
    });

    muteButton.addEventListener('click', () => {
        audio.muted = !audio.muted;
        muteButton.querySelector('i').classList.toggle('fa-volume-mute');
        muteButton.querySelector('i').classList.toggle('fa-volume-up');
    });

    // Progress Bar
    audio.addEventListener('timeupdate', updateProgressBar);

    // Shuffle
    shuffleButton.addEventListener('click', () => {
        isShuffled = !isShuffled;
        shuffleButton.classList.toggle('text-green-500');
    });

    // Repeat
    repeatButton.addEventListener('click', () => {
        isRepeating = !isRepeating;
        repeatButton.classList.toggle('text-green-500');
        audio.loop = isRepeating;
    });

    // Like Button
    likeButton.addEventListener('click', () => {
        likeButton.querySelector('i').classList.toggle('far');
        likeButton.querySelector('i').classList.toggle('fas');
    });

    // Auto play next track
    audio.addEventListener('ended', () => {
        if (!isRepeating) nextTrack();
    });

    // Initial track load
    loadTrack(playlist[currentTrackIndex]);
</script>
</body>
</html>



