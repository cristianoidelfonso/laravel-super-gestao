<div class="topo">

    <div class="logo">
        {{-- <a href="{{ route('site.index') }}"><img src="{{ asset('img/logo-ideltech.png') }}"></a> --}}
        <a href="{{ route('site.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('site.index') }}">Principal</a></li>
            <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
            <li><a href="{{ route('site.contato') }}">Contato</a></li>
            @if (url()->current() != route('site.login'))
            <li><a href="{{ route('site.login') }}">Login</a></li>
            @endif
        </ul>
    </div>
</div>
