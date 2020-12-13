@extends('layouts.noheader')

@section('title')
  Greetings
@endsection

@section('style')
    .top-margin {
        margin-top: 120px;
    }
@endsection

@section('page-content')
    <div class="container mb-5">
        <div class="top-margin mb-4">
            Hallo,
            <br>
            <br>
            Kuisioner penilaian pasangan kata yang akan Anda ikuti dirancang untuk berkontribusi dalam pekerjaan akademis saya pada bidang Text Mining (Penambangan Data). Ruang lingkup dan aturan penelitian dirangkum di bawah ini.
            <br>
            <br>
            Anda diminta untuk menilai pasangan kata, nilai yang harus Anda berikan antara 0 sampai 9.
            <br>
            Kuisioner terdiri dari 500 pasang kata atau 1000 kosa kata yang diambil dari beberapa artikel, diantaranya 250 Noun (Kata Benda) dan 250 Verb (Kata Kerja).
            <br>
            Berikan jawaban yang paling tepat sesuai penilaian subjektif Anda. Tidak ada pertanyaan yang memiliki jawaban benar atau salah.
            <br>
            Beberapa kata mungkin tampak keliru, canggung, dan dibuat-buat sekilas. Tidak peduli seberapa tidak biasanya, itu adalah makna yang muncul di pikiran Anda ketika Anda membaca kata tersebut.
            <br>
            <br>
            Diperkirakan membutuhkan waktu sekitar 1 - 2 jam jika dilakukan tanpa istirahat. Anda diperbolehkan mengisi kuisioner secara bertahap, data diri dan penilaian yang sudah disubmit hanya akan tersimpan jika Anda mengisi kuisioner dengan device yang sama seperti awal/sebelumnya.
            <br>
            Waktu pengisian selama 7 hari, dimulai dari tanggal 13 - 20 Desember 2020.
            <br>
            <br>
            Terimakasih sebelumnya atas dukungan dan kesabaran Anda.
            <br>
            <br>
            Fetra Moira Fiermansyah
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
        </div>
        <div class="d-flex justify-content-center">
            <button onclick="checkSession()" class="btn btn-primary" style="padding: 8px 64px;">Mulai</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Anda sudah pernah mengisi kuisioner, apakah ingin melanjutkan?
              </div>
              <div class="modal-footer">
                <a href="/registration" class="btn btn-secondary" style="padding: 8px 32px;">Dari Awal</a>
                <button onclick="gotoSession()" type="button" class="btn btn-primary" style="padding: 8px 32px;">Lanjut</button>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var code = localStorage.getItem("code");
        var page = localStorage.getItem("page");

        function checkSession() {
            if (code && page) {
                $('#modalSession').modal('show')
            }
            else {
                window.location.href = '/registration'
            }
        }

        function gotoSession() {
            window.location.href = '/quisionaire?page='+page+'&code='+code
        }
    </script>
@endsection