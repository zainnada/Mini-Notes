<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                         alt="Your Company" class="size-8"/>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        <?php
                        $active_page_class = "rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white";
                        $normal_page_class = "rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white";
                        ?>
                        <a href="/" aria-current="page" class="
              <?php
                        echo urlIs('/') ? $active_page_class : $normal_page_class;
                        ?>">Home</a>
                        <?php if ($_SESSION['user'] ?? false): ?>
                            <a href="/notes" class="
              <?php
                            echo urlIs('/notes') ? $active_page_class : $normal_page_class;
                            ?>">Notes</a>
                        <?php endif; ?>
                        <a href="/about" class="
              <?php
                        echo urlIs('/about') ? $active_page_class : $normal_page_class;
                        ?>">About Us</a>
                        <a href="/contact" class="
              <?php
                        echo urlIs('/contact') ? $active_page_class : $normal_page_class;
                        ?>">Contact</a>


                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button"
                            class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                             data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <el-dropdown class="relative ml-3">
                        <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                        </button>
                        <!-- my edit -->
                        <?php if ($_SESSION['user'] ?? false): ?>
                            <a href="profile">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10"/>
                            </a>
                        <?php else: ?>
                            <a href="/register" class="
              <?php
                            echo urlIs('/register') ? $active_page_class : $normal_page_class;
                            ?>">Register</a>
                            <a href="/login" class="
              <?php
                            echo urlIs('/login') ? $active_page_class : $normal_page_class;
                            ?>">Log In</a>
                        <?php endif; ?>


                        <el-menu anchor="bottom end" popover
                                 class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Your
                                profile</a>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Settings</a>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Sign
                                out</a>
                        </el-menu>
                    </el-dropdown>
                    <?php if ($_SESSION['user'] ?? false): ?>

                        <form method="POST" action="/session">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit"
                                    class="ml-2 rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-white/5 hover:text-white">
                                Log Out
                            </button>
                        </form>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>

</nav>
