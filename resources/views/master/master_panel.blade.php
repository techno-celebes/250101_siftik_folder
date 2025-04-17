@extends('master.master')

@section('main.content')
    <div class="container-scroller" id="app">
        <!-- partial:partials/_navbar.html -->
		@include('panel.layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
				@include('panel.layouts.setting_main')

				@include('panel.layouts.sidebar')

            <div class="main-panel">
				@yield('content_master_panel')

				@include('panel.layouts.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
	<div class="container">
	</div>
@endsection