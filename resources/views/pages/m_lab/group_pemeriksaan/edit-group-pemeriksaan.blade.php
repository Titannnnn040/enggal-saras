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
                  <h6 class="text-white text-capitalize ps-3">Edit Group Pemeriksaan</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                           <!-- Tambahkan link CSS dan JS untuk Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="d-flex col-lg-12 mb-4">
    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
            <div class="d-flex">
                <label for="kelompok" class="form-label col-lg-2 col-xl-2 col-xxl-2">Nama Kelompok:</label>
                <div class="d-flex flex-column col-lg-5 col-xl-5 col-xxl-5">
                    <input type="text" class="form-control" id="kelompok" name="kelompok" disabled value="TESTER-01">
                </div>
            </div>
            <button type="button" class="btn btn-success" id="addRowBtn">
                <i class="fa fa-plus"></i> Tambah
            </button>
        </div>
        <div id="inputContainer" class="col-md-12"></div>
    </div>
</div>

<!-- Template untuk Select -->
<template id="selectTemplate">
    <div class="d-flex align-items-center mb-2 px-4" style="background-color:rgb(243, 243, 243);border:solid rgba(0, 0, 0, 0.123) 1px;border-radius:5px" id="card-drag" draggable="true">
        <select class="form-select select2">
            <option value="">-- Pilih Pemeriksaan --</option>
            <option value="DP144">ACTIFATED PARTIAL THROMBOPLAST</option>
            <option value="DP013">AGREGASI TROMBOSIT</option>
            <option value="DP114">ALBUMIN</option>
            <option value="DP057">AMILASE</option>
            <option value="DP102">AMILUM</option>
        </select>
        <button type="button" class="btn btn-danger removeBtn mt-3">
            <i class="fa fa-times"></i>
        </button>
    </div>
</template>

<script>
    const addRowBtn = document.getElementById('addRowBtn');
    const inputContainer = document.getElementById('inputContainer');
    const selectTemplate = document.getElementById('selectTemplate');

    // Tambah elemen baru
    addRowBtn.addEventListener('click', function () {
        const template = selectTemplate.content.cloneNode(true);
        inputContainer.appendChild(template);

        // Inisialisasi Select2 pada elemen baru
        initializeSelect2();
        initializeDragAndDrop();
    });

    // Hapus elemen
    inputContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeBtn') || e.target.closest('.removeBtn')) {
            e.target.closest('#card-drag').remove();
        }
    });

    // Inisialisasi Select2
    function initializeSelect2() {
        $('.select2').select2({
            placeholder: '-- Pilih Pemeriksaan --',
            allowClear: true,
            width: '100%' // Sesuaikan ukuran dengan container
        });
    }

    // Fungsi untuk menginisialisasi Drag & Drop
    function initializeDragAndDrop() {
        const cards = document.querySelectorAll('#card-drag');
        let draggedCard = null;

        // Drag Start
        cards.forEach((card) => {
            card.addEventListener('dragstart', () => {
                draggedCard = card;
                setTimeout(() => (card.style.display = 'none'), 0);
            });

            card.addEventListener('dragend', () => {
                draggedCard.style.display = 'flex';
                draggedCard = null;
            });
        });

        // Drag Over
        inputContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            const afterElement = getDragAfterElement(inputContainer, e.clientY);
            if (afterElement == null) {
                inputContainer.appendChild(draggedCard);
            } else {
                inputContainer.insertBefore(draggedCard, afterElement);
            }
        });

        // Helper function untuk menemukan elemen setelah posisi mouse
        function getDragAfterElement(container, y) {
            const draggableElements = [
                ...container.querySelectorAll('#card-drag:not([style*="none"])'),
            ];

            return draggableElements.reduce(
                (closest, child) => {
                    const box = child.getBoundingClientRect();
                    const offset = y - box.top - box.height / 2;
                    if (offset < 0 && offset > closest.offset) {
                        return { offset: offset, element: child };
                    } else {
                        return closest;
                    }
                },
                { offset: Number.NEGATIVE_INFINITY }
            ).element;
        }
    }

    // Inisialisasi pertama kali
    initializeSelect2();
    initializeDragAndDrop();
</script>

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