<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
        <h1 class="text-2xl font-bold mb-4 tracking-tight text-gray-900"><?= htmlspecialchars($message['name']) ?></h1>
        email: <?= htmlspecialchars($message['email']) ?>
        <br>
        message: <?= htmlspecialchars($message['message']) ?>
        </p>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>
