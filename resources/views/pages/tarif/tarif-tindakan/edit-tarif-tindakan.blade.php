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
                  <h6 class="text-white text-capitalize ps-3">Create Tarif Tindakan</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="/tarif/update-tarif-tindakan/{{ $tindakan->id }}" method="post" class="d-flex col-lg-12"> 
                            @method('put')
                            @csrf    
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Kode Tarif Tindakan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control "  id="nama_tarif_tindakan" name="nama_tarif_tindakan"  value="{{ $tindakan->code_tarif_tindakan }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_tarif_tindakan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Tarif Tindakan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control " style="text-transform: uppercase;" id="nama_tarif_tindakan" name="nama_tarif_tindakan"  value="{{ $tindakan->nama_tarif_tindakan }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="group_tarif_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Group Tarif Tindakan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('group_tarif_id') is-invalid @enderror" name="group_tarif_id"  id="group_tarif_id">
                                                        <option value="">Please Select</option>
                                                        @foreach ($groupTarifTindakan as $item)
                                                            <option value="{{ $item->id }}" {{ $tindakan->group_tarif_id == $item->id ? 'selected' : '' }}>{{ $item->nama_group_tarif_tindakan }}</option>
                                                        @endforeach
                                                    </select>          
                                                    @error('group_tarif_id')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="fee_medis" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Fee Medis :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('fee_medis') is-invalid @enderror"  oninput="calculateTotal()" id="fee_medis" name="fee_medis" value="{{ number_format($tindakan->fee_medis) }}">
                                                    @error('fee_medis')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="jasa_klinik" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Jasa Klinik :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('jasa_klinik') is-invalid @enderror" id="jasa_klinik"  oninput="calculateTotal()"  name="jasa_klinik" value="{{ number_format($tindakan->jasa_klinik) }}">
                                                    @error('jasa_klinik')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="jasa_lainya" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Jasa Lainya :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('jasa_lainya') is-invalid @enderror" id="jasa_lainya"  oninput="calculateTotal()"  name="jasa_lainya" value="{{ number_format($tindakan->jasa_lainya) }}">
                                                    @error('jasa_lainya')
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
                                                    <input type="text" class="form-control " disabled id="total_tarif" name="total-tarif"  value="{{ number_format($tindakan->total_tarif) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="kode_tarif_bpjs" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Kode Tarif Tindakan BPJS :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('kode_tarif_bpjs') is-invalid @enderror" name="kode_tarif_bpjs"  id="kode_tarif_bpjs">
                                                        <option value="">Please Select</option>
                                                    </select>          
                                                    @error('kode_tarif_bpjs')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_tarif_tindakan_bpjs" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Nama Tarif Tindakan BPJS:</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('nama_tarif_tindakan_bpjs') is-invalid @enderror" name="nama_tarif_tindakan_bpjs"  id="nama_tarif_tindakan_bpjs">
                                                        <option value="">Please Select</option>
                                                    </select>          
                                                    @error('nama_tarif_tindakan_bpjs')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
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
                                                let roomPrice = parseNumber(document.getElementById('fee_medis').value);
                                                let serviceFee = parseNumber(document.getElementById('jasa_klinik').value);
                                                let otherFee = parseNumber(document.getElementById('jasa_lainya').value);
                                                let totalFee = roomPrice + serviceFee + otherFee;
                                                document.getElementById('total_tarif').value = formatNumber(totalFee);
                                            }
                                        
                                            document.getElementById('fee_medis').addEventListener('input', function() {
                                                formatInput(this);
                                            });
                                        
                                            document.getElementById('jasa_klinik').addEventListener('input', function() {
                                                formatInput(this);
                                            });
                                            
                                            document.getElementById('jasa_lainya').addEventListener('input', function() {
                                                formatInput(this);
                                            });
                                        </script>
                        
                                    </div>
                                </div>   
                                <div class="col-lg-12">
                                    <a href="/tarif/data-tarif-tindakan" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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