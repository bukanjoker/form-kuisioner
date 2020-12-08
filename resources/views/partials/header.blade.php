<div class="sticky-top navbar-light bg-light shadow-sm">
    <nav class="navbar app-container">
        <span class="navbar-brand">{{$formTitle}}</span>        
        <span class="navbar-text">
            @yield('user')
            <a href="#" data-toggle="modal" data-target="#modalAbout">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                    <circle cx="8" cy="4.5" r="1"/>
                </svg>
            </a>
        </span>        
    </nav>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalAbout" tabindex="-1" aria-labelledby="modalAbout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tentang Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4 h6 text-center">
                    KUISIONER TUGAS AKHIR
                    <br>
                    DATASET EVALUASI MODEL SEMANTIK UNTUK BAHASA INDONESIA : KESAMAAN DAN KETERKAITAN ANTAR KATA
                </div>
                <div>   
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active h7" id="similar-tab" data-toggle="tab" href="#similar" role="tab" aria-controls="similar" aria-selected="true">SIMILARITY</a>
                        </li>
                        <li class="nav-item" role="presentation">
                                <a class="nav-link h7" id="relate-tab" data-toggle="tab" href="#relate" role="tab" aria-controls="relate" aria-selected="false">RELATEDNESS</a>
                        </li>
                        <li class="nav-item" role="presentation">
                                <a class="nav-link h7" id="rules-tab" data-toggle="tab" href="#rules" role="tab" aria-controls="rules" aria-selected="false">PETUNJUK</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="similar" role="tabpanel" aria-labelledby="similar-tab">
                            <div class="h6">   
                                Kesamaan Kata : SIMILARITY
                            </div>
                            <div>   
                                Kata-kata yang serupa jika menunjuk ke hal yang sama, orang, konsep, situasi atau tindakan.
                                <br><br>
                                Contoh : SUSU - SIRUP
                                <br><br>
                                Kata SUSU dan SIRUP sangat mirip, sama-sama jenis minuman, namun tidak sama.
                                <br>
                                SUSU hasil dari memerah sapi, sedangkan SIRUP olahan dari gula, air dan buah. Kedua kata tersebut sama dalam konteks minuman, namun tidak saling terkait. Sedangkan kata NELAYAN dan IKAN saling terkait, namun memiliki makna yang berbeda.
                            </div>
                        </div>
                        <div class="tab-pane fade" id="relate" role="tabpanel" aria-labelledby="relate-tab">
                            <div class="h6">   
                                Keterkaitan Kata : RELATEDNESS
                            </div>
                            <div>   
                                Relasionalitas dapat ditentukan jauh lebih mudah dari pada kesamaan (SIMILARITAS).
                                <br>
                                Kata-kata yang saling terkait satu sama lain dan sering digunakan dalam konteks yang sama
                                <br><br>
                                Contoh : NELAYAN - IKAN
                                <br><br>
                                Kata NELAYAN dan IKAN sangat terkait, karena digunakan dalam konteks yang sama.
                                <br>
                                Meskipun NELAYAN adalah profesi/pekerjaan dan IKAN adalah jenis hewan air, kedua kata tersebut saling terkait. Sedangkan kata SUSU dan SIRUP tidak saling terkait, namun sama pada konteks minuman saja.
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rules" role="tabpanel" aria-labelledby="rules-tab">
                            <div class="h6">   
                                Petunjuk Pengisian Kuisioner
                            </div>
                            <div>   
                                Responden hanya perlu mengisi nilai kesamaan dan keterkaitan untuk setiap pasang kata.
                                <br><br>
                                Jangkauan Skor =
                                <br>
                                > 0  (sangat tidak sama/tidak saling terkait)
                                <br>
                                > 9 (sangat sama/terkait)
                                <br>
                                Jumlah Kuisioner = 500
                                <br>
                                > Nomor 1 - 250 merupakan Noun (Kata Benda)
                                <br>
                                > Nomor 251 - 500 merupakan Verb (Kata Kerja)
                                <br>
                                Jumlah Responden = 20
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>