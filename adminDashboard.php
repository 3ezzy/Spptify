<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Music Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-900">
<div class="flex min-h-screen">
    <!-- Sidebar (Desktop) -->
    <aside id="sidebar" class="hidden md:block w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-8 text-center">Admin Dashboard</h1>

            <nav class="flex-1">
                <ul class="space-y-2">
                    <li>
                        <a href="#users" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-users mr-3"></i>
                            Gérer les Utilisateurs
                        </a>
                    </li>
                    <li>
                        <a href="#playlists" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-list mr-3"></i>
                            Gestion des Playlists
                        </a>
                    </li>
                    <li>
                        <a href="#songs" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-music mr-3"></i>
                            Gestion des Chansons
                        </a>
                    </li>
                    <li>
                        <a href="#analytics" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-chart-line mr-3"></i>
                            Analytiques
                        </a>
                    </li>
                    <!-- Logout Button -->
                    <li class="mt-8">
                        <a href="/logout" class="flex items-center p-3 hover:bg-gray-700 rounded transition text-red-400 hover:text-red-300">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Déconnexion
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Mobile Header -->
    <div class="md:hidden fixed top-0 left-0 right-0 bg-gray-800 text-white p-4 flex justify-between items-center z-50">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>
        <button id="mobile-menu-toggle" class="focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full
            md:hidden w-64 bg-gray-800 text-white transition-transform duration-300 ease-in-out z-50">
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold">Admin</h1>
                <button id="close-sidebar" class="text-white">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="#users" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-users mr-3"></i>
                            Utilisateurs
                        </a>
                    </li>
                    <li>
                        <a href="#playlists" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-list mr-3"></i>
                            Playlists
                        </a>
                    </li>
                    <li>
                        <a href="#songs" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-music mr-3"></i>
                            Chansons
                        </a>
                    </li>
                    <li>
                        <a href="#analytics" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                            <i class="fas fa-chart-line mr-3"></i>
                            Analytiques
                        </a>
                    </li>
                    <!-- Mobile Logout Button -->
                    <li class="mt-8">
                        <a href="/logout" class="flex items-center p-3 hover:bg-gray-700 rounded transition text-red-400 hover:text-red-300">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Déconnexion
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Content remains unchanged -->
    <main class="flex-1 p-4 md:p-10 bg-gray-100 overflow-x-hidden">
        <!-- Users Management Section -->
        <section id="users-management" class="bg-white shadow-md rounded-lg p-4 md:p-6 mb-8">
            <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6">Gestion des Utilisateurs</h2>

            <div class="overflow-x-auto">
                <table class="w-full bg-white">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-xs md:text-sm leading-normal">
                        <th class="py-2 md:py-3 px-2 md:px-6 text-left hidden md:table-cell">ID</th>
                        <th class="py-2 md:py-3 px-2 md:px-6 text-left">Nom</th>
                        <th class="py-2 md:py-3 px-2 md:px-6 text-left hidden md:table-cell">Email</th>
                        <th class="py-2 md:py-3 px-2 md:px-6 text-center">Statut</th>
                        <th class="py-2 md:py-3 px-2 md:px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-xs md:text-sm font-light">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-2 md:py-3 px-2 md:px-6 text-left hidden md:table-cell">1</td>
                        <td class="py-2 md:py-3 px-2 md:px-6 text-left">John Doe</td>
                        <td class="py-2 md:py-3 px-2 md:px-6 text-left hidden md:table-cell">john@example.com</td>
                        <td class="py-2 md:py-3 px-2 md:px-6 text-center">
                            <span class="bg-green-200 text-green-600 py-1 px-2 md:px-3 rounded-full text-xs">Actif</span>
                        </td>
                        <td class="py-2 md:py-3 px-2 md:px-6 text-center">
                            <div class="flex item-center justify-center">
                                <button class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Playlists Management Section -->
        <section id="playlists-management" class="bg-white shadow-md rounded-lg p-4 md:p-6 mb-8">
            <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6">Gestion des Playlists</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                <div class="bg-gray-100 p-3 md:p-4 rounded-lg">
                    <h3 class="font-bold mb-2 md:mb-4">Playlists Populaires</h3>
                    <ul>
                        <li class="flex justify-between items-center mb-2 text-xs md:text-sm">
                            <span>Top Hits 2023</span>
                            <span class="text-xs text-gray-500">1.2M</span>
                        </li>
                        <li class="flex justify-between items-center mb-2 text-xs md:text-sm">
                            <span>Chill Vibes</span>
                            <span class="text-xs text-gray-500">800K</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-gray-100 p-3 md:p-4 rounded-lg">
                    <h3 class="font-bold mb-2 md:mb-4">Playlists Récentes</h3>
                    <ul class="text-xs md:text-sm">
                        <li class="mb-2">Rock Classics</li>
                        <li class="mb-2">Jazz Nights</li>
                        <li class="mb-2">Electronic Beats</li>
                    </ul>
                </div>

                <div class="bg-gray-100 p-3 md:p-4 rounded-lg">
                    <h3 class="font-bold mb-2 md:mb-4">Actions Rapides</h3>
                    <button class="w-full bg-blue-500 text-white py-2 rounded mb-2 text-xs md:text-sm">
                        Créer Playlist
                    </button>
                    <button class="w-full bg-red-500 text-white py-2 rounded text-xs md:text-sm">
                        Supprimer Playlist
                    </button>
                </div>
            </div>
        </section>

        <!-- Analytics Section -->
        <section id="analytics" class="bg-white shadow-md rounded-lg p-4 md:p-6">
            <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6">Analytiques</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                <div class="bg-blue-100 p-3 md:p-4 rounded-lg">
                    <h3 class="font-bold text-sm md:text-base">Utilisateurs Totaux</h3>
                    <p class="text-xl md:text-3xl font-bold text-blue-600">5,420</p>
                </div>

                <div class="bg-green-100 p-3 md:p-4 rounded-lg">
                    <h3 class="font-bold text-sm md:text-base">Chansons Ajoutées</h3>
                    <p class="text-xl md:text-3xl font-bold text-green-600">12,350</p>
                </div>

                <div class="bg-purple-100 p-3 md:p-4 rounded-lg">
                    <h3 class="font-bold text-sm md:text-base">Playlists Créées</h3>
                    <p class="text-xl md:text-3xl font-bold text-purple-600">3,210</p>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    // Mobile Sidebar Toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const closeSidebarBtn = document.getElementById('close-sidebar');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const overlay = document.createElement('div');

    mobileMenuToggle.addEventListener('click', toggleMobileSidebar);
    closeSidebarBtn.addEventListener('click', toggleMobileSidebar);

    function toggleMobileSidebar() {
        mobileSidebar.classList.toggle('-translate-x-full');

        if (!mobileSidebar.classList.contains('-translate-x-full')) {
            // Create overlay
            overlay.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-50', 'z-40');
            document.body.appendChild(overlay);

            // Close sidebar when clicking overlay
            overlay.addEventListener('click', toggleMobileSidebar);
        } else {
            // Remove overlay
            if (document.body.contains(overlay)) {
                document.body.removeChild(overlay);
            }
        }
    }
</script>
</body>
</html>



