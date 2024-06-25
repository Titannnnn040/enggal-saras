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
                  <h6 class="text-white text-capitalize ps-3">Create Patient</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                            <div class="row create-pasien">

                                <div class="d-flex col-lg-6 mb-3">
                                    <label class="col-lg-2 me-2" for="code">No.Rekam Medis :</label>
                                    <label for="">autogenerate <span style="color: red">*</span></label>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="nomor-handphone" class="col-lg-2 me-2">Nomor Telepon :</label>
                                    <input class="col-lg-10" name="phone_number" id="nomor-handphone" type="text">
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label class="col-lg-2 me-2" for="nama-lengkap">Nama Lengkap :</label>
                                    <input name="nama-lengkap" id="nama-lengkap"  type="text" class="col-lg-10" style="">
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="province" class="col-lg-2 me-2">Province :</label>
                                    <select name="province" class="col-lg-10" id="province">
                                        <option value="-">Please Select</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="panggilan" class="col-lg-2 me-2">Nama Panggilan :</label>
                                    <input class="col-lg-10" id="panggilan"  type="text" name="panggilan" >
                                </div>
  
                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="city" class="col-lg-2 me-2">City :</label>
                                    <select name="city" class="col-lg-10" id="city">
                                        <option value="-">Please Select</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="gender" class="col-lg-2 me-2">Jenis Kelamin :</label>
                                    <select name="gender" class="col-lg-10" id="gender">
                                        <option value="-">Please Select</option>
                                        <option value="M">Laki-laki</option>
                                        <option value="F">Perempuan</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="kecamatan" class="col-lg-2 me-2">Kecamatan :</label>
                                    <select name="kecamatan" class="col-lg-10" id="kecamatan">
                                        <option value="-">Please Select</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="jenis-panggilan" class="col-lg-2 me-2">Umur :</label>
                                    <input class="col-lg-10" name="jenis-panggilan" id="jenis-panggilan" type="text">
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="kelurahan" class="col-lg-2 me-2">Kelurahan :</label>
                                    <select name="kelurahan" class="col-lg-10" id="kelurahan">
                                        <option value="-">Please Select</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="birth-date" class="col-lg-2 me-2">Tanggal Lahir :</label>
                                    <input name="birth-date" class="col-lg-10" id="birth-date" type="date">
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="address" class="col-lg-2 me-2">Alamat :</label>
                                    <textarea name="address" id="address" class="col-lg-10" cols="30" rows="1"></textarea>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="nik" class="col-lg-2 me-2">NIK :</label>
                                    <input class="col-lg-10" name="nik" id="nik" type="text">
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                    
                                    <label for="agama" class="col-lg-2 me-2">Agama :</label>
                                    <select name="agama" class="col-lg-10" id="agama">
                                        <option value="-">Please Select</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="status-perkawinan" class="col-lg-2 me-2">Status Pernikahan :</label>
                                    <select name="status-perkawinan" class="col-lg-10" id="status-perkawinan">
                                        <option value="-">Please Select</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Janda">Janda</option>
                                        <option value="Duda">Duda</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="pendidikan" class="col-lg-2 me-2">Pendidikan :</label>
                                    <select name="pendidikan" class="col-lg-10" id="pendidikan">
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

                                <div class="d-flex col-lg-6 mb-3">
                                    <label for="pekerjaan" class="col-lg-2 me-2">Pekerjaan :</label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="col-lg-10">
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="ayah" class="col-lg-2 me-2">Nama Ayah :</label>
                                    <input id="ayah" name="nama-ayah" class="col-lg-10" type="text">
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                    
                                    <label for="payment-method" class="col-lg-2 me-2">Jenis Pembayaran :</label>
                                    <select name="payment-method" class="col-lg-10" id="payment-method">
                                        <option value="-">Please Select</option>
                                        <option value="Pribadi">Pribadi</option>
                                        <option value="BPJS">BPJS</option>
                                        <option value="Asuransi">Asuransi</option>
                                    </select>
                                </div>

                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="ibu" class="col-lg-2 me-2">Nama Ibu :</label>
                                    <input id="ibu" name="ibu" class="col-lg-10" type="text">
                                </div>
                                
                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="upload-foto" class="col-lg-2 me-2">Upload foto :</label>
                                    <input id="upload-foto" name="upload-foto" class="col-lg-10" type="file">
                                </div>
                               
                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="kodisi-khusus" class="col-lg-2 me-2">Kondisi Khusus :</label>
                                    <input id="kodisi-khusus" name="kodisi-khusus" class="col-lg-10" type="text">
                                </div>
                                
                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="note" class="col-lg-2 me-2">Catatan Alergi Obat </label>
                                    <textarea name="note" id="note" class="col-lg-10" cols="30" rows="1"></textarea>
                                </div>
                                
                                <div class="d-flex col-lg-6 mb-3">                                   
                                    <label for="note" class="col-lg-2 me-2">ID Satu Sehat </label>
                                    <label for="">autogenerate <span style="color: red">*</span></label>
                                </div>

                                <div class="d-flex">
                                    <a href="/dashboard/rawat-jalan" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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