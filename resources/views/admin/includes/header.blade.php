<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.blog') }}">
                        {{ __('Blog') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.posts') }}">
                        {{ __('Posts') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.comments') }}">
                        {{ __('New comments') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.cabinet') }}">
                        {{ __('Admin panel') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.login') }}">
                        {{ __('Exit') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>