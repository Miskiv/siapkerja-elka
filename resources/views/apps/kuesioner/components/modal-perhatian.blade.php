<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="perhatianModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Perhatian !</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="perhatianForm{{ $row->id }}" action="{{ route('isi-kuesioner.show', Crypt::encryptString($row->id)) }}" method="GET">
            <div class="modal-body">
                <div class="row p-3 border-bottom">
                    <div class="col-lg-2 col-md-3 text-center">
                        <img src="{{ asset('assets/bootstrap/img/attention-1.png') }}" alt="attention-1.png">
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <h5><strong>Apakah Kamu berada dalam situasi yang tenang?</strong></h5>
                        <p>Untuk hasil optimal, Kamu harus mengerjakan setiap soal dalam kondisi stamina yang fit dan pikiran fokus. Situasi tenang akan mendukung pikiran Kamu untuk fokus. Pastikan pula Kamu tidak sedang mengerjakan aktivitas lain saat mengerjakan asesmen ini.</p>
                    </div>
                </div>
                <div class="row p-3 border-bottom">
                    <div class="col-lg-2 col-md-3 text-center">
                        <img src="{{ asset('assets/bootstrap/img/attention-2.png') }}" alt="attention-2.png">
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <h4><strong>Apakah saluran internet Kamu lancar?</strong></h4>
                        <p>Koneksi internet yang lancar akan mendukung Kamu untuk mengerjakan soal dengan tepat dan hasilnya pun akan valid.</p>
                    </div>
                </div>
                <div class="row p-3 border-bottom">
                    <div class="col-lg-2 col-md-3 text-center">
                        <img src="{{ asset('assets/bootstrap/img/attention-3.png') }}" alt="attention-3.png">
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <h4><strong>Apakah Kamu fokus untuk mengerjakan asesmen ini tanpa ada aktivitas lainnya?</strong></h4>
                    </div>
                </div>
                <div class="text-center w-100 py-3 modal-options">
                    <p class="m-0">Jika YA, silakan melanjutkan.</p>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-warning btn-sm">LANJUT</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>