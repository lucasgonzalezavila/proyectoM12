<div class="mt-3 space-y-1">
    <!-- Authentication -->
    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
        @csrf

        <button id="logout" type="submit" class="text-white font-medium bg-red-500 hover:bg-red-600 py-2 px-4 rounded-md">
            Cerrar sesión
        </button>
    </form>
</div>
