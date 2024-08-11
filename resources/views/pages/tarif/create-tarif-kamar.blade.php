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
                  <h6 class="text-white text-capitalize ps-3">Edit Kamar</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="/tarif/update-tarif-kamar/{{$kamar->id}}" method="post" class="d-flex col-lg-12"> 
                            @csrf    
                            @method('put') 
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Kamar :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control " disabled id="kode-kamar" name="kode-kamar"  value="{{ $kamar->kode_kamar }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_kamar" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Kamar :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control "  id="nama_kamar" name="nama_kamar"  value="{{ $kamar->nama_kamar }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="tarif_kamar" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Tarif Kamar :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('tarif_kamar') is-invalid @enderror"  oninput="calculateTotal()" id="tarif_kamar" name="tarif_kamar" value="{{ number_format($kamar->tarif_kamar) }}">
                                                    @error('tarif_kamar')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="jasa_pelaksana" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Jasa Pelaksana :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('jasa_pelaksana') is-invalid @enderror" id="jasa_pelaksana"  oninput="calculateTotal()"  name="jasa_pelaksana" value="{{ number_format($kamar->jasa_pelaksana) }}">
                                                    @error('jasa_pelaksana')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="total_tarif" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Total Tarif :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control " disabled id="total_tarif" name="kode-kamar"  value="{{ number_format($kamar->total_tarif) }}">
                                                </div>
                                            </div>
                                        </div>
                                
                                        <script>
                                            function formatNumber(number) {
                                                return number.toLocaleString();
                                            }
                                        
                                            function parseNumber(value) {
                                                let number = value.replace(/,/g, '');
                                                return isNaN(number) || number === '' ? 0 : parseInt(number, 10);
                                            }
                                        
                                            function formatInput(inputElement) {
                                                let value = inputElement.value;
                                                inputElement.value = formatNumber(parseNumber(value));
                                                calculateTotal();
                                            }
                                        
                                            function calculateTotal() {
                                                let roomPrice = parseNumber(document.getElementById('tarif_kamar').value);
                                                let serviceFee = parseNumber(document.getElementById('jasa_pelaksana').value);
                                                let totalFee = roomPrice + serviceFee;
                                                document.getElementById('total_tarif').value = formatNumber(totalFee);
                                            }
                                        
                                            document.getElementById('tarif_kamar').addEventListener('input', function() {
                                                formatInput(this);
                                            });
                                        
                                            document.getElementById('jasa_pelaksana').addEventListener('input', function() {
                                                formatInput(this);
                                            });
                                        </script>
                        
                                    </div>
                                </div>   
                                <div class="col-lg-12">
                                    <a href="/kamar/data-kamar" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
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