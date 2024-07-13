@extends('layout.master')

@section('title', 'Pemasukan Kas Sosial')

@section('content')
<div class="col-md-12">
<div class="alert alert-success alert-dismissible" role="alert">
    <div class="mb-1">
        <h5><b>Total Pemasukan Kas Sosial : Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</b></h5>
    </div>
</div>
</div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Pemasukan Kas Sosial</h4>
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
                                    <span class="fw-light">Data Pemasukan</span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addPemasukanForm" method="POST" action="{{ route('pemasukansosial.store') }}">
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
                                    onclick="document.getElementById('addPemasukanForm').submit();">Tambah</button>
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
                            @foreach ($pemasukanSosials as $index => $pemasukanSosial)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pemasukanSosial->uraian }}</td>
                                    <td>Rp {{ number_format($pemasukanSosial->jumlah, 2, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pemasukanSosial->tanggal)->format('d M Y') }}</td>
                                    <td>
                                        @if ($pemasukanSosial->rekening)
                                            {{ $pemasukanSosial->rekening->nama_bank }} - {{ $pemasukanSosial->rekening->no_rek }}
                                        @else
                                            -
                                        @endif
                                    </td>                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $pemasukanSosial->id }}"
                                                class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-link btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $pemasukanSosial->id }}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit Data -->
                                <div class="modal fade" id="editModal{{ $pemasukanSosial->id }}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">Edit</span>
                                                    <span class="fw-light">Data Pemasukan</span>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editPemasukanForm{{ $pemasukanSosial->id }}" method="POST"
                                                    action="{{ route('pemasukansosial.update', $pemasukanSosial->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="uraian">Uraian</label>
                                                        <input type="text" class="form-control" id="uraian"
                                                            name="uraian" value="{{ $pemasukanSosial->uraian }}" required>
                                                        @error('uraian')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="text" class="form-control currency"
                                                            id="jumlah{{ $pemasukanSosial->id }}" name="jumlah"
                                                            value="{{ $pemasukanSosial->jumlah }}" required>
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
                                                            value="{{ \Carbon\Carbon::parse($pemasukanSosial->tanggal)->format('Y-m-d') }}"
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
                                                            <option value="{{ $rekening->id }}" {{ $pemasukanSosial->rekening_id == $rekening->id ? 'selected' : '' }}>{{ $rekening->nama_bank }} - {{ $rekening->no_rek }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="document.getElementById('editPemasukanForm{{ $pemasukanSosial->id }}').submit();">Simpan</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="confirmDeleteModal{{ $pemasukanSosial->id }}" tabindex="-1"
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
                                                <form action="{{ route('pemasukansosial.destroy', $pemasukanSosial->id) }}"
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

        document.getElementById('addPemasukanForm').addEventListener('submit', function(event) {
            cleanCurrencyInput(this);
        });

        @foreach ($pemasukanSosials as $pemasukanSosial)
            document.getElementById('editPemasukanForm{{ $pemasukanSosial->id }}').addEventListener('submit', function(
                event) {
                cleanCurrencyInput(this);
            });
        @endforeach
    </script>
@endpush
