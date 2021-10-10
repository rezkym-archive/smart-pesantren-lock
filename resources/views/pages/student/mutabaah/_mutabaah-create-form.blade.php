<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Mutabaah Yaumiyah <i class="mr-2 d-flex"></i>
                <small class=""> Dalam pengembangan, hubungi bila terjadi masalah! </small>
        </h3>
      </div>
      <div class="card-toolbar">
            {{-- <a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>
                        Back
                    </a> --}}
                    <div class="btn-group">
                        <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>
                            Selesai
                        </button>
                        {{-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav nav-hover flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon flaticon2-reload"></i>
                                        <span class="nav-text">Save & continue</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon flaticon2-add-1"></i>
                                        <span class="nav-text">Save & add new</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon flaticon2-power"></i>
                                        <span class="nav-text">Save & exit</span>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
        </div>
    </div>
    <div class="card-body">
        <!--begin::Form-->
        <form class="form" action="{{ route('student.mutabaah.store') }}" method="POST" id="kt_form">

            @if ($errors->any())
                <div class="form-group mb-8">
                    <x-metronic.validation-errors />
                </div>
            @elseif (session()->has('message'))
                <x-metronic.notice-style-message :type="session('message')['type']"
                    :message="session('message')['message']" />
            @endif

            @csrf
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">Cinta Sholat:</h3>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Shalat Wajib</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_fardhu[]" value="Shubuh" checked />
                                        <span></span>
                                        Shubuh
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_fardhu[]" value="Dzuhur" checked/>
                                        <span></span>
                                        Dzuhur
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_fardhu[]" value="Ashar" checked/>
                                        <span></span>
                                        Ashar
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_fardhu[]" value="Maghrib" checked/>
                                        <span></span>
                                        Maghrib
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_fardhu[]" value="Isya" checked />
                                        <span></span>
                                        Isya
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Shalat Rawatib</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_rawatib" value="1" checked/>
                                        <span></span>
                                        Ya dong masa engga 😋
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Shalat Tahajjud</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_tahajjud" value="1" checked/>
                                        <span></span>
                                        Yakali ga tahajjud 🥱
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Shalat Dhuha</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shalat_dhuha" value="1" checked/>
                                        <span></span>
                                        Buat nambah rezeki, sholat dund 😗
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">Cinta Quran:</h3>
                        <div class="form-group row">
                            <label class="col-3">Berapa juz hari ini?</label>
                            <div class="col-3">
                                <input class="form-control form-control-solid" min="0" max="30" type="number"
                                    name="juz_total" value="{{ old('juz_total') ?? '0' }}" />
                            </div>
                        </div>
                    </div>

                    @if (in_array(now()->format('l'), ['Monday', 'Thursday']))
                        <div class="separator separator-dashed my-10"></div>
                        <div class="my-5">
                            <h3 class="text-dark font-weight-bold mb-10">Cinta Shaum: </h3>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Hari ini kamu puasa?</label>
                                <div class="col-9 col-form-label">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                            <input type="checkbox" name="puasa_sunnah" value="1" />
                                            <span></span>
                                            Ya, puasa
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="separator separator-dashed my-10"></div>
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">Cinta Shadaqoh:</h3>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Hari ini kamu ber-shadaqoh?</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="shadaqoh" value="1" />
                                        <span></span>
                                        Ya, saya shadaqoh
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">Cinta Dzikir:</h3>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Hari ini dzikir pagi?</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="cinta_dzikir[]" value="Pagi" />
                                        <span></span>
                                        Ya, saya dzikir pagi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Hari ini dzikir sore?</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-success">
                                        <input type="checkbox" name="cinta_dzikir[]" value="Sore" />
                                        <span></span>
                                        Ya, saya dzikir petang
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
