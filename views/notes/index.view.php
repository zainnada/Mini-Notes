<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="text-2xl font-bold tracking-tight text-gray-900">My Notes..</p><br>
        <ul>
            <?php foreach ($notes as $note): ?>
                <a href="/note?id=<?= htmlspecialchars($note["id"]) ?>" class="text-blue-800 hover:underline">
                    <li>
                        <?= $note['title'] ?>
                    </li>
                </a>
            <?php endforeach; ?>
        </ul>
        <p class="mt-6">
            <a href="notes/create" class="text-green-700 text-xl hover:underline">Create a Note</a>
        </p>
    </div>
</main>

<?php require base_path("views/partials/footer.php"); ?>
