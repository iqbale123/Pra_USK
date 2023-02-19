<div class="modal fade" id="tambah-buku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.add.buku') }}" method="post">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="judul" required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kategori</label>
                <select name="kategori_id" id="" class="form-select">

                    <option >Pilih Opsi</option>

                    @foreach($kategoris as $k)
                    <option value="{{$k->id}}" >{{$k->nama}}</option>

                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                <select name="penerbit_id" id="" class="form-select">

                    <option >Pilih Opsi</option>

                    @foreach($penerbit as $p)
                    <option value="{{$p->id}}" >{{$p->nama}}</option>

                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="pengarang" required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                <input type="date" class="form-control" id="formGroupExampleInput" placeholder="" name="tahun_terbit" required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Isbn</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="isbn" required >
             </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">jumlah buku baik</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="j_buku_baik" required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">jumlah buku rusak</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="j_buku_rusak" required >
             </div>

             <div class="col-12 mb-4">
                <div class="form-group">
                    <label>Upload Gambar Buku</label>
                    <input type="file" class="form-control" name="foto"
                        placeholder="Gambar" />
                </div>
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
