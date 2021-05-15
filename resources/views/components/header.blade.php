<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">TODO List</a>
            <form class="d-flex" action="{{ route('logout') }}">
                <span class='navbar-text'>
                    Вы вошли как <span class='text-light'>{{ "$surname $name $patronymic" }}</span>
                </span>
                <button class="ms-2 btn btn-outline-light" type="submit">{{ __('Выйти') }}</button>
            </form>
        </div>
    </nav>
</header>
