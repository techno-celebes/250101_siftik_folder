            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item {{ $menu === 'dashboard' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('panel') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
					@if ($role == 2)
	                    <li class="nav-item {{ $menu === 'data-mahasiswa' ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('panel.student-data') }}">
	                            <i class="mdi mdi-bitbucket menu-icon"></i>
	                            <span class="menu-title">Data Akun Mahasiswa</span>
	                        </a>
	                    </li>
	                    <li class="nav-item {{ $menu === 'thesis-application' ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('panel.thesis-application') }}">
	                            <i class="mdi mdi-information menu-icon"></i>
	                            <span class="menu-title">Data Permohonan</span>
	                        </a>
	                    </li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}">
								<i class="mdi mdi-power menu-icon"></i>
								<span class="menu-title">Sign Out</span>
							</a>
						</li>
					@else
	                    <li class="nav-item {{ $menu === 'apply-thesis' ? 'active' : '' }}">
	                        <a class="nav-link" href="{{ route('panel.apply-thesis') }}">
	                            <i class="mdi mdi-bitbucket menu-icon"></i>
	                            <span class="menu-title">Data Permohonan</span>
	                        </a>
	                    </li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}">
								<i class="mdi mdi-power menu-icon"></i>
								<span class="menu-title">Sign Out</span>
							</a>
						</li>
					@endif
                </ul>
            </nav>