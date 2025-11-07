<?php require base_path("views/partials/header.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<main>

    <div class="flex min-h-full flex-col justify-center px-6 py-4 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                 alt="Your Company" class="mx-auto h-10 w-auto"/>
            <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register for a new
                account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/register" method="POST" class="space-y-6">

                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Full Name</label>
                    <div class="mt-2">
                        <input id="name" value="<?= htmlspecialchars(old('name')) ?>" type="text" name="name"
                               required
                               autocomplete="name"
                               class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm"/>
                    </div>
                    <?php if (isset($errors['name'])): ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" value="<?= htmlspecialchars(old('email')) ?>" type="email" name="email"
                               required
                               autocomplete="email"
                               class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm"/>
                    </div>
                    <?php if (isset($errors['email'])): ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex gap-4">
                    <label for="gender" class="block text-sm/6 mt-2 font-medium text-gray-900">Gender</label>
                    <label
                            for="male"
                            class="flex items-center gap-2 cursor-pointer p-2 rounded-lg border border-gray-300 hover:bg-gray-50"
                    >
                        <input type="radio" name="gender" id="male" value="Male"
                               class="text-blue-600 focus:ring-blue-500" <?= strtolower(old('gender')) === 'male' ? 'checked' : '' ?>/>
                        <span class="text-sm text-gray-700">Male</span>
                    </label>

                    <label
                            for="female"
                            class="flex items-center gap-2 cursor-pointer p-2 rounded-lg border border-gray-300 hover:bg-gray-50"
                    >
                        <input type="radio" name="gender" id="female" value="Female"
                               class="text-pink-600 focus:ring-pink-500" <?= strtolower(old('gender')) === 'female' ? 'checked' : '' ?>/>
                        <span class="text-sm text-gray-700">Female</span>
                    </label>
                </div>
                <?php if (isset($errors['gender'])): ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['gender'] ?></p>
                <?php endif; ?>


                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                <div class="mt-2">
                    <lable for="birthdate" class="block text-sm/6 font-medium text-gray-900">Birthdate</lable>
                    <div class="mt-2">
                        <input id="birthdate"
                               name="birthdate"
                               class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm"
                               type="text"
                               placeholder="Select a date"
                               value="<?= htmlspecialchars(old('birthdate')) ?>"
                        >
                    </div>
                    <?php if (isset($errors['birthdate'])): ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['birthdate'] ?></p>
                    <?php endif; ?>

                </div>
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script>
                    flatpickr("#birthdate", {
                        maxDate: "2015-12-31",
                        minDate: "1950-01-01",
                    });
                </script>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" required
                               autocomplete="current-password"
                               class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm"/>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="confirm_password" class="block text-sm/6 font-medium text-gray-900">Confirm
                            Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="confirm_password" type="password" name="confirm_password" required
                               autocomplete="current-password"
                               class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm"/>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>


                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Register
                    </button>
                </div>
            </form>

        </div>

    </div>
    <br><br><br>

</main>

<?php require base_path("views/partials/footer.php"); ?>