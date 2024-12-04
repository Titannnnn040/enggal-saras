@extends('layouts/form_layouts')
@section('form_layouts')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
          <div class="mt-4"> 
            <div class="card my-3  border border-0">
              <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Create Pemeriksaan Lab</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kode Pemeriksaan Lab :</label>
                                                <label>autogenerate</label>
                                            </div>
                                        </div>

                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="name" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nama Pemeriksaan Lab :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                                    @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="jenis" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Jenis :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <select class="form-select @error('jenis') is-invalid @enderror" name="jenis"  id="jenis">
                                                        <option value="">Please Select</option>
                                                        <option value="Pemeriksaan">Pemeriksaan</option>
                                                        <option value="Kelompok">Kelompok</option>
                                                    </select>          
                                                    @error('jenis')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="kelompok" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kelompok :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <select class="form-select @error('kelompok') is-invalid @enderror" name="kelompok"  id="kelompok">
                                                        <option value="">Please Select</option>
                                                        @foreach ($data['kelompok'] as $item)
                                                            <option value="{{$item->kelompok}}">{{$item->kelompok}}</option>
                                                        @endforeach
                                                    </select>          
                                                    @error('kelompok')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="satuan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Satuan :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <select class="form-select @error('satuan') is-invalid @enderror" name="satuan"  id="satuan">
                                                        <option value="">Please Select</option>
                                                        @foreach ($data['satuan'] as $item)
                                                            <option value="{{$item->satuan}}">{{$item->satuan}}</option>
                                                        @endforeach
                                                    </select>          
                                                    @error('satuan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="keterangan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Keterangan :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="2"></textarea>        
                                                    @error('keterangan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="hasil_rahasia" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Hasil Bersifat Rahasian :</label>
                                                <div class="d-flex flex-column form-check form-switch col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <input type="checkbox" class="form-check-input @error('hasil_rahasia') is-invalid @enderror" id="hasil_rahasia" name="hasil_rahasia" value="1">
                                                    @error('hasil_rahasia')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="button-open-kuantitatif">
                                                <label class="form-check-label" for="button-open-kuantitatif">
                                                  Kuantitatif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="button-open-kualitatif">
                                                <label class="form-check-label" for="button-open-kualitatif">
                                                    Kualitatif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="button-open-kualitatif-khusus">
                                                <label class="form-check-label" for="button-open-kualitatif-khusus">
                                                    Kualitatif Khusus
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="kuantitatif-form" style="display: none">
                                    <div class="row g-3">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="rentang_normal_kuantitatif" class="form-label">Rentang Normal:</label>
                                                <select class="form-select @error('rentang_normal_kuantitatif') is-invalid @enderror" name="rentang_normal_kuantitatif" id="rentang_normal_kuantitatif">
                                                    <option value="">Please Select</option>
                                                    @foreach ($data['rentangNormal'] as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('rentang_normal_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_kuantitatif" class="form-label">Keterangan:</label>
                                                <input type="text" class="form-control @error('keterangan_kuantitatif') is-invalid @enderror" id="keterangan_kuantitatif" name="keterangan_kuantitatif" value="{{ old('keterangan_kuantitatif') }}">
                                                @error('keterangan_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-1">
                                            <div class="mb-3">
                                                <label for="batas_bawah_kuantitatif" class="form-label">Batas Bawah:</label>
                                                <input type="number" class="form-control @error('batas_bawah_kuantitatif') is-invalid @enderror" id="batas_bawah_kuantitatif" name="batas_bawah_kuantitatif" value="{{ old('batas_bawah_kuantitatif') }}">
                                                @error('batas_bawah_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="antara_kuantitatif" class="form-label">Antara:</label>
                                                <input type="text" class="form-control @error('antara_kuantitatif') is-invalid @enderror" id="antara_kuantitatif" name="antara_kuantitatif" value="{{ old('antara_kuantitatif') }}">
                                                @error('antara_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-1">
                                            <div class="mb-3">
                                                <label for="batas_atas_kuantitatif" class="form-label">Batas Atas:</label>
                                                <input type="number" class="form-control @error('batas_atas_kuantitatif') is-invalid @enderror" id="batas_atas_kuantitatif" name="batas_atas_kuantitatif" value="{{ old('batas_atas_kuantitatif') }}">
                                                @error('batas_atas_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan2_kuantitatif" class="form-label">Keterangan:</label>
                                                <input type="text" class="form-control @error('keterangan2_kuantitatif') is-invalid @enderror" id="keterangan2_kuantitatif" name="keterangan2_kuantitatif" value="{{ old('keterangan2_kuantitatif') }}">
                                                @error('keterangan2_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 mt-5">
                                                <button type="button" id="button-add-kuantitatif" class="btn btn-success col-lg-2"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-12 mb-3">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0 w-100" id="myTables">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rentang Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Batas Bawah</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Antara</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Batas Bawah</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1 ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="kualitatif-form"  style="display: none">
                                    <div class="row g-3">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="rentang_normal_kualitatif" class="form-label">Rentang Normal:</label>
                                                <select class="form-select @error('rentang_normal_kualitatif') is-invalid @enderror" name="rentang_normal_kualitatif" id="rentang_normal_kualitatif">
                                                    <option value="">Please Select</option>
                                                    @foreach ($data['rentangNormal'] as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('rentang_normal_kualitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_positif_kualitatif" class="form-label">Keterangan Positif:</label>
                                                <input type="text" class="form-control @error('keterangan_positif_kualitatif') is-invalid @enderror" id="keterangan_positif_kualitatif" name="keterangan_positif_kualitatif" value="{{ old('keterangan_positif_kualitatif') }}">
                                                @error('keterangan_positif_kualitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-1 mb-3">
                                            <label for="n_plus_kualitatif" class="form-label ms-5">N.( + ) :</label>
                                            <div class="d-flex flex-column form-check form-switch ms-5">
                                                <input type="checkbox" class="form-check-input @error('n_plus_kualitatif') is-invalid @enderror" id="n_plus_kualitatif" name="n_plus_kualitatif" value="1">
                                                @error('n_plus_kualitatif')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_negatif_kualitatif" class="form-label">Keterangan Negatif:</label>
                                                <input type="text" class="form-control @error('keterangan_negatif_kualitatif') is-invalid @enderror" id="keterangan_negatif_kualitatif" name="keterangan_negatif_kualitatif" value="{{ old('keterangan_negatif_kualitatif') }}">
                                                @error('keterangan_negatif_kualitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-1 mb-3">
                                            <label for="n_min_kualitatif" class="form-label ms-5">N.( - ) :</label>
                                            <div class="d-flex flex-column form-check form-switch  ms-5">
                                                <input type="checkbox" class="form-check-input @error('n_min_kualitatif') is-invalid @enderror" id="n_min_kualitatif" name="n_min_kualitatif" value="1">
                                                @error('n_min_kualitatif')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 mt-5">
                                                <button type="button" id="button-add-kualitatif" class="btn btn-success col-lg-2"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-12 mb-3">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0 w-100" id="myTables">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rentang Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Positif</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.(+)</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Negatif</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.(-)</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1 ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="kualitatif-khusus-form" style="display: none">
                                    <div class="row g-3">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="rentang_normal_kualitatif" class="form-label">Rentang Normal:</label>
                                                <select class="form-select @error('rentang_normal_kualitatif') is-invalid @enderror" name="rentang_normal_kualitatif" id="rentang_normal_kualitatif">
                                                    <option value="">Please Select</option>
                                                    @foreach ($data['rentangNormal'] as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('rentang_normal_kualitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="normal_kualitatif_khusus" class="form-label">Normal:</label>
                                                <input type="text" class="form-control @error('normal_kualitatif_khusus') is-invalid @enderror" id="normal_kualitatif_khusus" name="normal_kualitatif_khusus" value="{{ old('normal_kualitatif_khusus') }}">
                                                @error('normal_kualitatif_khusus')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_normal_kualitatif_khusus" class="form-label">Keterangan Normal:</label>
                                                <input type="text" class="form-control @error('keterangan_normal_kualitatif_khusus') is-invalid @enderror" id="keterangan_normal_kualitatif_khusus" name="keterangan_normal_kualitatif_khusus" value="{{ old('keterangan_normal_kualitatif_khusus') }}">
                                                @error('keterangan_normal_kualitatif_khusus')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2 mt-5">
                                                <button type="button" id="button-add-kualitatif-khusus" class="btn btn-success col-lg-2"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-12 mb-3">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0 w-100" id="myTables">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rentang Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Positif</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.(+)</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Negatif</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.(-)</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1 ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-1 mb-5">
                                            <label for="skala_kualitatif_khusus" class="form-label">Skala Normal:</label>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input @error('skala_kualitatif_khusus') is-invalid @enderror" id="skala_kualitatif_khusus" name="skala_kualitatif_khusus" value="1">
                                                @error('skala_kualitatif_khusus')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <!-- Hasil Narasi -->
                                        <div class="col-lg-1 mb-5">
                                            <label for="narasi_kualitatif_khusus" class="form-label">Hasil Narasi:</label>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input @error('narasi_kualitatif_khusus') is-invalid @enderror" id="narasi_kualitatif_khusus" name="narasi_kualitatif_khusus" value="1">
                                                @error('narasi_kualitatif_khusus')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-5">
                                                <label for="keterangan_normal_kualitatif_khusus" class="form-label">Keterangan Normal:</label>
                                                <textarea name="note_kualitatif_khusus" class="form-control mt-2" id="note_kualitatif_khusus" cols="30" rows="2"></textarea>
                                                @error('keterangan_normal_kualitatif_khusus')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a href="{{route('data-pemeriksaan-lab')}}" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
                                    <button type="submit" class="btn btn-success col-lg-1" style="position:absolute; right:2%">Save</button>
                                </div> 

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
  
</main>


<script>
    function handleRadioChange() {
        ['kuantitatif-form', 'kualitatif-form', 'kualitatif-khusus-form'].forEach(id => {
            document.getElementById(id).style.display = 'none';
        });
        const selectedRadio = document.querySelector('input[name="flexRadioDefault"]:checked');
        if (selectedRadio) {
            document.getElementById(`${selectedRadio.id.replace('button-open-', '')}-form`).style.display = 'block';
        }
    }
    document.querySelectorAll('input[name="flexRadioDefault"]').forEach(radio => {
        radio.addEventListener('change', handleRadioChange);
    });
    handleRadioChange();
</script>


@endsection