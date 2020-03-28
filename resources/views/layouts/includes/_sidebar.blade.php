		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/ipolt" @yield('ipolt')><i class="lnr lnr-home"></i> <span>Data OLT</span></a></li>
						@if(auth()->user()->role=='admin')
						<li><a href="/pengaturan" @yield('manajemen') ><i class="lnr lnr-code"></i> <span>Manajemen User</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->