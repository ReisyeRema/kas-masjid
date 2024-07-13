@extends('layout.master')

@section('title', 'Pengeluaran Kas Sosial')

@section('content')
<div class="col-md-12">
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="mb-1">
            <h5><b>Total Pengeluaran Kas Sosial : Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}</b></h5>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Data Pengeluaran Kas Sosial</h4>
                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <!-- Alert -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">Tambah</span>
                                <span class="fw-light">Data Pengeluaran</span>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addPengeluaranForm" method="POST" action="{{ route('pengeluaransosial.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="uraian">Uraian</label>
                                    <input type="text" class="form-control" id="uraian" name="uraian"
                                        placeholder="Masukkan Uraian" required>
                                    @error('uraian')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control currency" id="jumlah" name="jumlah"
                                        placeholder="Masukkan Jumlah" required>
                                    @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="rekening_id">Pilih Rekening</label>
                                    <select class="form-select" id="rekening_id" name="rekening_id">
                                        <option value="">Pilih Rekening</option>
                                        @foreach($rekenings as $rekening)
                                        <option value="{{ $rekening->id }}">{{ $rekening->nama_bank }} - {{ $rekening->no_rek }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('addPengeluaranForm').submit();">Tambah</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Rekening</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaranSosials as $index => $pengeluaranSosial)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pengeluaranSosial->uraian }}</td>
                                <td>Rp {{ number_format($pengeluaranSosial->jumlah, 2, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($pengeluaranSosial->tanggal)->format('d M Y') }}</td>
                                <td>
                                    @if ($pengeluaranSosial->rekening)
                                        {{ $pengeluaranSosial->rekening->nama_bank }} - {{ $pengeluaranSosial->rekening->no_rek }}
                                    @else
                                        -
                                    @endif
                                </td>                                    
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $pengeluaranSosial->id }}"
                                            class="btn btn-link btn-primary btn-lg">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-link btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal{{ $pengeluaranSosial->id }}">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit Data -->
                            <div class="modal fade" id="editModal{{ $pengeluaranSosial->id }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">Edit</span>
                                                <span class="fw-light">Data Pengeluaran</span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editPengeluaranForm{{ $pengeluaranSosial->id }}" method="POST"
                                                action="{{ route('pengeluaransosial.update', $pengeluaranSosial->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="uraian">Uraian</label>
                                                    <input type="text" class="form-control" id="uraian"
                                                        name="uraian" value="{{ $pengeluaranSosial->uraian }}" required>
                                                    @error('uraian')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input type="text" class="form-control currency"
                                                        id="jumlah{{ $pengeluaranSosial->id }}" name="jumlah"
                                                        value="{{ $pengeluaranSosial->jumlah }}" required>
                                                    @error('jumlah')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="date" class="form-control" id="tanggal"
                                                        name="tanggal"
                                                        value="{{ \Carbon\Carbon::parse($pengeluaranSosial->tanggal)->format('Y-m-d') }}"
                                                        required>
                                                    @error('tanggal')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="rekening_id">Pilih Rekening</label>
                                                    <select class="form-select" id="rekening_id" name="rekening_id">
                                                        @foreach($rekenings as $rekening)
                                                        <option value="{{ $rekening->id }}" {{ $pengeluaranSosial->rekening_id == $rekening->id ? 'selected' : '' }}>{{ $rekening->nama_bank }} - {{ $rekening->no_rek }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-primary"
                                                onclick="document.getElementById('editPengeluaranForm{{ $pengeluaranSosial->id }}').submit();">Simpan</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="confirmDeleteModal{{ $pengeluaranSosial->id }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                Konfirmasi Hapus
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <form action="{{ route('pengeluaransosial.destroy', $pengeluaranSosial->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    <script>
        document.querySelectorAll('.currency').forEach((element) => {
            new Cleave(element, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand',
                prefix: 'Rp ',
                rawValueTrimPrefix: true,
            });
        });

        function cleanCurrencyInput(form) {
            form.querySelectorAll('.currency').forEach((element) => {
                let value = element.value.replace(/Rp /g, '').replace(/\./g, '').replace(',', '.');
                element.value = value;
            });
        }

        document.getElementById('addPengeluaranForm').addEventListener('submit', function(event) {
            cleanCurrencyInput(this);
        });

        @foreach ($pengeluaranSosials as $pengeluaranSosial)
            document.getElementById('editPengeluaranForm{{ $pengeluaranSosial->id }}').addEventListener('submit', function(
                event) {
                cleanCurrencyInput(this);
            });
        @endforeach
    </script>
@endpush
