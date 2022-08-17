<nav class = 'navbar navbar-expand-sm navbar-dark bg-dark'>
        <div class = 'container-fluid'>
            <a class = 'navbar-brand' href='/'>Blogs</a>
            <div class = 'collapse navbar-collapse'>
                <form class = 'me-2' action='/user/index' method='GET'>
                    @csrf
                    <button type='submit' class='btn btn-primary'>Users</button> 
                </form>
                <form class='d-flex' action="/search" method='GET'>
                    @csrf
                    <input type='text' class='form-control me-2' placeholder='Enter blog title...' name='title'>
                    <button type='submit' class='btn btn-primary'>Search</button>
                </form>
                <form class = 'd-flex ms-auto' action='/posts/create' method='POST'>
                    @csrf
                    <button type='submit' class='btn btn-primary bg-white text-dark'>
                    <i class="h5 bi bi-folder-plus"></i> Create-Post
                    </button>
                </form>
                @if(!Auth::check())
                    <a class = 'd-flex ms-4 text-white' href='/login'><i class="bi bi-box-arrow-in-left"></i> Login</a>
                @else
                    <a class = 'd-flex ms-4 text-white' href='/posts/blog'><span class='glyphicon glyphicon glyphicon-tag'> My-Blog</span></a>
                    <a class = 'd-flex ms-4 text-white' href='/user/notifications'><i class="bi bi-bell"></i></a>
                    <a class = 'd-flex ms-4 text-white' href='/user/view/{{ Auth::id() }}'><i class="bi bi-person-circle"></i></span></a>
                    <a class = 'd-flex ms-4 text-white' href='/logout'><i class="bi bi-box-arrow-right"></i> Logout</a>
                @endif
            </div>
        </div>
    </nav>