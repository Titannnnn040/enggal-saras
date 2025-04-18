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
                            <h6 class="text-white text-capitalize ps-3">Create Dokter</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="/tenaga-medis/update-jadwal-dokter/{{ $data['id'] }}" method="post" class="d-flex col-lg-12"> 
                                    @method('put');
                                    @csrf     
                                    <div class="d-flex flex-column">
                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="layanan_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Layanan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id"  id="layanan_id">
                                                                <option value="">Please Select</option>
                                                                    @foreach ($layanan as $item)
                                                                    <option value="{{ $item->id }}" {{ $item->id == $data['layanan_id'] ? 'selected' : '' }}>{{ $item->nama_layanan }}</option>
                                                                    @endforeach
                                                            </select> 
                                                            @error('layanan_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="dokter_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Dokter :</label>
                                                        
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('dokter_id') is-invalid @enderror" name="dokter_id"  id="dokter_id">
                                                                <option value="">Please Select</option>
                                                                    @foreach ($dokter as $item)
                                                                        <option value="{{ $item->id }}" {{ $item->id == $data['dokter_id'] ? 'selected' : '' }}>{{ $item->nama_lengkap }}</option>
                                                                    @endforeach
                                                            </select> 
                                                            @error('dokter_id')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="jadwal_praktik" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Jadwal Praktik :</label>
                                                        
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('jadwal_praktik') is-invalid @enderror" name="jadwal_praktik"  id="jadwal_praktik">
                                                                <option value="">please select</option>
                                                                <option value="pagi" {{ $data['jadwal_praktik'] == 'pagi' ? 'selected' : ''}}>PAGI</option>
                                                                <option value="sore-malam" {{ $data['jadwal_praktik'] == 'sore-malam' ? 'selected' : ''}}>SORE MALAM</option>
                                                            </select> 
                                                            @error('jadwal_praktik')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Hari :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            @php
                                                                $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu' ];   
                                                            @endphp
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="background: #5BB25F;color:white;border-radius:10px 0 0 0">Hari</th>
                                                                        <th style="background: #5BB25F;color:white;">Mulai</th>
                                                                        <th style="background: #5BB25F;color:white;border-radius:0 10px 0 0">Selesai</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($days as $item)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-check">
                                                                                    <input type="checkbox" class="form-check-input @error( $item ) is-invalid @enderror" id="{{ $item }}" name="{{ $item }}" {{!empty($data[$item . '_start']) && !empty($data[$item . '_finish']) ? 'checked' : ''}} value="yes" {{ old($item) == 'yes' ? 'checked' : '' }} onchange="toggleTimeInputs('{{ $item }}')">
                                                                                    <label for="{{ $item }}" class="form-check-label">{{ strtoupper($item) }}</label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="time" id="{{ $item }}_start" name="{{ $item }}_start" value="{{$data[$item .'_start']}}" class="form-control" {{!empty($data[$item . '_start']) ? '' : 'disabled'}}>
                                                                                @error('{{ $item }}_start')
                                                                                    <div class="invalid-feedback d-block">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </td>
                                                                            <td>
                                                                                <input type="time" id="{{ $item }}_finish" name="{{ $item }}_finish" value="{{$data[$item .'_finish']}}" class="form-control" {{!empty($data[$item . '_finish']) ? '' : 'disabled'}}>
                                                                                @error('{{ $item }}_finish')
                                                                                    <div class="invalid-feedback d-block">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <script>
                                                                    function toggleTimeInputs(day) {
                                                                        let isChecked = document.getElementById(day).checked;
                                                                        let startInput = document.getElementById(day + '_start');
                                                                        let finishInput = document.getElementById(day + '_finish');
                                                                        startInput.disabled = !isChecked;
                                                                        finishInput.disabled = !isChecked;
                                                                        startInput.required = isChecked;
                                                                        finishInput.required = isChecked;
                                                                        if (!isChecked) {
                                                                            startInput.value = '';
                                                                            finishInput.value = '';
                                                                        }
                                                                    }
                                                                </script>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="col-lg-12">
                                            <a href="/tenaga-medis/jadwal-dokter" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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