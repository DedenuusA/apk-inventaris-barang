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
    <!-- Card header -->
    <div class="card-header mb-0">
        <h5 class="mb-0">Form edit</h5>
    </div>
    <br>
    <form action="/user/{{ $user_model->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="nama"
                required="" value="{{ $user_model->name }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="user@email.com" required="" value="{{ $user_model->email }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">jenis kelamin</label>
            <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                <option value="laki-laki" {{ $user_model->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>laki - laki
                </option>
                <option value="perempuan"{{ $user_model->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>perempuan
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nomer telepon</label>
            <input type="number" name="no_tlp" max="999999999999" class="form-control" id="exampleFormControlInput1"
                placeholder="" required="" value="{{ $user_model->no_tlp }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $user_model->alamat }}</textarea>
        </div>
        @if (auth()->user()->role !== 'pimpinan')
            <div class="form-group">
                <label for="exampleFormControlSelect1">Role</label>
                <select class="form-control" id="exampleFormControlSelect1" name="role">
                    <option value="admin" {{ $user_model->role == 'admin' ? 'selected' : '' }}>admin</option>
                    <option value="karyawan"{{ $user_model->role == 'karyawan' ? 'selected' : '' }}>karyawan
                    </option>
                    <option value="pimpinan"{{ $user_model->role == 'pimpinan' ? 'selected' : '' }}>pimpinan
                    </option>
                </select>
            </div>
        @endif
        <div class="form-group">
            <button type="submit" class="btn bg-gradient-info"><i class="fas fa-save pe-2"></i>update</button>
            @if (auth()->user()->role !== 'pimpinan')
                <a href="/password/{{ $user_model->id }}/edit" class="btn bg-gradient-info"><i
                        class="fas fa-key pe-2"></i>edit
                    password</a>
            @endif
        </div>
    </form>
@endsection
