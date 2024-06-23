@extends('layouts/create-pasien')
@section('create-pasien')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container py-1">
        <div class="row">
          <div class="col-lg-12" style="margin-top:11%;"> 
            <div class="card my-3">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Notifications Table</h6>
                      <a href="/dashboard/rawat-jalan/create-pasien" style="border:none; color:green;background-color:white; border-radius:13px; position:absolute; right:2%; top:25%;padding:.3rem;">
                          <i class="fa-solid fa-plus"></i>Create Data
                      </a>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="" class="d-flex col-lg-12">      
                            <div class="row">
                                <div class="d-flex col-lg-6">
                                    <label for="nama-lengkap">Nama Lengkap :</label>
                                    <input id="nama-lengkap" type="text" class="col-lg-9" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                </div>
                                
                                
                                <div class="d-flex col-lg-6">
                                    <label for="panggilan">Nama Panggilan :</label>
                                    <input id="panggilan" type="text" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                </div>
                                
                                    
                                <div class="d-flex col-lg-6">
                                    <label for="gender">Jenis Kelamin :</label>
                                    <select name="" id="gender" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                        <option value="">Please Select</option>
                                        <option value="">Laki-laki</option>
                                        <option value="">Perempuan</option>
                                    </select>
                                </div>
                                
                                    
                                <div class="d-flex col-lg-6">
                                    <label for="birth-date">Tanggal Lahir :</label>
                                    <input id="birth-date" type="date" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                </div>
                                
                                    
                                <div class="d-flex col-lg-6">
                                    <label for="pendidikan">Pendidikan :</label>
                                    <select name="" id="pendidikan" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                        <option value="">Please Select</option>
                                        <option value="">SD</option>
                                        <option value="">SMP</option>
                                        <option value="">SMA</option>
                                        <option value="">D3</option>
                                        <option value="">S1/D4</option>
                                        <option value="">S2</option>
                                        <option value="">Doktor</option>
                                    </select>
                                </div>
                            
                                
                                <div class="d-flex col-lg-6">
                                    <label for="nomor-handphone">Nomor Telepon :</label>
                                    <input id="nomor-handphone" type="text" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                </div>
                                
                                <div class="d-flex col-lg-6">                                   
                                    <label for="alamat">Alamat :</label>
                                    <input id="alamat" type="text" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                </div>
                                
                                <div class="d-flex col-lg-6">                                   
                                    <label for="note">Catatan Alergi Obat :</label>
                                    <input id="note" type="text" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                </div>
                                
                                <div class="d-flex col-lg-6">                                    
                                    <label for="payment-method">Jenis Pembayaran :</label>
                                    <select name="" id="payment-method" style="border:unset;border-bottom:1px solid #5EB562; outline:none;">
                                        <option value="">Please Select</option>
                                        <option value="">Pribadi</option>
                                        <option value="">BPJS</option>
                                        <option value="">Asuransi</option>
                                    </select>
                                </div>      
                                <div class="d-flex">
                                    <a href="/dashboard/rawat-jalan" class="btn btn-danger col-lg-1 ms-4">Cancel</a>
                                    <button type="submit" class="btn btn-success col-lg-1 me-4" style="position:absolute; right:0">Save</button>
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