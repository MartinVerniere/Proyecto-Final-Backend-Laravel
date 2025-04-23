<div class="navbar-buttons-list">
    <a class="navbar-button" href="{{ url('/') }}">
        <div class="navbar-button-text">
            Inicio
        </div>
    </a>
    <a class="navbar-button" href="{{ route('pacientes.index') }}">
        <div class="navbar-button-text">
            Pacientes
        </div>
    </a>
    <a class="navbar-button" href="{{ route('consultas.index') }}">
        <div class="navbar-button-text">
            Consultas
        </div>
    </a>
</div>
<div class="navbar-user-info">
    <div class="navbar-user-name">
        {{ Auth::user()->name }}
    </div>
    <a class="navbar-button" href="">
        <div class="navbar-button-text">
            Logout
        </div>
    </a>
</div>