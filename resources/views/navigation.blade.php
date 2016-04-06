<img class="header-decoration" src="images/header-decoration.png">
<div class="row header">
        <div class="col-xs-4">
            <a href="/">
             <img class="logo" src="images/logo.png" alt="Gloops Logo">
            </a>
        </div>
</div>

<div class="row navigation">

        <div class="col-xs-2">
            <!-- Library -->
            <div class="center-content">
                <a href="{{route('library')}}" class="turn-button tick"></a>
                <p>Library</p>
            </div>

        </div>
        <div class="col-xs-2">
            <!-- My Loops -->
            <div class="center-content">
                <a href="{{route('station')}}" class="turn-button tick"></a>
                <p>Station</p>
            </div>
        </div>
        <div class="col-xs-2">
            <!-- My Account -->
            <div class="center-content">
                <a href="{{route('profile')}}" class="turn-button tick"></a>
                <p>Profile</p>
            </div>
        </div>

        <div class="col-xs-2">
            <!-- Search -->
            <form>
                <div class="center-content">
                    <a href="#" id="search-button" class="round-button">
                        <i class="fa fa-search"></i>
                    </a>
                    <input type="text" id="search-input" class="closed" placeholder="Search loops"/>
                    <p>Search</p>
                </div>
            </form>

        </div>

        <div class="col-xs-2 col-xs-offset-2">
            <div class="center-content">
                @if(Auth::check())
                    <a id="login-button" href="{{route('getLogout')}}" class="round-button green">
                        <i class="fa fa-sign-out"></i>
                    </a>
                    <div id="login-light" class="bg-green"></div>
                    <p id="login-text">Logout</p>
                @else
                    <a id="login-button" href="" class="round-button" data-toggle="modal" data-target="#registerModal">
                        <i class="fa fa-sign-in"></i>
                    </a>
                    <div id="login-light"></div>
                    <p id="login-text">Login</p>
                @endif
            </div>

        </div>
</div>

<!-- Register modal -->

@include('auth.login')