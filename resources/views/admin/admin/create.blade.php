<div class="modal fade" id="tambah-admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.add.admin') }}" method="post">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">kode</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="kode" required value="{{ $code }}" readonly>
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">fullname</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="fullname" required>
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">username</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="username" required>
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">password</label>
                <input type="password" class="form-control" id="formGroupExampleInput" placeholder="" name="password" required>
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
