<x-comp.plantilla>
<div class=" w-full">
    <div class="color-principal pl-2 flex flex-col sm:flex-row py-4 space-x-1">
        <div class="px-2 flex justify-between">
            Logo
            <div class="px-4  sm:hidden">
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
        <div class="grow sm:text-center">
            <x-icon name="menu" class="text-white w-5 h-5 peer" />

            <ul class="hidden peer-hover:flex hover:flex sm:flex flex-col sm:flex-row sm:space-x-4 ">
                <li>
                    <a class="item-nav" href="{{ route('empresa') }}" :active="request()->routeIs('empresa')">Empresa
                    </a>
                </li>
                <li>
                    <a class="item-nav" href="{{ route('producto') }}" :active="request()->routeIs('producto')">Producto
                    </a>
                </li>
                <li>
                    <a class="item-nav" href="{{ route('cliente') }}" :active="request()->routeIs('cliente')">Clientes
                    </a>
                </li>
               <!-- <li>
                    <a class="item-nav" href="{{ route('venta') }}" :active="request()->routeIs('venta')">Venta
                    </a>
                </li>
                <li>
                    <a class="item-nav" href="{{ route('venta') }}" :active="request()->routeIs('venta')">Administrador
                    </a>
                </li>-->
                
            </ul>
        </div>

        <div class="px-4 hidden sm:flex ">
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
<div class="my-4 ">
    {{$slot}}
 </div>
</x-comp.plantilla>