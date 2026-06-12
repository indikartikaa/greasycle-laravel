<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
    @stack('styles')
</head>
<body class="overflow-x-hidden min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- KONTEN DINAMIS --}}
    <div class="grow w-full">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    @include('layouts.footer')

    {{-- MODAL LOGIN / REGISTER --}}
    @include('layouts.auth-modal')

    @stack('scripts')
</body>
</html>