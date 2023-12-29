<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
            </div>
            <form action="{{ url('users') }}" method="POST" id="formeditModal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" id="edit_name" name="name" class="form-control" placeholder="Name" value="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" id="edit_email" name="email" class="form-control" placeholder="Email" value="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" id="edit_password" name="password" class="form-control" placeholder="Password" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Divisi</label>
                        <select name="divisi_code" id="edit_devisi" class="form-control" required>
                            <option disabled selected>Please Select Divisi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entitas</label>
                        <select id="edit_entity" name="entitas_code" class="form-control" data-popper-placement="Entity" required>
                            <option disabled>Please Select Entity</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Title</label>
                        <input type="text" id="edit_job_title" name="job_title" class="form-control" placeholder="Job Title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" id="edit_role" class="form-control" required>
                            @foreach($roles as $row)
                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="edit-btn-submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

</script>
