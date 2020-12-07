<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Video Viewer
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{is_active('home')}}">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{is_active('users')}}">
                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{is_active('categories')}}">
                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="material-icons">bubble_chart</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{is_active('skills')}}">
                <a href="{{route('skills.index')}}" class="nav-link">
                    <i class="material-icons">offline_bolt</i>
                    <p>Skills</p>
                </a>
            </li>
            <li class="nav-item {{is_active('tags')}}">
                <a href="{{route('tags.index')}}" class="nav-link">
                    <i class="material-icons">library_books</i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item {{is_active('pages')}}">
                <a href="{{route('pages.index')}}" class="nav-link">
                    <i class="material-icons">content_paste</i>
                    <p>Pages</p>
                </a>
            </li>
            <li class="nav-item {{is_active('videos')}}">
                <a href="{{route('videos.index')}}" class="nav-link">
                    <i class="material-icons">video_call</i>
                    <p>Videos</p>
                </a>
            </li>
            <li class="nav-item {{is_active('messages')}}">
                <a href="{{route('messages.index')}}" class="nav-link">
                    <i class="material-icons">cloud</i>
                    <p>Messages</p>
                </a>
            </li>
            <!-- your sidebar here -->
        </ul>
    </div>
</div>
