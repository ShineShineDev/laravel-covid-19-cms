<aside class="panel  p-2 hide_moblie" style="background-color: inherit;">
    <h5 class="text-info">Dashboard</h5>
    <ul class="list-group box-shadow">
        <li class="list-group-item p-2   border-left-0 border-right-0 border-top-0 rounded-0" style="background-color: inherit;">
            <a href="{{ route('dashboard.index') }}" class="text-info" style="text-decoration: none;">Home
                <i class="material-icons float-right text-primary">home</i>
            </a>
        </li>
        <li class="list-group-item p-2   border-left-0 border-right-0 border-top-0 rounded-0" style="background-color: inherit;">
            <a href="{{ route('situation.index') }}" class="text-info" style="text-decoration: none;">Covid-19 Situation</a>
            <i class="material-icons float-right text-primary">add</i>
            <ul class="list-group mt-2">
                <li class="list-group-item p-2 text-white border-right-0 border-left-0  border-top-0 rounded-0" style="background-color: inherit;">
                    <a href="{{ route('active.index') }}" class="text-info" style="text-decoration: none;">Active Cases</a>
                    <i class="material-icons float-right text-primary" style="font-size: 15px;">check_circle_outline</i>
                </li>
                <li class="list-group-item p-2 text-white border-right-0 border-top-0 border-left-0 " style="background: inherit;">
                    <a href="{{ route('death.index') }}" class="text-info" style="text-decoration: none;">Deaths</a>
                    <i class="material-icons float-right text-primary" style="font-size: 15px;">warning</i>
                </li>
                <li class="list-group-item p-2 text-white border-right-0 border-top-0 border-left-0  rounded-0 " style="background: inherit;">
                    <a href="{{ route('recovered.index') }}" class="text-info" style="text-decoration: none;">Recovered Cases</a>
                    <i class="material-icons float-right text-primary" style="font-size: 15px;">verified_user</i>
                </li>
            </ul>
        </li>
        <li class="list-group-item  p-2 border-left-0 border-right-0 border-top-0" style="background-color: inherit;">
            <a  href="{{ url('admin/knowledge') }}" class="text-info" style="text-decoration: none;">Knowledge
                <i class="material-icons float-right text-primary">video_library</i>
            </a>
        </li>
        <li class="list-group-item p-2   border-left-0 border-right-0 border-top-0" style="background-color: inherit;">
            <a href="{{ route('admin_news.index') }}" class="text-info" style="text-decoration: none;">News
                <i class="material-icons float-right text-primary">menu_book</i>
            </a>
        </li>

        <li class="list-group-item p-2  border-left-0 border-right-0 border-top-0" style="background-color: inherit;">
            <a href="{{ route('feedback.index') }}" class="text-info" style="text-decoration: none;">FeedBack
                <i class="material-icons float-right text-primary">announcement</i>
            </a>
        </li>
        <li class="list-group-item p-2  border-left-0 border-right-0 border-top-0" style="background-color: inherit;">
            <a href="{{ route('visitor.index') }}" class="text-info" style="text-decoration: none;">Visitor Track
                <i class="material-icons float-right text-primary">find_replace</i>
            </a>
        </li>
        <li class="list-group-item p-2  border-left-0 border-right-0 border-top-0" style="background-color: inherit;">
            <a href="{{ route('user.index') }}" class="text-info" style="text-decoration: none;">Users
                <i class="material-icons float-right text-primary">people</i>
            </a>
        </li>
        <li class="list-group-item p-2 rounded-0  border-left-0 border-right-0 border-top-0" style="background-color: inherit;">
            <a href="" class="text-info" style="text-decoration: none;">
                <a class="text-info" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <i class="material-icons float-right text-primary">logout</i>
            </a>
        </li>
    </ul>
</aside>