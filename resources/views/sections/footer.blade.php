<div class="row footer">
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Gloops //</h5>
				<a href="{{route('home')}}">Home</a>
				<a href="{{route('library')}}">Library</a>
				<a href="" id="activate-modal-2">Videos</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Station //</h5>
				<a href="{{route('profile')}}">Your account</a>
				<a href="https://gloops-alpha-jimpeeters.c9users.io/station">Your station</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Loops //</h5>
				<a href="#">Most popular</a>
				<a href="#">Most recent</a>
				<a href="#">Your loops</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Categories //</h5>
				<a href="#">Blues</a>
				<a href="#">Pop</a>
				<a href="#">Rock</a>
				<a href="#">Country</a>
				<a href="#">Flamenco</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="search">
				<form>
		            <a href="" class="round-button search-button">
		                <i class="fa fa-search"></i>
		            </a>
		            <input 
			            class="search-input"
			            type="text" 
	                    ng-model="query" 
	                    ng-model-options='{ debounce: 500 }' 
	                    id="search-input" 
	                    ng-change="setQueryValue(query); searchOnTags(query); searchOnCategory(query); searchOnLoopname(query)"
	                    placeholder="Search loops"/>
			    </form>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<a class="email-link" href="#">
				<i class="fa fa-envelope-o"></i>jim.peeters.93&amp;gmail.com
			</a>
			
			@if(Auth::check() && Auth::user()->id == 1)
				<a class="copyright-text" href="/admin">Admin options</a>
			@else
				<p class="copyright-text">&copy; 2013 Studio6, Inc. All rights reserved</p>
			@endif
		</div>
</div>