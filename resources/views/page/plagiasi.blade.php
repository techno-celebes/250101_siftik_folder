@extends('master.master_home')
@section('main_home_content')
    <div class="container py-3">
        <div class="breadcrumb">
            <ol class="breadcrumb d-flex flex-column">
                <li class="breadcrumb-item"><a href="#">Layanan</a></li> <br>
                <li class="breadcrumb-item active tujuan" aria-current="page">Cek Plagiasi</li>
            </ol>
        </div>
        <div class="col-lg-12 py-5">
            <form method="POST" action="">
                <textarea class="form-control" cols="100" rows="3"></textarea>
                <button type="submit" class="btn btn-primary my-3">Cek Plagiarism</button>
            </form>
        </div>
    </div>
@endsection