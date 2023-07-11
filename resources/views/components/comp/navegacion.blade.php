<x-comp.plantilla>
<div class="">
    <div class="color-principal pl-2 flex py-4 space-x-1">
        <div class="px-2">
            Logo
        </div>
        <div class="grow text-center">
            <ul class=" flex space-x-4">
                <li>
                    <a class="item-nav" href="{{ route('empresa') }}" :active="request()->routeIs('empresa')">Empresa
                    </a>
                </li>
               
                <li>Usuarios</li>
            </ul>
        </div>

        <div class="px-4 ">
            <div class=" group">
                <div class=" w-40 ">
                        <div class="flex justify-end">
                            <img class=" h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                </div>
                <div class="pt-3 absolute w-full hidden group-hover:flex flex-col hover:flex">
                    <div class="font-medium text-sm text-gray-100">{{ Auth::user()->email }}</div>
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
    
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
    
                        <x-responsive-nav-link href="{{ route('logout') }}"
                                       @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-red-500 w-full">

    </div>
</div>
<div>
    {{$slot}}
 </div>
</x-comp.plantilla>