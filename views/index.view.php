  
<?php require base_path("views/partials/header.php");?>
<?php require base_path("views/partials/nav.php");?>
<?php require base_path("views/partials/banner.php");?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <p>Home Page</p>



        <!-- Pill -->


        <!-- Base - Left -->

        <a
                class="group relative inline-flex items-center overflow-hidden rounded-sm bg-indigo-600 px-8 py-3 text-white focus:ring-3 focus:outline-hidden"
                href="about"
        >
  <span class="absolute -end-full transition-all group-hover:end-4">
    <svg
            class="size-5 shadow-sm rtl:rotate-180"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
    >
      <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 8l4 4m0 0l-4 4m4-4H3"
      />
    </svg>
  </span>

            <span class="text-sm font-medium transition-all group-hover:me-4"> Download </span>
        </a>








        <div class="bg-white overflow-hidden shadow rounded-lg border">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    User Profile
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    This is some information about the user.
                </p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            John Doe
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            johndoe@example.com
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            (123) 456-7890
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            123 Main St<br>
                            Anytown, USA 12345
                        </dd>
                    </div>
                </dl>
            </div>
        </div>












    </div>
  </main>

<?php require base_path("views/partials/footer.php");?>
