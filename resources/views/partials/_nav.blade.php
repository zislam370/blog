<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/')? "active":" "}}"><a href="/">Home</a></li>
                <li class="{{Request::is('about')? "active":" "}}"><a href="#">About</a></li>
                <li class="{{Request::is('posts')? "active":" "}}"><a href="{{route('blog.index')}}">Blog</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Account Type
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('posts.index')}}">Admin</a></li>
                        <li><a href="{{route('blog.index')}}">User</a></li>


                    </ul>
                </div>

            </ul>
        </div>
    </div>
</nav>