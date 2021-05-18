<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">TODO List</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item hand">
                    <span class="nav-link" onclick="create_modal()">Создать задачу</span>
                </li>
            </ul>
            <form class="d-flex" action="{{ route('logout') }}">
                <span class='navbar-text'>
                    Вы вошли как <span class='text-light'>{{ "$surname $name $patronymic" }}</span>
                    <input type="text" id="user-id" value="{{$user_id}}" hidden>
                </span>
                <button class="ms-2 btn btn-outline-light" type="submit">{{ __('Выйти') }}</button>
            </form>
        </div>
    </nav>
</header>
