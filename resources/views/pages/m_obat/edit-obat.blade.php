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
                            <h6 class="text-white text-capitalize ps-3">Data Obat/Alkes</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="{{ isset($data['dataObat']->code_obat) ? route('update-obat', ['code' => $data['dataObat']->code_obat]) : '' }}" method="post" class="d-flex col-lg-12"> 
                                    @method('put')
                                    @csrf     
                                    <div class="d-flex flex-column">
                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-3 me-2">Kode Obat/Alkes :</label>
                                                        <div class="d-flex flex-column col-md-9 col-lg-9">
                                                            <input type="text" class="form-control @error('code_obat') is-invalid @enderror" id="code_obat" name="code_obat" value="{{ $data['dataObat']->code_obat }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="obat_name" class="form-label col-lg-3 me-2">Nama Obat/Alkes :</label>
                                                        <div class="d-flex flex-column col-md-9 col-lg-9">
                                                            <input type="text" class="form-control @error('obat_name') is-invalid @enderror" id="obat_name" name="obat_name" value="{{ $data['dataObat']->name_obat }}">
                                                            @error('obat_name')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="d-flex col-lg-12">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
                                                <div class="">
                                                    <ul class="d-flex" style="list-style-type: none;">
                                                        <li class="me-2"><button id="btn-spesifikasi" type="button" class="btn btn-success">Spesifikasi Dasar</button></li>
                                                        <li class="me-2"><button  id="btn-setting-harga" type="button" class="btn btn-success">Setting Harga & Metode</button></li>
                                                        <li class="me-2"><button  id="btn-satuan" type="button" class="btn btn-success">Satuan</button></li>
                                                        <li class="me-2"><button  id="btn-stock" type="button" class="btn btn-success">Stock & Limit</button></li>
                                                        <li class="me-2"><button  id="btn-spek" type="button" class="btn btn-success">Spesifikasi</button></li>
                                                        <li class="me-2"><button  id="btn-distributor" type="button" class="btn btn-success">Distributor</button></li>
                                                        <li class="me-2"><button  id="btn-satu-sehat" type="button" class="btn btn-success">Satu Sehat</button></li>
                                                        <li class="me-2"><button  id="btn-bpjs" type="button" class="btn btn-success">BPJS</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="col-lg-12 ms-4 mb-4" id="form-spesifikasi-dasar">
                                            <div class="row ms-1 me-0">
                                                <div class="col-lg-3 col-xl-3 col-xxl-3">
                                                    <div class="row mb-3">
                                                        <div class="col-12 d-flex">
                                                            <label for="barang_aktif" class="form-label col-lg-5 me-2">Barang Aktif :</label>
                                                            <div class="d-flex flex-column col-lg-9 col-xl-8">
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" class="form-check-input @error('status') is-invalid @enderror" id="status" name="status" value="1" {{$data['spekDasar']->status == 1 ? 'checked' : ''}}>
                                                                    <label for="status" class="form-label ms-2">Aktif</label>
                                                                </div>
                                                                @error('status')
                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-12 d-flex">
                                                            <label for="barang_racikan" class="form-label col-lg-5 me-2">Barang Racikan :</label>
                                                            <div class="d-flex flex-column col-lg-9 col-xl-8">
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" class="form-check-input @error('barang_racikan') is-invalid @enderror" id="barang_racikan" name="barang_racikan" value="1" {{$data['spekDasar']->barang_racikan == 1 ? 'checked' : ''}}>
                                                                    <label for="barang_racikan" class="form-label ms-2">Aktif</label>
                                                                </div>
                                                                @error('barang_racikan')
                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-xl-9 col-xxl-9">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <div class="d-flex">
                                                                <label for="golongan_barang" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Golongan Barang :</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <select class="form-select @error('golongan_barang') is-invalid @enderror" name="golongan_barang" id="golongan_barang">
                                                                        <option value="">Please Select</option>
                                                                        @foreach ($data['golonganObat'] as $item)
                                                                            <option value="{{$item->golongan_obat_code}}" {{$item->golongan_obat_code == $data['spekDasar']->golongan_barang ? 'selected' : ''}}>{{$item->golongan_obat_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('golongan_barang')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="d-flex">
                                                                <label for="pabrik_principal" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Pabrik/Principal :</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <select class="form-select @error('pabrik_principal') is-invalid @enderror" name="pabrik_principal" id="pabrik_principal">
                                                                        <option value="">Please Select</option>
                                                                        @foreach ($data['pabrik'] as $item)
                                                                            <option value="{{$item->pabrik_code}}" {{$item->pabrik_code == $data['spekDasar']->pabrik_principal ? 'selected' : ''}}>{{$item->pabrik_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('pabrik_principal')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="d-flex">
                                                                <label for="lokasi_barang" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Lokasi Barang :</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <input type="text" class="form-control @error('lokasi_barang') is-invalid @enderror" id="lokasi_barang" name="lokasi_barang" value="{{$data['spekDasar']->lokasi_barang}}">
                                                                    @error('lokasi_barang')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="col-lg-12 ms-4 mb-4" id="form-setting-harga" style="display: none">
                                            <div class="row ms-1 me-0">
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 d-flex">
                                                    <div class="col-lg-4 mb-3">
                                                        <label for="default_tax" class="form-label">Default Tax (%) :</label>
                                                        <div class="col-lg-11">
                                                            <input type="number" class="form-control @error('default_tax') is-invalid @enderror" id="default_tax" name="default_tax" value="{{$data['hargaObat']->pluck('default_tax')->first() }}" max="999" maxlength="3" oninput="validateMaxDigits(this, 3)">
                                                            @error('default_tax')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-3">
                                                        <label for="metode_penentuan_harga_jual" class="form-label">Metode Penentuan Harga Jual :</label>
                                                        <div class="col-lg-11">
                                                            <input type="text" class="form-control" id="metode_penentuan_harga_jual" name="metode_penentuan_harga_jual" value="Manual" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 mb-3">
                                                        <label for="metode_persediaan" class="form-label">Metode Persediaan :</label>
                                                        <div class="col-lg-11">
                                                            <input type="text" class="form-control" id="metode_persediaan" name="metode_persediaan" value="FIFO" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 d-flex">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive p-0">
                                                            <table class="table align-items-center mb-0" id="myTables">
                                                                <thead class="bg-success">
                                                                    <tr>
                                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Harga Jual</th>
                                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profit Margin %</th>
                                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Biaya +</th>
                                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $num = 1 ?>
                                                                @foreach ($data['settingHargaObat'] as $item)
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="align-middle text-center text-xs">
                                                                                <input type="text" class="form-control" name="tipe_harga_jual_code[]" value="{{$item->tipe_harga_jual_code}}" readonly>
                                                                            </td>
                                                                            <td class="align-middle text-center text-xs">
                                                                                <input type="text" class="form-control" name="tipe_harga_jual_name[]" value="{{$item->tipe_harga_jual_name}}" readonly>
                                                                            </td>
                                                                            <td class="align-middle text-center text-xs">
                                                                                <input type="text" class="form-control" id="profit_margin_{{$item->id}}" name="profit_margin[]" value="{{$item->profit_margin}}">
                                                                            </td>
                                                                            <td class="align-middle text-center text-xs">
                                                                                <input type="text" class="form-control" id="biaya_tambahan_{{$item->id}}" value="{{$item->biaya_tambahan}}" name="biaya_tambahan[]">
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_{{$item->id}}"><i class="fa fa-pen"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-lg-12 ms-4 mb-4" id="form-satuan" style="display: none">
                                            <div class="row ms-1 me-0">
                                                <div class="col-lg-9 col-xl-9 col-xxl-9">
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <div class="d-flex">
                                                                <label for="satuan_kecil" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Satuan Kecil :</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <select class="form-select @error('satuan_kecil') is-invalid @enderror" name="satuan_kecil" id="satuan_kecil">
                                                                        <option value="">Please Select</option>
                                                                        @foreach ($data['satuanBarang'] as $option)
                                                                            <option value="{{ $option->satuan_barang_code }}" {{$option->satuan_barang_code ==  $data['satuanObat']['satuan_kecil'] ? 'selected' : ''}}>{{ strtoupper($option->satuan_barang_name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('satuan_kecil')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="d-flex">
                                                                <label for="satuan_kemasan" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Satuan Kemasan :</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="d-flex">
                                                                        <select class="form-select me-2 @error('satuan_kemasan') is-invalid @enderror" name="satuan_kemasan" id="satuan_kemasan" style="flex: 11; max-height: 100px; overflow-y: auto;">
                                                                            <option value="">Please Select</option>
                                                                            @foreach ($data['satuanBarang'] as $option)
                                                                                <option value="{{ $option->satuan_barang_code }}" {{$option->satuan_barang_code ==  $data['satuanObat']['satuan_kecil'] ? 'selected' : ''}}>{{ strtoupper($option->satuan_barang_name) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="number" class="form-control @error('qty_satuan_kemasan') is-invalid @enderror" id="qty_satuan_kemasan" name="qty_satuan_kemasan" value="{{$data['satuanObat']['qty_satuan_kemasan']}}" style="flex: 1;">
                                                                    </div>
                                                                    @error('satuan_kemasan')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="d-flex">
                                                                <label for="satuan_kemasan_lainya" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Satuan Kemasan Lainya :</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="d-flex">
                                                                        <select class="form-select me-2 @error('satuan_kemasan_lainya') is-invalid @enderror" name="satuan_kemasan_lainya" id="satuan_kemasan_lainya" style="flex: 11;">
                                                                            <option value="">Please Select</option>
                                                                            @foreach ($data['satuanBarang'] as $option)
                                                                                <option value="{{ $option->satuan_barang_code }}" {{$option->satuan_barang_code ==  $data['satuanObat']['satuan_kecil'] ? 'selected' : ''}}>{{ strtoupper($option->satuan_barang_name) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="number" class="form-control @error('qty_satuan_kemasan_lainya') is-invalid @enderror" id="qty_satuan_kemasan_lainya" name="qty_satuan_kemasan_lainya" value="{{$data['satuanObat']['qty_satuan_kemasan_lainya']}}" style="flex: 1;">
                                                                    </div>
                                                                    @error('satuan_kemasan_lainya')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <div class="d-flex">
                                                                <label for="satuan_racik" class="form-label col-lg-3 col-xl-3 col-xxl-2 me-2">Satuan Racik :</label>
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="d-flex">
                                                                        <input type="number" class="form-control me-2 @error('qty_satuan_racik') is-invalid @enderror" id="qty_satuan_racik" name="qty_satuan_racik" value="{{$data['satuanObat']['qty_satuan_racik']}}" style="flex: 1;">
                                                                        <select class="form-select @error('satuan_racik') is-invalid @enderror" name="satuan_racik" id="satuan_racik" style="flex: 11;">
                                                                            <option value="">Please Select</option>
                                                                            @foreach ($data['satuanBarang'] as $option)
                                                                                <option value="{{ $option->satuan_barang_code }}" {{$option->satuan_barang_code ==  $data['satuanObat']['satuan_kecil'] ? 'selected' : ''}}>{{ strtoupper($option->satuan_barang_name) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @error('satuan_racik')
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="col-lg-12 ms-4 mb-4" id="form-stock" style="display: none;">
                                            <div class="row ms-0 me-0" style="width:1400px">
                                                <div class="col-12">
                                                    <div class="table-responsive p-0">
                                                        <table class="table align-items-center mb-0 w-100" id="myTables">
                                                            <thead class="bg-success">
                                                                <tr>
                                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Layanan</th>
                                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Layanan</th>
                                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Minimal</th>
                                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Maximal</th>
                                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock Aktual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $num = 1 ?>
                                                                @foreach ($data['stockLimitObat'] as $item)
                                                                    <tr>
                                                                        <td class="align-middle text-center text-xs">{{ $num++ }}</td>
                                                                        <td class="align-middle text-center text-xs">
                                                                            <input type="text" class="form-control" name="kode_layanan[]" value="{{$item->kode_layanan}}" readonly>
                                                                        </td>
                                                                        <td class="align-middle text-center text-xs">
                                                                            <input type="text" class="form-control" name="nama_layanan[]" value="{{$item->nama_layanan}}" readonly>
                                                                        </td>
                                                                        <td class="align-middle text-center text-xs">
                                                                            <input type="number" class="form-control" id="minimal_stock_{{$item->id}}" value="{{$item->minimal_stock}}" name="minimal_stock[]">
                                                                        </td>
                                                                        <td class="align-middle text-center text-xs">
                                                                            <input type="number" class="form-control" id="maximal_stock_{{$item->id}}" value="{{$item->maximal_stock}}" name="maximal_stock[]">
                                                                        </td>
                                                                        <td class="align-middle text-center text-xs">
                                                                            <input type="number" class="form-control" id="stock_aktual_{{$item->id}}" value="{{$item->stock_aktual}}" name="stock_aktual[]">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 ms-4 mb-4" id="form-spek" style="display: none;width:1500px !important">
                                            <div class="row col-lg-12 ms-1 me-0">
                                                <h5 class="p-2 m-3 mt-4 mb-0" style="background-color: #57AF5B;color:#FDFEFD;width:fit-content;border-radius:5px">Spesifikasi 1</h5>
                                                <div class="col-12 row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="dosis" class="form-label">Dosis :</label>
                                                        <textarea name="dosis" id="dosis" class="form-control @error('dosis') is-invalid @enderror" cols="30" rows="5">{{ $data['spekObat']['dosis'] ?? '' }}</textarea>
                                                        @error('dosis')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="interaksi_obat" class="form-label">Interaksi Obat :</label>
                                                        <textarea name="interaksi_obat" id="interaksi_obat" class="form-control @error('interaksi_obat') is-invalid @enderror" cols="30" rows="5">{{ $data['spekObat']['interaksi_obat'] ?? '' }}</textarea>
                                                        @error('interaksi_obat')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="isi_kandungan" class="form-label">Isi Kandungan :</label>
                                                        <textarea name="isi_kandungan" id="isi_kandungan" class="form-control @error('isi_kandungan') is-invalid @enderror" cols="30" rows="5">{{ $data['spekObat']['isi_kandungan'] ?? '' }}</textarea>
                                                        @error('isi_kandungan')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <h5 class="p-2 m-3 mt-4 mb-0" style="background-color: #57AF5B;color:#FDFEFD;width:fit-content;border-radius:5px">Spesifikasi 2</h5>
                                                <div class="col-12 row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="cara_kerja_obat" class="form-label">Cara Kerja Obat :</label>
                                                        <textarea name="cara_kerja_obat" id="cara_kerja_obat" class="form-control @error('cara_kerja_obat') is-invalid @enderror" cols="30" rows="5">{{ $data['spekObat']['cara_kerja_obat'] ?? '' }}</textarea>
                                                        @error('cara_kerja_obat')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="indikasi" class="form-label">Indikasi :</label>
                                                        <textarea name="indikasi" id="indikasi" class="form-control @error('indikasi') is-invalid @enderror" cols="30" rows="5">{{ $data['spekObat']['indikasi'] ?? '' }}</textarea>
                                                        @error('indikasi')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="kontraindikasi" class="form-label">Kontraindikasi :</label>
                                                        <textarea name="kontraindikasi" id="kontraindikasi" class="form-control @error('kontraindikasi') is-invalid @enderror" cols="30" rows="5">{{ $data['spekObat']['kontraindikasi'] ?? '' }}</textarea>
                                                        @error('kontraindikasi')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="peringatan" class="form-label">Peringatan dan Perhatian :</label>
                                                        <textarea name="peringatan" id="peringatan" class="form-control @error('peringatan') is-invalid @enderror" cols="30" rows="5">{{ $data['spekObat']['peringatan'] ?? '' }}</textarea>
                                                        @error('peringatan')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <h5 class="p-2 m-3 mt-2 mb-0" style="background-color: #57AF5B;color:#FDFEFD;width:fit-content;border-radius:5px">Spesifikasi 3</h5>
                                                <div class="col-12 row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="farmakologi" class="form-label">Farmakologi :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('farmakologi') is-invalid @enderror" name="farmakologi" id="farmakologi">
                                                                <option value="">Please Select</option>
                                                                @foreach ($data['farmakologi'] as $item)
                                                                    <option value="{{$item->farmakologi_code}}" {{$item->farmakologi_code == $data['spekObat']['farmakologi'] ? 'selected' : ''}}>{{$item->farmakologi_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('farmakologi')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 ms-4 mb-4" id="form-distributor" style="display: none;width:1500px !important">
                                            <div class="row col-lg-12 ms-1 me-0">
                                                <div class="col-12 row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="distributor" class="form-label">Distributor :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('distributor') is-invalid @enderror" name="distributor" id="distributor">
                                                                <option value="">Please Select</option>
                                                                @foreach ($data['distributor'] as $item)
                                                                    <option value="{{$item->distributor_code}}" {{$item->distributor_code == $data['distributorObat']['distributor_code'] ? 'selected' : ''}}>{{$item->distributor_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('distributor')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 ms-4 mb-4" id="form-satu-sehat" style="display: none;width:1500px !important">
                                            <div class="row col-lg-12 ms-1 me-0">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-3">
                                                        <label for="code_kfa_variant" class="form-label">Kode KFA Variant (93xxxxxx) :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('code_kfa_variant') is-invalid @enderror" name="code_kfa_variant" id="code_kfa_variant">
                                                                <option value="">Please Select</option>
                                                            </select>
                                                            @error('code_kfa_variant')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <label for="code_kfa_product" class="form-label">Kode KFA Product (92xxxxxx) :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('code_kfa_product') is-invalid @enderror" name="code_kfa_product" id="code_kfa_product">
                                                                <option value="">Please Select</option>
                                                            </select>
                                                            @error('code_kfa_product')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-3">
                                                        <label for="code_kfa_ingredient" class="form-label">Kode KFA Ingredient (93xxxxxx) :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('code_kfa_ingredient') is-invalid @enderror" name="code_kfa_ingredient" id="code_kfa_ingredient">
                                                                <option value="">Please Select</option>
                                                            </select>
                                                            @error('code_kfa_ingredient')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <p class="mt-2" style="font-size:12px">Daftar Kode obat dapat dilihat dalam browser kamus KFA (Kamus Farmasi & Alat Kesehatan) pada link berikut : https://dto.kemkes.go.id/kfa-browser</p>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="cara_pakai" class="form-label">Cara Pakai :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('cara_pakai') is-invalid @enderror" name="cara_pakai" id="cara_pakai">
                                                                <option value="">Please Select</option>
                                                                @foreach ($data['caraPakai'] as $item)
                                                                    <option value="{{$item->cara_pakai_name}}" {{$item->cara_pakai_name == $data['satuSehat']->cara_pakai ? 'selected' : ''}}>{{$item->cara_pakai_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('cara_pakai')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <p class="mt-2" style="font-size:12px">Berisi data yang berkaitan dengan cara/rute yang digunakan untuk memasukkan obat ke dalam tubuh yang nilainya mengacu pada data terminologi WHO ATC/DDD.</p>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="pola_pemberian" class="form-label">Pola Pemberian :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('pola_pemberian') is-invalid @enderror" name="pola_pemberian" id="pola_pemberian">
                                                                <option value="">Please Select</option>
                                                                <option value="Continuous long term therapy"{{$data['satuSehat']->pola_pemberian == 'Continuous long term therapy' ? 'selected' : ''}}>Continuous long term therapy</option>
                                                                <option value="Short course (acute) therapy"{{$data['satuSehat']->pola_pemberian == 'Short course (acute) therapy' ? 'selected' : ''}}>Short course (acute) therapy</option>
                                                                <option value="Seasonal" {{$data['satuSehat']->pola_pemberian == 'Seasonal' ? 'selected' : ''}}>Seasonal</option>
                                                            </select>
                                                            @error('pola_pemberian')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <p class="mt-2" style="font-size:12px">Berisi data yang mendeskripsikan keseluruhan pola pemberian obat pada pasien dengan tipe data Coding yang nilainya mengacu pada data terminologi MedicationRequest Course of Therapy Codes.</p>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="bentuk_sediaan_obat" class="form-label">Bentuk/Sediaan Obat :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('bentuk_sediaan_obat') is-invalid @enderror" name="bentuk_sediaan_obat" id="bentuk_sediaan_obat">
                                                                <option value="">Please Select</option>
                                                                @foreach ($data['bentukSediaanObat'] as $item)
                                                                    <option value="{{$item->bentuk_sediaan_name}}" {{$data['satuSehat']->bentuk_sediaan_obat == $item->bentuk_sediaan_name ? 'selected' : ''}}>{{$item->bentuk_sediaan_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('bentuk_sediaan_obat')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <p class="mt-2" style="font-size:12px">Berisi data yang menjelaskan bentuk dari sediaan obat yang merujuk pada Peraturan Kepala Badan Pengawas Obat dan Makanan Republik Indonesia Nomor 24 Tahun 2017.</p>
                                                    </div>

                                                    <p style="color:red;font-size:13px">*Wajib diisi bila Bridging dengan Satu Sehat</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 ms-4 mb-4" id="form-bpjs" style="display: none;width:1500px !important">
                                            <div class="row col-lg-12 ms-1 me-0">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-3">
                                                        <label for="code_obat_dpoh" class="form-label">Kode Obat DPHO :</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <select class="form-select @error('code_obat_dpoh') is-invalid @enderror" name="code_obat_dpoh" id="code_obat_dpoh">
                                                                <option value="">Please Select</option>
                                                            </select>
                                                            @error('code_obat_dpoh')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <p style="color:red;font-size:13px">*Wajib diisi bila Bridging dengan BPJS</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="{{route('data-obat')}}" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
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
