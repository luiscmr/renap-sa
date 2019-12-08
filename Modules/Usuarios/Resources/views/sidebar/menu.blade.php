@hasrole('Super Admin')
<li class="nav-item has-treeview {!! printIfRequestIs('usuarios*', 'menu-open') !!}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Sistema de Usuarios
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('dashboard.usuarios.index')}}" class="nav-link {!! printIfRequestIn(['usuarios/usuarios*'], 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('dashboard.roles.index')}}" class="nav-link {!! printIfRequestIs('usuarios/roles*', 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('dashboard.permisos.index')}}" class="nav-link {!! printIfRequestIs('usuarios/permisos*', 'active') !!}">
                <i class="far fa-circle nav-icon"></i>
                <p>Permisos</p>
            </a>
        </li>
    </ul>
</li>
@else 
<li class="nav-item">
    <a href="{{route('dashboard.usuarios.index')}}" class="nav-link {{printIfRequestIs('usuarios*','active')}}">
        <i class="nav-icon far fa-image"></i>
        <p>
            Usuarios
        </p>
    </a>
</li>
@endhasrole