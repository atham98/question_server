
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <a class="navbar-brand" href="/">&#8834;&#9898;&#9898;&#9898;&#8835;</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Главный</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/logout">Выход из админ панели</a>
            </li>
        </ul>
        {{--<form class="form-inline my-2 my-lg-0">--}}
            {{--<input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">--}}
            {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>--}}
        {{--</form>--}}
    </div>
</nav>
