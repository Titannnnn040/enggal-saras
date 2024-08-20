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
                  <h6 class="text-white text-capitalize ps-3">Create Pasien</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="/dashboard/pendaftaran/{{ $rawatJalan->id }}" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                            @method('put')
                            <div class="d-flex flex-column">
                                <div class="d-flex create-pasien  col-lg-12">
                                    <div class="col-lg-6 col-xl-6 col-xxl-6 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">No.Rekam Medis :</label>
                                                <label>autogenerate</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_lengkap" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nama Lengkap :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ $rawatJalan->nama_lengkap }}">
                                                    @error('nama_lengkap')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_panggilan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nama Panggilan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror col-xxl-12" id="nama_panggilan" name="nama_panggilan" value="{{$rawatJalan->nama_panggilan }}">
                                                    @error('nama_panggilan')
                                                        <div class="invalid-feedback d-block col-lg-12">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="jenis_kelamin" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2 ">Jenis Kelamin :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"  id="jenis_kelamin">
                                                        <option value="">Please Select</option>
                                                        <option value="Laki-laki" {{ "Laki-laki" == $rawatJalan->jenis_kelamin ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ "Perempuan" == $rawatJalan->jenis_kelamin ? 'selected' : '' }}>Perempuan</option>
                                                    </select>          
                                                    @error('jenis_kelamin')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="umur" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Umur :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control  @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ $rawatJalan->umur }}">  
                                                    @error('umur')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="birth_date" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Tanggal Lahir :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ $rawatJalan->birth_date }}">        
                                                    @error('birth_date')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nik" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">NIK :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ $rawatJalan->nik }}">
                                                    @error('nik')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
   
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="status_pernikahan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Status Pernikahan :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('status_pernikahan') is-invalid @enderror" name="status_pernikahan"  id="status_pernikahan" >
                                                        <option value="">Please Select</option>
                                                        <option value="Menikah" {{ "Menikah" == $rawatJalan->status_pernikahan ? 'selected' : '' }}>Menikah</option>
                                                        <option value="Belum Menikah" {{ "Belum Menikah" == $rawatJalan->status_pernikahan  ? 'selected' : '' }}>Belum Menikah</option>
                                                        <option value="Janda" {{ "Janda" == $rawatJalan->status_pernikahan ? 'selected'  : '' }}>Janda</option>
                                                        <option value="Duda" {{ "Duda" == $rawatJalan->status_pernikahan ? 'selected' : '' }}>Duda</option>
                                                    </select>                  
                                                    @error('status_pernikahan')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
        
      
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="pekerjaan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Pekerjaan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ $rawatJalan->pekerjaan }}">
                                                    @error('pekerjaan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="payment_id" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Jenis Pembayaran :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('payment_id') is-invalid @enderror" name="payment_id"  id="payment_id" >
                                                        <option value="">Please Select</option>
                                                        @foreach ($payment as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $rawatJalan->payment_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>       
                                                    @error('payment_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="" id="no-payment" style="display: none">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                <div class="d-flex">
                                                    <label for="no_bpjs_asuransi" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">No.BPJS / Asuransi :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                        <input type="text" class="form-control @error('no_bpjs_asuransi') is-invalid @enderror" id="no_bpjs_asuransi" name="no_bpjs_asuransi" value="{{ $rawatJalan->no_bpjs_asuransi }}" >
                                                        @error('no_bpjs_asuransi')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const paymentMethod = document.getElementById('payment_id');
                                                const noPayment = document.getElementById('no-payment');
                                        
                                                function toggleDivisionSection() {
                                                    if (paymentMethod.value === '2' || paymentMethod.value === '3') {
                                                        noPayment.style.display = 'block';
                                                    } else {
                                                        noPayment.style.display = 'none';
                                                    }
                                                }
                                        
                                                paymentMethod.addEventListener('change', toggleDivisionSection);
                                        
                                                // Run on page load in case of form resubmission with old values
                                                toggleDivisionSection();
                                            });
                                        </script>
                                            
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="upload_foto" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Upload foto :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    @if ($rawatJalan->upload_foto)
                                                        <div class="mb-3">
                                                            <img src="{{ asset('storage/' . $rawatJalan->upload_foto) }}" width="100" alt="{{ $rawatJalan->upload_foto }}">
                                                        </div>
                                                    @endif
                                                    <input type="file" class="form-control @error('upload_foto') is-invalid @enderror" id="upload_foto" name="upload_foto">
                                                    @error('upload_foto')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                            

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="note" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Catatan Alergi Obat :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" rows="1" value="">{{ $rawatJalan->note }}</textarea>
                                                    @error('note')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-6 col-xl-6 col-xxl-6 ms-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxl-6 mb-3">
                                            <div class="d-flex">
                                                <label for="phone_number" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nomor Handphone :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $rawatJalan->phone_number }}">
                                                    @error('phone_number')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="province_id" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Provinsi :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('province_id') is-invalid @enderror" name="province_id"  id="province_id" >
                                                        <option value="">Please Select</option>
                                                        @foreach ($province as $item)
                                                            <option value="{{ $item->id }}" {{ $rawatJalan->province_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('province_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="cities_id" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kota :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('cities_id') is-invalid @enderror" name="cities_id"  id="cities_id" >
                                                        @foreach ($city as $item)
                                                            <option value="{{ $item->id }}" {{ $rawatJalan->cities_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('cities_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- JavaScript to handle dynamic city loading based on province -->
                                        <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            document.getElementById('province_id').addEventListener('change', function () {
                                                var provinceId = this.value;
                                                fetch('/get-cities-by-province/' + provinceId)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        var citySelect = document.getElementById('cities_id');
                                                        citySelect.innerHTML = '<option value="">Please Select</option>';
                                                        data.forEach(function (city) {
                                                            var option = document.createElement('option');
                                                            option.value = city.id;
                                                            option.text = city.name;
                                                            citySelect.add(option);
                                                        });
                                                    })
                                                    .catch(error => console.error('Error:', error));
                                            });
                                        });
                                        </script>
        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="kecamatan_id" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kecamatan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('kecamatan_id') is-invalid @enderror" name="kecamatan_id"  id="kecamatan_id" >
                                                        @foreach ($kecamatan as $item)
                                                            <option value="{{ $item->id }}" {{ $rawatJalan->kecamatan_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kecamatan_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('cities_id').addEventListener('change', function () {
                                                var cityName = this.value;
                                                fetch('/get-kecamatan-by-city/' + cityName)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        var kecamatanSelect = document.getElementById('kecamatan_id');
                                                        kecamatanSelect.innerHTML = '<option value="">Please Select</option>';
                                                        data.forEach(function (kecamatan) {
                                                            var option = document.createElement('option');
                                                            option.value = kecamatan.id;
                                                            option.text = kecamatan.name;
                                                            kecamatanSelect.add(option);
                                                        });
                                                    })
                                                    .catch(error => console.error('Error:', error));
                                            });
                                        </script>
                                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="kelurahan_id" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kelurahan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('kelurahan_id') is-invalid @enderror" name="kelurahan_id"  id="kelurahan_id" >
                                                        @foreach ($kelurahan as $item)
                                                            <option value="{{ $item->id }}" {{ $rawatJalan->kelurahan_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kelurahan_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                                document.getElementById('kecamatan_id').addEventListener('change', function () {
                                                var kecamatanName = this.value;
                                                fetch('/get-kelurahan-by-kecamatan/' + kecamatanName)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        var kelurahanSelect = document.getElementById('kelurahan_id');
                                                        kelurahanSelect.innerHTML = '<option value="">Please Select</option>';
                                                        data.forEach(function (kelurahan) {
                                                            var option = document.createElement('option');
                                                            option.value = kelurahan.id;
                                                            option.text = kelurahan.name;
                                                            kelurahanSelect.add(option);
                                                        });
                                                    })
                                                    .catch(error => console.error('Error:', error));
                                            });
                                        </script>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="address" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Alamat Lengkap :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="1" value="">{{ $rawatJalan->address }}</textarea>
                                                    @error('address')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="agama" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Agama :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select @error('agama') is-invalid @enderror" name="agama"  id="agama" >
                                                        <option value="">Please Select</option>
                                                        <option value="Islam" {{ $rawatJalan->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                        <option value="Kristen" {{ $rawatJalan->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                        <option value="Katolik" {{ $rawatJalan->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                        <option value="Hindu" {{ $rawatJalan->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                        <option value="Buddha" {{ $rawatJalan->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                        <option value="Khonghucu" {{ $rawatJalan->agama == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                                    </select>
                                                    @error('agama')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="pendidikan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Pendidikan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <select class="form-select   @error('pendidikan') is-invalid @enderror" name="pendidikan"  id="pendidikan" >
                                                        <option value="">Please Select</option>
                                                        <option value="SD" {{ $rawatJalan->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                                        <option value="SMP" {{ $rawatJalan->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                        <option value="SMA" {{ $rawatJalan->pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                        <option value="D3" {{ $rawatJalan->pendidikan == 'D3' ? 'selected' : '' }}>Diploma</option>
                                                        <option value="S1/D4" {{ $rawatJalan->pendidikan == 'S1/D4' ? 'selected' : '' }}>S1/D4</option>
                                                        <option value="S2/S3" {{ $rawatJalan->pendidikan == 'S2/S3' ? 'selected' : '' }}>S2/S3</option>
                                                        <option value="Non Formal" {{ $rawatJalan->pendidikan == 'Non Formal' ? 'selected' : '' }}>Non Formal</option>
                                                    </select>
                                                    @error('pendidikan')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_ayah" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nama Ayah :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ $rawatJalan->nama_ayah }}">
                                                    @error('nama_ayah')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_ibu" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nama Ibu :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ $rawatJalan->nama_ibu }}">
                                                    @error('nama_ibu')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="kondisi_khusus" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kondisi Khusus :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8">
                                                    <input type="text" class="form-control @error('kondisi_khusus') is-invalid @enderror" id="kondisi_khusus" name="kondisi_khusus" value="{{ $rawatJalan->kondisi_khusus }}">
                                                    @error('kondisi_khusus')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">No.Rekam Medis :</label>
                                                <label >autogenerate</label>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>   
                                <div class="col-lg-12">
                                    <a href="/dashboard/pendaftaran" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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

@endsection