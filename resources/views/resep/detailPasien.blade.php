@extends('layout.master')
@section('title')
Pasien
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Buat Resep
                </h4>
                <div class="row">
                    <div class="col-12 mt-4">
                    <div class="card-header">
                    Data Pasien untuk Resep Obat
                    </div>
                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                            <table id="table" class="table table-striped table-bordered no-wrap">
                                
                                    <tr>
                                        <th width="400">No RM</th>
                                        <td width="20px">:</td>
                                        <td>9</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td>Aprillia Renanda</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td>Laki-laki</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>:</td>
                                        <td>07 August 2005</td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>:</td>
                                        <td>083145477841</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td>Jakarta</td>
                                    </tr>
                                
                            </table>
                            <div class="modal-footer">
                        <a><button type="button" class="btn btn-light" data-dismiss="modal">Batal</button></a>
                        <a href="javascript:void(0)" class="btn btn-primary">Lanjutkan</a>
                    </div>
                               
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" v-show="!editMode" id="myLargeModalLabel">Tambah Pasien</h4>
                <h4 class="modal-title" v-show="editMode" id="myLargeModalLabel">Edit Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form @submit.prevent="updateData()" @keydown="form.onKeydown($event)" id="form">
                <div class="modal-body mx-4">
                    <div class="form-row">
                        <label class="col-lg-2" for="no_rm"> No RM </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.no_rm" id="no_rm" type="text" min=0 placeholder="Masukkan No RM"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('no_rm') }">
                            <has-error :form="form" field="no_rm"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="nama_pasien"> Nama Pasien </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.nama_pasien" id="nama_pasien" type="text" min=0
                                placeholder="Masukkan Nama Pasien" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('nama_pasien') }">
                            <has-error :form="form" field="nama_pasien"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="form-group col-md-8">
                            <input v-model="form.tanggal_lahir" id="tanggal_lahir" type="date"
                                placeholder="Input tanggal lahir" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('tanggal_lahir') }">
                            <has-error :form="form" field="tanggal_lahir"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-group col-md-8">
                            <select v-model="form.jenis_kelamin" id="jenis_kelamin" onchange="selectTrigger()"
                                style="width: 100%" class="form-control custom-select"
                                :class="{ 'is-invalid': form.errors.has('jenis_kelamin') }">
                                <option disabled item="">- Pilih Jenis Kelamin -</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <has-error :form="form" field="jenis_kelamin"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="no_telp"> No Telp </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.no_telp" id="no_telp" type="text" min=0
                                placeholder="Masukkan No Telpon" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('no_telp') }">
                            <has-error :form="form" field="no_telp"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="alamat"> Alamat </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.alamat" id="alamat" type="text" min=0 placeholder="Masukkan Alamat"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('alamat') }">
                            <has-error :form="form" field="alamat"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button v-show="!editMode" type="submit" class="btn btn-primary">Simpan</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Ubah</button>
                    </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

    var getDetail = @json($pasien);

    function selectTrigger() {
        app.inputSelect()
    }

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: getDetail.id,
                no_rm: getDetail.no_rm,
                nama_pasien: getDetail.nama_pasien,
                tanggal_lahir: getDetail.tanggal_lahir,
                jenis_kelamin: getDetail.jenis_kelamin,
                no_telp: getDetail.no_telp,
                alamat: getDetail.alamat,
            }),
        },
        mounted() {
            $('#table').DataTable()
            this.refreshData()
            $('[data-fancybox]').fancybox({
                iframe: {
                    preload: false
                }
            })
            $('#jenis_kelamin').select2({
                placeholder: "Pilih Jenis Kelamin"
            });

        },
        methods: {
            getUrl(id) {
                url = "resep/" + id + "/edit"
                return url
            },
            createModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#modal').modal('show');
            },
            detailCard(data) {
                this.editMode = true;
                this.form.fill(data)
                this.form.clear();
                $('#modal').modal('show');
            },
            storeData() {
                this.form.post("{{ route('pasien.store') }}")
                    .then(response => {
                        $('#modal').modal('hide');
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            updateData() {
                url = "{{ route('pasien.update', ':id') }}".replace(':id', this.form.id)
                this.form.put(url)
                    .then(response => {
                        $('#modal').modal('hide');
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            inputSelect() {
                this.form.jenis_kelamin = $("#jenis_kelamin").val()
            },

            deleteData(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        url = "{{ route('pasien.destroy', ':id') }}".replace(':id', id)
                        this.form.delete(url)
                            .then(response => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.refreshData()
                            })
                            .catch(e => {
                                e.response.status != 422 ? console.log(e) : '';
                            })
                    }
                })
            },

            refreshData() {
                axios.get("{{ route('pasien.all') }}")
                    .then(response => {
                        $('#table').DataTable().destroy()
                        this.mainData = response.data
                        this.$nextTick(function () {
                            $('#table').DataTable();
                        })
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            }
        },
    })

</script>
@endpush