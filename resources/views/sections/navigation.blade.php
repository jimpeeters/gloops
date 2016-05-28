<div class="row header">
    <div class="col-xs-4">
        <a href="{{ route('home') }}">
            <img class="logo" src="/images/Logo.png" alt="Gloops Logo">
        </a>
    </div>
    <div class="col-xs-8 col-sm-offset-4 col-sm-4">
        <p class="quote visible-xs-sm hidden-md hidden-lg">"Listen, share, and manage guitar loops. Start jamming right now!"</p>
        <p class="quote visible-md-lg hidden-xs hidden-sm">"A place to listen, share, and manage guitar loops. Start jamming on guitar loops right now!"</p>
    </div>
</div>

<div class="row navigation" ng-class="{ 'overheating' : isOverheating() }">

        <div class="col-xs-2">
            <!-- Library -->
            <div class="center-content">
                <a href="{{ route('library') }}" class="turn-button tick {{{ (Request::is('library') ? 'on' : '') }}}"></a>
                <p>Library</p>
            </div>

        </div>
        <div class="col-xs-2">
            <!-- My Loops -->
            <div class="center-content">
                <a href="https://g-loops.com/station" class="turn-button tick {{{ (Request::is('station') ? 'on' : '') }}}"></a>
                <p>Station</p>
            </div>
        </div>
        <div class="col-xs-2">
            <!-- My Account -->
            <div class="center-content">
                <a href="{{ route('profile') }}" class="turn-button tick {{{ (Request::is('profile') ? 'on' : '') }}}"></a>
                <p>Profile</p>
            </div>
        </div>

        <div class="col-xs-2">
            <!-- Search -->
            <div class="center-content">
                <a href="#" id="search-button" class="round-button">
                    <i class="fa fa-search"></i>
                </a>
                <input 
                    type="text" 
                    ng-model="query" 
                    ng-model-options='{ debounce: 500 }' 
                    id="search-input" 
                    ng-change="setQueryValue(query); searchOnTags(query); searchOnCategory(query); searchOnLoopname(query)" 
                    class="closed" 
                    placeholder="Search loops"
                    />
                <p>Search</p>
            </div>

        </div>

        <div class="col-xs-2 col-xs-offset-2">
            <div class="center-content">
                @if(Auth::check())
                    <a id="login-button" href="{{route('getLogout')}}" class="round-button green-button">
                        <i class="fa fa-sign-out"></i>
                    </a>
                    <div id="login-light" class="bg-green"></div>
                    <p id="login-text">Logout</p>
                @else
                    <a id="login-button" href="" class="round-button" data-toggle="modal" data-target="#loginModal">
                        <i class="fa fa-sign-in"></i>
                    </a>
                    <div id="login-light"></div>
                    <p id="login-text">Login</p>
                @endif
            </div>

        </div>
</div>