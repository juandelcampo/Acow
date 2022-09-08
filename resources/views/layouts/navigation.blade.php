<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Settings Dropdown -->
    <section class="">
        <div class="sm:items-center px-6 pt-6 ">
            <x-dropdown width="48">
                <x-slot name="trigger" class="">
                    <button class="px-6 right-0 inline-flex items-center px-4 py-2 bg-gray-1000 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <!-- Content -->
                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </section>
    <!-- Primary Navigation Menu -->
    <section>
    <div class=" ">
        <div class="flex ">
            <div class="">
                <!-- Logo -->
                <div class="pt-16 flex  items-center content-center justify-center ">
                    <div   >
                        <a href="{{ __('/') }}"><img  src="images/logo.png"  alt="Logo ACOW"  width = '100' class="center"></a>
                    </div>
                </div>
                <!-- Navigation Links -->
                <header class="nav-menu text-center justify-center">
                    <ul id="menu-topo" class= "pt-8">
                        <li class="nav-item font-header"><x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link></li>
                        <li >•</li>
                        <li class="nav-item font-header"><x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories')">
                            {{ __('Categories') }}
                        </x-nav-link></li>
                        <li >•</li>
                        <li class="nav-item font-header"><x-nav-link :href="route('authors.index')" :active="request()->routeIs('authors')">
                            {{ __('Authors') }}
                        </x-nav-link></li>
                        <li >•</li>
                        <li class="nav-item font-header"><x-nav-link :href="route('quotes.index')" :active="request()->routeIs('quotes')">
                            {{ __('Quotes') }}
                        </x-nav-link></li>
                    </ul>


    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t  text-center">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</section>

</nav>
