
<nav class="navbar navbar-expand-lg sticky-top w-100 pl-md-5 pr-md-5" style="position:fixed;background-image: url('{{ asset('imgs/service-bg.jpg') }}');background-size: cover;">
    <a class="navbar-brand" href="#">MmCovid</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="material-icons text-info">apps</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link mr-3" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-3" href="{{ url('situation') }}">Situation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-3" href="{{ url('news') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-2" href="{{ route('knowledge.index') }}">Knowledge</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mr-3" href="{{ url('feedback') }}">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-3" href="{{ url('about') }}">About</a>
                </li>
            </ul>
        </form>
    </div>

</nav>
