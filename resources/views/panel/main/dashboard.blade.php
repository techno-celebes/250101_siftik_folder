@extends('master.master_panel')
<script>
    window.authUser = @json(auth()->user());
</script>
@section('content_master_panel')
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12" id="app">
                    		<main-app-component></main-app-component>
                        </div>
                    </div>
                </div>
@endsection

@section('main.helper-footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection