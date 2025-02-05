<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs Management - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">
        <!-- Sidebar (Same as before) -->
        <aside id="sidebar" class="hidden md:block w-64 bg-gray-800 text-white flex flex-col">
            <!-- Sidebar content -->
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-10 bg-gray-100 overflow-x-hidden">
            <section id="songs-management" class="bg-white shadow-md rounded-lg p-4 md:p-6 mb-8">
                <h2 class="text-xl md:text-2xl font-bold mb-4 md:mb-6">Gestion des Chansons</h2>

                <div class="overflow-x-auto">
                    <table class="w-full bg-white">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-xs md:text-sm leading-normal">
                                <th class="py-2 md:py-3 px-2 md:px-6 text-left">ID</th>
                                <th class="py-2 md:py-3 px-2 md:px-6 text-left">Titre</th>
                                <th class="py-2 md:py-3 px-2 md:px-6 text-left">Artiste</th>
                                <th class="py-2 md:py-3 px-2 md:px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-xs md:text-sm font-light">
                            <?php foreach ($songs as $song): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-2 md:py-3 px-2 md:px-6 text-left"><?= $song['song_id'] ?></td>
                                    <td class="py-2 md:py-3 px-2 md:px-6 text-left"><?= $song['title'] ?></td>
                                    <td class="py-2 md:py-3 px-2 md:px-6 text-left"><?= $song['artist_id'] ?></td>
                                    <td class="py-2 md:py-3 px-2 md:px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <form action="/admin/delete-song/<?= $song['song_id'] ?>" method="POST" class="inline">
                                                <button type="submit" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>