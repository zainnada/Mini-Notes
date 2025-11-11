<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php //require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <?php if ($_SESSION['_flash']['user_registration'] ?? false): ?>
            <?php
            $message = '✅ You have been registered, Welcome to our website.';
            require base_path("views/partials/alert/alertBox.php");
            ?>
        <?php endif; ?>

        <div class="container relative flex flex-col justify-between h-full max-w-6xl px-10 mx-auto xl:px-0 mt-0">
            <!-- Hero Section -->
            <h2 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900">Welcome to Mini-Notes</h2>
            <p class="mb-6 text-lg text-gray-500">Capture your ideas, tasks, and memories in one secure place.
                Writing notes helps organize your thoughts and boosts productivity.</p>
            <div class="w-full">
                <!-- Benefits Section -->
                <div class="flex flex-col w-full mb-10 sm:flex-row">
                    <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
                        <div class="relative h-full ml-0 mr-0 sm:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-indigo-500 rounded-lg"></span>
                            <div class="relative h-full p-5 bg-white border-2 border-indigo-500 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Boost Memory & Recall</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-indigo-500 uppercase">------------</p>
                                <p class="mb-2 text-gray-600">Writing notes helps you remember information better
                                    and enhances learning.</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2">
                        <div class="relative h-full ml-0 md:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-purple-500 rounded-lg"></span>
                            <div class="relative h-full p-5 bg-white border-2 border-purple-500 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Stay Organized</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-purple-500 uppercase">------------</p>
                                <p class="mb-2 text-gray-600">Keep all your tasks, ideas, and reminders in one place
                                    for clarity and focus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full mb-5 sm:flex-row">
                    <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
                        <div class="relative h-full ml-0 mr-0 sm:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-400 rounded-lg"></span>
                            <div class="relative h-full p-5 bg-white border-2 border-blue-400 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Enhance Productivity</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-blue-400 uppercase">------------</p>
                                <p class="mb-2 text-gray-600">Track your progress and manage your time
                                    efficiently.</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
                        <div class="relative h-full ml-0 mr-0 sm:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-yellow-400 rounded-lg"></span>
                            <div class="relative h-full p-5 bg-white border-2 border-yellow-400 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Capture Ideas
                                        Instantly</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-yellow-400 uppercase">------------</p>
                                <p class="mb-2 text-gray-600">Never lose a thought—record ideas the moment they come
                                    to mind.</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2">
                        <div class="relative h-full ml-0 md:mr-10">
                            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-green-500 rounded-lg"></span>
                            <div class="relative h-full p-5 bg-white border-2 border-green-500 rounded-lg">
                                <div class="flex items-center -mt-1">
                                    <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">Reflect & Learn</h3>
                                </div>
                                <p class="mt-3 mb-1 text-xs font-medium text-green-500 uppercase">------------</p>
                                <p class="mb-2 text-gray-600">Review your notes regularly to gain insights and
                                    improve decision-making.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <?php if ($_SESSION['user'] ?? false): ?>
            <div class="flex items-center justify-center gap-x-6">
                <a href="/notes"
                   class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    📝 Go to your Notes
                </a>
            </div>
        <?php else: ?>
            <div class="flex items-center justify-center gap-x-6">
                <a href="/register"
                   class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    ✨ Create your account
                </a>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>
