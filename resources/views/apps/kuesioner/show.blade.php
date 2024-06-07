@extends('layouts.app')
@section('title', $title)
@push('css')
<style>
    .question-block {
        margin-bottom: 15px; /* Adjust the margin as needed */
    }
    .answer-block {
        margin-left: 25px; /* Indent answers slightly */
    }
    .pagination {
        justify-content: center; /* Center align pagination */
    }
    .page-item {
        margin: 0 2px; /* Add some spacing between pagination items */
    }
    .page-item .page-link {
        padding: 5px 10px; /* Adjust padding for smaller buttons */
        font-size: 14px; /* Adjust font size */
    }
</style>
@endpush
@section('content')
<div class="row justify-content-lg-center">
    <div class="col-md-10">
        <div class="card shadow mb-2">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">{{ $data['kriteria']->kriteria_name }}</h6><small class="text-warning">Jawablah perbandingan berikut dengan memilih setuju atau tidak setuju sesuai dengan keadaan anda yang sebenarnya!</small>
            </div>
            <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                <form id="answer-form" action="{{ route('isi-kuesioner.store') }}" method="POST">
                    @csrf
                    <input type="text" name="kriteria_id" value="{{ $data['kriteria']->id }}" hidden>
                    @foreach ($data['pertanyaan'] as $idx)
                        <div>
                            <p class="mb-1"><b>{{ $loop->iteration }}. {{ $idx->soal }}</b></p>
                            <div class="answer-block">
                                <div class="form-check form-radio-outline form-radio-success mb-2">
                                    <input type="radio" name="jawaban[{{ $idx->perbandingan_code }}][{{ $idx->id }}]" class="form-check-input" value="1" required>
                                    <label class="form-check-label">Setuju</label>
                                </div>

                                <div class="form-check form-radio-outline form-radio-success mb-2">
                                    <input type="radio" name="jawaban[{{ $idx->perbandingan_code }}][{{ $idx->id }}]" class="form-check-input" value="0" required>
                                    <label class="form-check-label">Tidak Setuju</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="card-footer d-none">
                <div class="text-center w-100 py-3 modal-options">
                    <button type="button" class="btn btn-success btn-sm" id="submit-button">Selesai</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menyelesaikan dan menyimpan jawaban Anda?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm-submit">Ya, Simpan</button>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
    $(document).ready(function() {
        function checkAllAnswered() {
            var allAnswered = true;
            $('.answer-block').each(function() {
                var oneChecked = false;
                $(this).find('input[type="radio"]').each(function() {
                    if ($(this).is(':checked')) {
                        oneChecked = true;
                    }
                });
                if (!oneChecked) {
                    allAnswered = false;
                }
            });
            return allAnswered;
        }

        function updateCardFooter() {
            if (checkAllAnswered()) {
                $('.card-footer').removeClass('d-none');
            } else {
                $('.card-footer').addClass('d-none');
            }
        }

        $('input[type="radio"]').on('change', function() {
            updateCardFooter();
        });

        $('#submit-button').on('click', function() {
            if (checkAllAnswered()) {
                $('#confirmationModal').modal('show');
            }
        });

        $('#confirm-submit').on('click', function() {
            $('#answer-form').submit();
        });
    });
</script>
@endpush
