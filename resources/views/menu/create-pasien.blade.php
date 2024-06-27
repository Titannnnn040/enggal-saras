@extends('layouts/dashboard')
@section('dashboard')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-1">
        <h1>Enggal Saras MHCC</h1>
        <div class="row">
          <div class="mt-4"> 
            <div class="card my-3">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Create Pasien</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                            <div class="d-flex flex-column">
                                <div class="d-flex create-pasien col-lg-12">
                                    <div class="col-lg-12 me-0">

                                        <div class="d-flex col-lg-12 mb-3">
                                            <label class="col-lg-2 me-2" for="code">No.Rekam Medis :</label>
                                            <label for="">autogenerate</label>
                                        </div>
        
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label class="col-lg-2 me-2" for="nama-lengkap">Nama Lengkap :</label>
                                            <input name="nama-lengkap" id="nama-lengkap"  type="text" class="col-lg-9" style="">
                                        </div>
        
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="panggilan" class="col-lg-2 me-2">Nama Panggilan :</label>
                                            <input class="col-lg-9" id="panggilan"  type="text" name="panggilan" >
                                        </div>
          
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="ge
                                            nder" class="col-lg-2 me-2">Jenis Kelamin :</label>
                                            <select name="gender" class="col-lg-9" id="gender">
                                                <option value="">Please Select</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                       
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="umur" class="col-lg-2 me-2">Umur :</label>
                                            <input class="col-lg-9" name="umur" id="umur" type="text">
                                        </div>
                                        
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="birth-date" class="col-lg-2 me-2">Tanggal Lahir :</label>
                                            <input name="birth-date" class="col-lg-9" id="birth-date" type="date">
                                        </div>

                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="nik" class="col-lg-2 me-2">NIK :</label>
                                            <input class="col-lg-9" name="nik" id="nik" type="text">
                                        </div>
                                        
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="status-perkawinan" class="col-lg-2 me-2">Status Pernikahan :</label>
                                            <select name="status-perkawinan" class="col-lg-9" id="status-perkawinan">
                                                <option value="">Please Select</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Janda">Janda</option>
                                                <option value="Duda">Duda</option>
                                            </select>
                                        </div>
        
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="pekerjaan" class="col-lg-2 me-2">Pekerjaan :</label>
                                            <input type="text" name="pekerjaan" id="pekerjaan" class="col-lg-9">
                                        </div>

                                        <div class="d-flex col-lg-12 mb-3">                                    
                                            <label for="payment-method" class="col-lg-2 me-2">Jenis Pembayaran :</label>
                                            <select name="payment-method" class="col-lg-9" id="payment-method">
                                                <option value="">Please Select</option>
                                                <option id="pribadi" value="Pribadi">Pribadi</option>
                                                <option id="bpjs" value="BPJS">BPJS</option>
                                                <option id="asuransi" value="Asuransi">Asuransi</option>
                                            </select>
                                        </div>
                                        
                                        <div id="no-payment" style="display: none">
                                            <div class="d-flex col-lg-12 mb-3">
                                                <label for="no-bpjs" class="col-lg-2 me-2">No.BPJS / Asuransi :</label>
                                                <input id="no-bpjs" name="no-bpjs" class="col-lg-9" type="text">
                                            </div>
                                        </div>
                                        
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const paymentMethod = document.getElementById('payment-method');
                                                const noPayment = document.getElementById('no-payment');
                                        
                                                function toggleDivisionSection() {
                                                    if (paymentMethod.value === 'BPJS' || paymentMethod.value === 'Asuransi') {
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

                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="upload-foto" class="col-lg-2 me-2">Upload foto :</label>
                                            <input id="upload-foto" name="upload-foto" class="col-lg-9" type="file">
                                        </div>

                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="note" class="col-lg-2 me-2">Catatan Alergi Obat :</label>
                                            <textarea name="note" id="note" class="col-lg-9" cols="30" rows="1"></textarea>
                                        </div>
        
                                    </div>
    
                                    <div class="col-lg-12 ms-0 p-0">

                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="nomor-handphone" class="col-lg-2 me-2">Nomor Handphone :</label>
                                            <input class="col-lg-9" name="phone_number" id="nomor-handphone" type="text">
                                        </div>

                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="province" class="col-lg-2 me-2">Provinsi :</label>
                                            <select name="province" class="col-lg-9" id="province">
                                                <option value="">Please Select</option>
                                                @foreach ($province as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <!-- Blade template for cities -->
                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="city" class="col-lg-2 me-2">Kota :</label>
                                            <select name="city" class="col-lg-9" id="city">
                                                <option value="">Please Select</option>
                                                <!-- Cities will be populated using JavaScript -->
                                            </select>
                                        </div>
                                        
                                        <!-- JavaScript to handle dynamic city loading based on province -->
                                        <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            document.getElementById('province').addEventListener('change', function () {
                                                var provinceName = this.value;
                                                fetch('/get-cities-by-province/' + provinceName)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        var citySelect = document.getElementById('city');
                                                        citySelect.innerHTML = '<option value="">Please Select</option>';
                                                        data.forEach(function (city) {
                                                            var option = document.createElement('option');
                                                            option.value = city.name;
                                                            option.text = city.name;
                                                            citySelect.add(option);
                                                        });
                                                    })
                                                    .catch(error => console.error('Error:', error));
                                            });
                                        });
                                        </script>
        
                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="kecamatan" class="col-lg-2 me-2">Kecamatan :</label>
                                            <select name="kecamatan" class="col-lg-9" id="kecamatan">
                                                <option value="-">Please Select</option>
                                            </select>
                                        </div>
        
                                        <script>
                                              document.getElementById('city').addEventListener('change', function () {
                                                var cityName = this.value;
                                                fetch('/get-kecamatan-by-city/' + cityName)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        var kecamatanSelect = document.getElementById('kecamatan');
                                                        kecamatanSelect.innerHTML = '<option value="">Please Select</option>';
                                                        data.forEach(function (kecamatan) {
                                                            var option = document.createElement('option');
                                                            option.value = kecamatan.name;
                                                            option.text = kecamatan.name;
                                                            kecamatanSelect.add(option);
                                                        });
                                                    })
                                                    .catch(error => console.error('Error:', error));
                                            });
                                        </script>
                                        
                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="kelurahan" class="col-lg-2 me-2">Kelurahan :</label>
                                            <select name="kelurahan" class="col-lg-9" id="kelurahan">
                                                
                                                <option value="-">Please Select</option>
                                            </select>
                                        </div>
        
                                        <script>
                                            document.getElementById('kecamatan').addEventListener('change', function () {
                                              var kecamatanName = this.value;
                                              fetch('/get-kelurahan-by-kecamatan/' + kecamatanName)
                                                  .then(response => response.json())
                                                  .then(data => {
                                                      var kelurahanSelect = document.getElementById('kelurahan');
                                                      kelurahanSelect.innerHTML = '<option value="">Please Select</option>';
                                                      data.forEach(function (kelurahan) {
                                                          var option = document.createElement('option');
                                                          option.value = kelurahan.name;
                                                          option.text = kelurahan.name;
                                                          kelurahanSelect.add(option);
                                                      });
                                                  })
                                                  .catch(error => console.error('Error:', error));
                                          });
                                      </script>

                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="address" class="col-lg-2 me-2">Alamat Lengkap :</label>
                                            <textarea name="address" id="address" class="col-lg-9" cols="30" rows="1"></textarea>
                                        </div>

                                        <div class="d-flex col-lg-12 mb-3">                                    
                                            <label for="agama" class="col-lg-2 me-2">Agama :</label>
                                            <select name="agama" class="col-lg-9" id="agama">
                                                <option value="-">Please Select</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Khonghucu">Khonghucu</option>
                                            </select>
                                        </div>
        
                                        <div class="d-flex col-lg-12 mb-3">
                                            <label for="pendidikan" class="col-lg-2 me-2">Pendidikan :</label>
                                            <select name="pendidikan" class="col-lg-9" id="pendidikan">
                                                <option value="-">Please Select</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D3">Diploma</option>
                                                <option value="S1/D4">S1</option>
                                                <option value="S2">S2/S3</option>
                                                <option value="Doktor">Non Formal</option>
                                            </select>
                                        </div> 
        
                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="ayah" class="col-lg-2 me-2">Nama Ayah :</label>
                                            <input id="ayah" name="nama-ayah" class="col-lg-9" type="text">
                                        </div>
        
                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="ibu" class="col-lg-2 me-2">Nama Ibu :</label>
                                            <input id="ibu" name="ibu" class="col-lg-9" type="text">
                                        </div>

                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="kodisi-khusus" class="col-lg-2 me-2">Kondisi Khusus :</label>
                                            <input id="kodisi-khusus" name="kodisi-khusus" class="col-lg-9" type="text">
                                        </div>
                                       
                                        <div class="d-flex col-lg-12 mb-3">                                   
                                            <label for="note" class="col-lg-2 me-2">ID Satu Sehat :</label>
                                            <label for="">autogenerate </label>
                                        </div>
                                        
                                    </div>

                                </div>   
                                <div class="col-lg-12">
                                    <a href="/dashboard/rawat-jalan" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
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