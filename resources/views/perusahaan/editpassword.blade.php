@extends('template.master')
@section('title', 'forms')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-6">
            <div class="col-12">
                <div class="card shadow-lg">
                    <img src="../../assets/img/shapes/pattern-left.png" alt="pattern-lines"
                        class="position-absolute overflow-hidden opacity-4 start-0 top-0 h-100 border-radius-xl">
                    <img src="../../assets/img/shapes/pattern-right.png" alt="pattern-lines"
                        class="position-absolute overflow-hidden opacity-4 end-0 top-0 h-100 border-radius-xl">
                    <div class="card-body px-5 z-index-1 bg-cover">
                        <div class="row">
                            <div class="col-lg-5 col-10 text-center">
                                <img class="w-75 w-lg-100 mt-n7 mt-lg-n8 d-none d-md-block" src="../../assets/img/inve.png"
                                    alt="car image">
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 my-auto">
                                <h4 class="text-body opacity-9">welcome aplikasi inventaris</h4>
                                <p>aplikasi ini untuk memenuhi tugas akhir skripsi</p>
                                <hr class="horizontal light mt-1 mb-3">
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header mb-0">
        <h5 class="mb-0">Form edit</h5>
    </div>
    <br>
    @if ($errors->any())
        {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
    @endif
    @if (Session::get('error') && Session::get('error') != null)
        <div style="color:red">{{ Session::get('error') }}</div>
        @php
            Session::put('error', null);
        @endphp
    @endif
    @if (Session::get('success') && Session::get('success') != null)
        <div style="color:green">{{ Session::get('success') }}</div>
        @php
            Session::put('success', null);
        @endphp
    @endif

    <form action="/edit/password/{{ $perusahaan->id }}" method="POST" role="form text-left">
        @csrf
        <label for="new_password">password baru</label>
        <div class="input-group mb-3">
            <input type="password" name="new_password" class="form-control" id="new_password"
                placeholder="enter new password" aria-label="password" aria-describedby="password-addon">
        </div>
        <label for="new_password_confirmation">confirmasi password baru</label>
        <div class="input-group mb-3">
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control"
                placeholder="enter confirm new password" aria-label="Password" aria-describedby="password-addon">
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>save password</button>
        </div>
    </form>
@endsection
