<div class="row footer">
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Gloops //</h5>
				<a href="{{ route('home') }}">Home</a>
				<a href="{{ route('library') }}">Library</a>
				<a href="" id="activate-modal-2">Videos</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Pages //</h5>
				<a href="{{ route('profile') }}">Your account</a>
				<a href="{{ route('station') }}">Your station</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Loops //</h5>
				<a href="{{ route('library') }}">Listen loops</a>
				<a href="{{ route('station') }}">Your loops</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3">
			<div class="sub-footer">
				<h5>Social Media //</h5>
				<a href="https://www.facebook.com/sharer/sharer.php?app_id=573073939530144&amp;sdk=joey&amp;u=http%3A%2F%2Fwww.g-loops.com%2F&amp;display=popup&amp;ref=plugin&amp;src=share_button" target="_blank" id="u_0_1"class="_2vmz btn-floating waves-effect waves-light btn-small facebook-button">
			    	<i class="fa fa-facebook"></i> 
			    </a>
			    <a href="" target="_blank" class="btn-floating waves-effect waves-light btn-small youtube-button">
			    	<i class="fa fa-youtube"></i> 
			    </a>
				
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