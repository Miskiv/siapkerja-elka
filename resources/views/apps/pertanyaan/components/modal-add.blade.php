<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('pertanyaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" >Tipe Kriteria</label>
                    <select class="form-control" id="tipe_kriteria" name="tipe_kriteria" required="required">
                        <option disabled selected>Pilih Tipe Kriteria</option>
                        @foreach ($data['kriteria'] as $row)
                            <option value="{{ $row->id }}">{{ $row->kriteria_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-none" id="show_perbandingan">
                    <label class="form-label" >Perbandingan Kriteria</label>
                    <select class="form-control" id="perbandingan_kriteria" name="perbandingan_sub" required="required">
                        <option disabled selected>Pilih Perbandingan Kriteria</option>
                    </select>
                </div>
                <div class="mb-3 d-none" id="show_all_done">
                    <p style="color: red">*Sudah Semua diberikan Pertanyaan</p>
                </div>
                <div class="mb-3 d-none" id="show_pertanyaan">
                    <label class="form-label">Pertanyaan</label>
                    <textarea class="form-control" name="soal" id="soal" cols="10" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>