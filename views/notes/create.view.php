<?php require base_path("views/partials/header.php");?>
<?php require base_path("views/partials/nav.php");?>
<?php require base_path("views/partials/banner.php");?>

<main>
  <div class="flex justify-center px-4 py-6 sm:px-6 lg:px-8">
    <form method="POST" action="/notes/create" class="w-full max-w-md bg-white p-6 rounded-xl shadow-md">
      <div class="col-span-full">
        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
        <div class="mt-2">
          <textarea 
            id="title" 
            name="title"
            rows="3" 
            placeholder="Write the title of the notes" 
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm"
          ><?php
            if (!empty($errors)){
              if (strlen($_POST['title'])>0);
              echo $_POST['title'];
            }
          ?></textarea>
        </div>
        <label for="body" class="mt-5 block text-sm font-medium text-gray-900">Body</label>
        <div class="mt-2">
          <textarea 
            id="body" 
            name="body" 
            rows="3" 
            placeholder="Write some notes.."   
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm"
          ><?php
            if (!empty($errors)){
              if (strlen($_POST['body'])>0);
              echo $_POST['body'];
            }
          ?></textarea>
          <?php if (!empty($errors)):?>
          <p class="text-red-500 text-xs mt-2"><?=$errors['body']?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Save</button>
      </div>

    </form>
    
  </div>
</main>

<?php require base_path("views/partials/footer.php");?>
