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
<div class="row navigation">
    <div class="col-md-12">
        <div id="menu">
            <ul>
                <li class="{{{ (Request::is('home') ? 'active' : '') }}}">
                    <a href="{{ route('home') }}">
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{{ (Request::is('library') ? 'active' : '') }}}">
                    <a href="{{ route('library') }}">
                        <span>Library</span>
                    </a>
                </li>
                <li class="{{{ (Request::is('station') ? 'active' : '') }}}">
                    <a href="{{ route('station') }}">
                        <span>Station</span>
                    </a>
                </li>
                <li class="{{{ (Request::is('profile') ? 'active' : '') }}}">
                    <a href="{{ route('profile') }}">
                        <span>Profile</span>
                    </a>
                </li>
                <li class="mobile-search">
                    <input 
                        type="text" 
                        ng-model="query" 
                        ng-model-options='{ debounce: 500 }' 
                        id="search-input" 
                        ng-change="setQueryValue(query); searchOnTags(query); searchOnCategory(query); searchOnLoopname(query)" 
                        class="closed"
                        placeholder="&#xF002; Search loops"
                        style="font-family:AUdimat, FontAwesome"/>
                </li>
                <li class="search">
                    <a class="search-button" href="" ng-click="searchActive = !searchActive">
                        <span><i class="fa fa-fw fa-search"></i> Search</span>
                    </a>
                    <input 
                        type="text" 
                        ng-model="query" 
                        ng-model-options='{ debounce: 500 }' 
                        id="search-input" 
                        ng-change="setQueryValue(query); searchOnTags(query); searchOnCategory(query); searchOnLoopname(query)" 
                        class="closed"
                        placeholder="Search guitar loops"
                        ng-show="searchActive"/>
                </li>
                @if(Auth::check())
                    <li class="logout-button"><a href="{{route('getLogout')}}"><span>Logout</span></a></li>
                    <li class="avatar-section">
                        <a href="{{ route('profile') }}">
                            @if(Auth::user()->facebook_profile_picture != null)
                                <div class="avatar" style="background-image:url({{ Auth::user()->facebook_profile_picture }})">
                            @else
                                <div class="avatar" style="background-image:url({{Auth::user()->avatar}})">
                            @endif
                                <span><i class="fa fa-bolt"></i>{{ Auth::user()->rating }}</span>
                            </div>
                        </a>
                    </li>
                @else
                    <li class="login-button"><a href="" data-toggle="modal" data-target="#loginModal"><span>Login</span></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
