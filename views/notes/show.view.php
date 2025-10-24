<?php require base_path("views/partials/header.php");?>
<?php require base_path("views/partials/nav.php");?>
<?php require base_path("views/partials/banner.php");?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p>
        <h1 class="text-2xl font-bold mb-4 tracking-tight text-gray-900"><?=htmlspecialchars($note['title'])?></h1>
        <?=htmlspecialchars($note['body'])?>
      </p>
      <footer class="mt-6">
        <a href="/note/edit?id=<?=$note['id']?>" class="rounded-md bg-gray-500 px-5 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Edit</a>
        <form class="mt-2" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="<?=$note['user_id']?>">
          <button class="text-white mt-2 rounded-md bg-red-500 px-3 py-2 text-sm font-semibold shadow hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Delete</button>
        </form>

        <p class="mt-6">
          <a href="/notes" class="text-blue-800 underline">go back</a>
        </p>
      </footer>
    </div>
  </main>

<?php require base_path("views/partials/footer.php");?>
