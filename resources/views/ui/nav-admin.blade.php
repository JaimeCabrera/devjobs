<li class="nav-item">
    <a class="nav-link {{Request::is('vacants') ? ' active bg-danger text-white' :'text-dark'}}" href="{{ route('vacants.index') }}">Ver vacantes</a>
</li>
<li class="nav-item">
    <a class="nav-link  {{Request::is('vacants/create') ? ' active bg-danger text-white' :'text-dark'}}" href="{{ route('vacants.create') }}">Nueva vacante</a>
</li>
<li class="nav-item">
    <a class="nav-link  {{Request::is('notifications') ? ' active bg-danger text-white' :'text-dark'}}"
        href="{{ route('notifications') }}">Notificaciones</a>
</li>


