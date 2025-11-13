<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main class="mx-auto max-w-5xl px-6 py-12 text-gray-700">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Contact Us</h1>
        <p class="text-lg mb-8">
            Have a question, suggestion, or issue? We'd love to hear from you.
            Fill out the form below or reach us directly via email.
        </p>

        <?php if ($_SESSION['_flash']['success'] ?? false): ?>
            <?php
            $message = "✅ Success, {$_SESSION['_flash']['success']}.";
            require base_path("views/partials/alert/alertBox.php");
            ?>
        <?php endif; ?>


        <form action="/contact" method="POST" class="space-y-5 max-w-lg">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input type="text" id="name" name="name" <?= ($_SESSION['user'] ?? false) ? 'readonly' : 'required'; ?>
                       value="<?= htmlspecialchars(old('name', $_SESSION['user']['name'] ?? '')) ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <?php if (isset($errors['name'])): ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['name'] ?></p>
            <?php endif; ?>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email"
                       name="email" <?= ($_SESSION['user'] ?? false) ? 'readonly' : 'required'; ?>
                       value="<?= htmlspecialchars(old('email', $_SESSION['user']['email'] ?? '')) ?>"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <?php if (isset($errors['email'])): ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="4" required
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"><?= htmlspecialchars(old('message') ?? '') ?></textarea>
                <?php if (isset($errors['message'])): ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['message'] ?></p>
                <?php endif; ?>
                <?php if (isset($errors['limit'])): ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['limit'] ?></p>
                <?php endif; ?>

            </div>

            <button type="submit"
                    class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                ✉️ Send Message
            </button>
        </form>

        <div class="mt-12 text-gray-600">
            <p>📧 Email: <a href="mailto:zain@example.com" class="text-indigo-600 hover:underline">zain@example.com</a>
            </p>
            <p>🌐 GitHub: <a href="https://github.com/zainnada/Mini-Notes" class="text-indigo-600 hover:underline"
                            target="_blank">Mini-Notes Repository</a></p>
        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>