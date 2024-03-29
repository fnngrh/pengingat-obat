@extends('layout.master')
@section('title')
Pasien
@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Cari Pasien
            </h4>
            <form @submit.prevent="searchPasien()" @keydown="form.onKeydown($event)" id="formPasien">
                <div class="row my-4">
                    <div class="col md-12">
                        <div class="form-row">
                            <label class="col-lg-2" for="no_rm"> No RM </label>
                            <div class="form-group col-md-8">
                                <input v-model="form.no_rm" id="no_rm" type="text" min=0 placeholder="Masukkan No RM"
                                    class="form-control">
                                <has-error :form="form" field="no_rm"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="nama_pasien"> Nama Pasien </label>
                            <div class="form-group col-md-8">
                                <input v-model="form.nama_pasien" id="nama_pasien" type="text" min=0
                                    placeholder="Masukkan Nama Pasien" class="form-control">
                                <has-error :form="form" field="nama_pasien"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="alamat"> Alamat </label>
                            <div class="form-group col-md-8">
                                <input v-model="form.alamat" id="alamat" type="text" min=0 placeholder="Masukkan Alamat"
                                    class="form-control">
                                <has-error :form="form" field="alamat"></has-error>
                            </div>
                        </div>
                    </div>
                    <div class="col md-12">
                        <div class="form-row">
                            <label class="col-lg-2" for="tanggal_lahir">Tanggal Lahir</label>
                            <div class="form-group col-md-8">
                                <input v-model="form.tanggal_lahir" id="tanggal_lahir" type="date"
                                    placeholder="Input tanggal lahir" class="form-control">
                                <has-error :form="form" field="tanggal_lahir"></has-error>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-lg-2" for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.jenis_kelamin" onchange="selectTrigger()" name="jenis_kelamin"
                                    style="width: 100%" class="form-control custom-select" placeholder="Pilih Jenis Kelamin">
                                    <option disabled value="">- Pilih Jenis Kelamin -</option>
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
                                    placeholder="Masukkan No Telpon" class="form-control">
                                <has-error :form="form" field="no_telp"></has-error>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-reset" data-dismiss="modal" @click="resetData()">Reset</button>
                    <button type="submit" class="btn btn-search">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Pilih Data Pasien
                        <button type="button" class="btn btn-primary btn-rounded float-right mb-3"
                            @click="createModal()"><i class="fas fa-plus-circle"></i> Pasien Baru</button>
                    </h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item, index in mainData" :key="index">
                                    <td>@{{ item.no_rm == 'null' ? '' : item.no_rm}}</td>
                                    <td>@{{ item.nama_pasien == 'null' ? '' : item.nama_pasien}}</td>
                                    <td>@{{ item.jenis_kelamin == 'null' ? '' : item.jenis_kelamin}}</td>
                                    <td>@{{ item.tanggal_lahir == 'null' ? '' : item.tanggal_lahir}}</td>
                                    <td>@{{ item.alamat == 'null' ? '' : item.alamat}}</td>
                                    <td>@{{ item.no_telp == 'null' ? '' : item.no_telp}}</td>
                                    <td>
                                        <a v-bind:href="getUrl(item.id)" class="btn btn-blue"
                                            data-toggle="tooltip" data-placement="top" data-original-title="Pilih"><i
                                                ></i>Pilih</a>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" v-show="!editMode" id="myLargeModalLabel">Tambah Pasien</h4>
                <h4 class="modal-title" v-show="editMode" id="myLargeModalLabel">Edit Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form @submit.prevent="storeData()" @keydown="form.onKeydown($event)" id="form">
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
        </div>
    </div>
</div>
@endsection


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function selectTrigger() {
        app.inputSelect()
    }
    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: '',
                no_rm: '',
                nama_pasien: '',
                tanggal_lahir: '',
                jenis_kelamin: '',
                no_telp: '',
                alamat: '',
            }),
        },
        mounted() {
            $('#table').DataTable()
            this.refreshData()
            $('#jenis_kelamin').select2({
                placeholder: "Pilih Jenis Kelamin"
            });
        },
        methods: {
            getUrl(id) {
                url = "/detailPasien/" + id
                return url
            },
            createModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#modal').modal('show');
            },
            editModal(data) {
                this.editMode = true;
                this.form.fill(data)
                this.form.clear();
                $('#modal').modal('show');
            },
            resetData(){
                this.form.reset();
                this.form.clear();
                this.refreshData()
            },
            storeData() {
                this.form.post("{{ route('pasien.store') }}")
                    .then(response => {
                        $('#modal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            'Pasien berhasil ditambahkan',
                            'success'
                        )
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            inputSelect() {
                this.form.jenis_kelamin = $("#jenis_kelamin").val()
            },
            searchPasien() {
                this.form.post("{{ route('searchPasien') }}")
                    .then(response => {
                        $('#table').DataTable().destroy()
                        let dataPasien = response.data;
                        const datas = dataPasien.map(data => ({
                            tanggal_lahir: moment(data.tanggal_lahir).locale('id').format(
                                'DD MMMM YYYY'),
                            tanggal_lahir_edit: data.tanggal_lahir,
                            id: data.id,
                            no_rm: data.no_rm,
                            nama_pasien: data.nama_pasien,
                            jenis_kelamin: data.jenis_kelamin,
                            no_telp: data.no_telp,
                            alamat: data.alamat,
                        }));
                        this.mainData = datas
                        this.$nextTick(function () {
                            $('#table').DataTable();
                        })
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            refreshData() {
                axios.get("{{ route('pasien.all') }}")
                    .then(response => {
                        $('#table').DataTable().destroy()
                        let dataPasien = response.data;
                        const datas = dataPasien.map(data => ({
                            tanggal_lahir: moment(data.tanggal_lahir).locale('id').format(
                                'DD MMMM YYYY'),
                            tanggal_lahir_edit: data.tanggal_lahir,
                            id: data.id,
                            no_rm: data.no_rm,
                            nama_pasien: data.nama_pasien,
                            jenis_kelamin: data.jenis_kelamin,
                            no_telp: data.no_telp,
                            alamat: data.alamat,
                        }));
                        this.mainData = datas
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
