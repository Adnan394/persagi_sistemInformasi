@if ($data==null)

@else
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if ($data->gambar)
                    <img src="{{ Storage::url($data->gambar) }}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{ asset('assets/img/defaultpp.jpeg') }}" alt="Profile" class="rounded-circle">
                    @endif
                    <h2>{{ $data->nama }}</h2>
                    <h3 class="pt-1">{{ $data->no_kta }}</h3>
                    <h3>{{ $data->no_str }}</h3>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-change-password">Change Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Detail Profil</h5>

                            <div class="row">
                                <div class="col col-md-4 label ">Nama Lengkap</div>
                                <div class="col col-md-8">{{ $data->nama }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Tempat Lahir</div>
                                <div class="col col-md-8">{{ $data->tempat_lahir }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Tanggal Lahir</div>
                                <div class="col col-md-8">{{ $data->tanggal_lahir }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Agama</div>
                                <div class="col col-md-8">{{ $data->agama }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">NIK</div>
                                <div class="col col-md-8">{{ $data->nik }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Pendidikan Terakhir</div>
                                <div class="col col-md-8">{{ $data->pendidikan_terakhir }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">No KTA</div>
                                <div class="col col-md-8">{{ $data->no_kta }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">No STR</div>
                                <div class="col col-md-8">{{ $data->no_str }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Tempat Kerja 1</div>
                                <div class="col col-md-8">{{ $data->tempat_kerja_1 }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Alamat Tempat Kerja 1</div>
                                <div class="col col-md-8">{{ $data->alamat_tempat_kerja_1 }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Tempat Kerja 2</div>
                                <div class="col col-md-8">{{ $data->tempat_kerja_2 }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Alamat Tempat Kerja 2</div>
                                <div class="col col-md-8">{{ $data->alamat_tempat_kerja_2 }}</div>
                            </div>

                            <div class="row">
                                <div class="col col-md-4 label">Alamat Tempat Tinggal</div>
                                <div class="col col-md-8">{{ $data->alamat_tinggal }}</div>
                            </div>


                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <!-- Profile Edit Form -->
                            <form action="{{ route('daftarAnggota.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="{{ Storage::url($data->gambar) }}" alt="Profile">
                                        <div class="pt-2">
                                            <input type="file" class="form-control" id="meta-deskripsi"
                                                name="gambar" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#nama" class="col-md-4 col-lg-3 col-form-label">Nama
                                        Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama" type="text" class="form-control"
                                            id="nama" value="{{ $data->nama }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat
                                        Lahir</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="tempat_lahir" type="text" class="form-control"
                                            id="tempat_lahir" value="{{ $data->tempat_lahir }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#tanggal_lahir"
                                        class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="tanggal_lahir" type="date" class="form-control"
                                            id="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#agama"
                                        class="col-md-4 col-lg-3 col-form-label">Agama</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="agama" type="text" class="form-control"
                                            id="agama" value="{{ $data->agama }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nik" type="number" class="form-control"
                                            id="nik" value="{{ $data->nik }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#pendidikan_terakhir"
                                        class="col-md-4 col-lg-3 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="pendidikan_terakhir" type="text" class="form-control"
                                            id="pendidikan_terakhir"
                                            value="{{ $data->pendidikan_terakhir }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#no_kta" class="col-md-4 col-lg-3 col-form-label">No
                                        KTA</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="no_kta" type="text" class="form-control"
                                            id="no_kta" value="{{ $data->no_kta }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#no_str" class="col-md-4 col-lg-3 col-form-label">No
                                        STR</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="no_str" type="text" class="form-control"
                                            id="no_str" value="{{ $data->no_str }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#tempat_kerja_1"
                                        class="col-md-4 col-lg-3 col-form-label">Tempat Kerja 1</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="tempat_kerja_1" type="text" class="form-control"
                                            id="tempat_kerja_1" value="{{ $data->tempat_kerja_1 }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#alamat_tempat_kerja_1"
                                        class="col-md-4 col-lg-3 col-form-label">Alamat Tempat Kerja 1</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="alamat_tempat_kerja_1" type="text"
                                            class="form-control" id="alamat_tempat_kerja_1"
                                            value="{{ $data->alamat_tempat_kerja_1 }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#tempat_kerja_2"
                                        class="col-md-4 col-lg-3 col-form-label">Tempat Kerja 2</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="tempat_kerja_2" type="text" class="form-control"
                                            id="tempat_kerja_2" value="{{ $data->tempat_kerja_2 }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#alamat_tempat_kerja_2"
                                        class="col-md-4 col-lg-3 col-form-label">Alamat Tempat Kerja 2</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="alamat_tempat_kerja_2" type="text"
                                            class="form-control" id="alamat_tempat_kerja_2"
                                            value="{{ $data->alamat_tempat_kerja_2 }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="#alamat_tinggal"
                                        class="col-md-4 col-lg-3 col-form-label">Alamat Tempat Tinggal</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="alamat_tinggal" type="text" class="form-control"
                                            id="alamat_tinggal" value="{{ $data->alamat_tinggal }}">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-settings">

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form>

                                <div class="row mb-3">
                                    <label for="currentPassword"
                                        class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control"
                                            id="currentPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control"
                                            id="newPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword"
                                        class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control"
                                            id="renewPassword">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
@endif