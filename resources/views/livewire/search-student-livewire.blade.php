<div>



    <div class="relative">
        <input type="text" class="form-control form-control-solid mb-3" placeholder="Search Contacts..."
            wire:model="query" wire:keydown.escape="reset" wire:keydown.tab="reset"
            wire:keydown.ArrowUp="decrementHighlight" wire:keydown.ArrowDown="incrementHighlight"
            wire:keydown.enter="selectContact" />

        @foreach ($students as $student)
            <livewire:student-single :student="$student" :key="$student->id" />
            
        @endforeach

        {{ $students->links() }}

        {{-- <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            <div class="list-item">Searching...</div>
        </div> --}}
        {{-- {{ route('show-contact', $contact['id']) }} --}}
        {{-- @if (!empty($query))
            <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="reset"></div>

            <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                @if (!empty($contacts))
                    @foreach ($contacts as $i => $contact)
                        <a href="#"
                            class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}">{{ $contact['name'] }}</a>
                    @endforeach
                @else
                    <div class="list-item">No results!</div>
                @endif
            </div>
        @endif --}}
    </div>

    {{-- <input class="form-control form-control-solid mb-3" type="text" wire:model="search" id="search" placeholder="Search"
        aria-label="search">


    <div class="quick-search quick-search-dropdown quick-search-has-result" id="search_result" @if (empty($search)) hidden @endif>
        <!--begin::Scroll-->
        <div class="quick-search-wrapper scroll ps ps--active-y" data-scroll="true" data-height="325"
            data-mobile-height="200" style="height: 250px; overflow: hidden;">
            <div class="quick-search-result">
                <!--begin::Message-->
                @if ($posts->count() == 0)
                    <div class="text-muted d-none">
                        Santri tidak ditemukan
                    </div>
                @endif

                <!--end::Message-->

                <!--begin::Section-->
                <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
                    Members
                </div>
                <div class="mb-10">
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_20.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Milena Gibson
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                UI Designer
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_15.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Stefan JohnStefan
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Marketing Manager
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Anna Strong
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Software Developer
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Anna Strong
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Software Developer
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Anna Strong
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Software Developer
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Anna Strong
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Software Developer
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Anna Strong
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Software Developer
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Anna Strong
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Software Developer
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 mb-2">
                        <div class="symbol symbol-30  flex-shrink-0">
                            <div class="symbol-label"
                                style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_16.jpg')">
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-3 mt-2 mb-2">
                            <a href="#" class="font-weight-bold text-dark text-hover-primary">
                                Nick Bold
                            </a>
                            <span class="font-size-sm font-weight-bold text-muted">
                                Project Coordinator
                            </span>
                        </div>
                    </div>
                </div>
                <!--end::Section-->

                
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px; height: 325px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 127px;"></div>
            </div>
        </div>
        <!--end::Scroll-->
    </div> --}}



    {{-- <div class="quick-search-wrapper scroll ps ps--active-y" id search data-scroll="true" data-height="325"
        data-mobile-height="200" style="height: 325px; overflow: hidden;">
        <div class="quick-search-result">
            <!--begin::Message-->
            @if ($posts->count() == 0)
                Data not found!
            @endif
            <!--end::Message-->

            <!--begin::Section-->

            <div class="mb-10">
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                        <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/doc.svg"
                            alt="">
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            AirPlus Requirements
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            by Grog John
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                        <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/pdf.svg"
                            alt="">
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            TechNav Documentation
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            by Mary Broun
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                        <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/xml.svg"
                            alt="">
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            All Framework Docs
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            by Nick Stone
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                        <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/files/pdf.svg"
                            alt="">
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            Finance &amp; Accounting Reports
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            by Jhon Larson
                        </span>
                    </div>
                </div>
            </div>
            <!--end::Section-->

            <!--begin::Section-->

            <div class="mb-10">
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label"
                            style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_20.jpg')">
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            Milena Gibson
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            UI Designer
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label"
                            style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_15.jpg')">
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            Stefan JohnStefan
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            Marketing Manager
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label"
                            style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_12.jpg')">
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            Anna Strong
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            Software Developer
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label"
                            style="background-image:url('https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/users/300_16.jpg')">
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            Nick Bold
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            Project Coordinator
                        </span>
                    </div>
                </div>
            </div>
            <!--end::Section-->

            <!--begin::Section-->
            <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
                Files
            </div>
            <div class="mb-10">
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label">
                            <i class="flaticon-psd text-primary"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            79 PSD files generated
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            by Grog John
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label">
                            <i class="flaticon2-supermarket text-warning"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            $2900 worth products sold
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            Total 234 items
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label">
                            <i class="flaticon-safe-shield-protection text-info"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            4 New items submitted
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            Marketing Manager
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30  flex-shrink-0">
                        <div class="symbol-label">
                            <i class="flaticon-safe-shield-protection text-warning"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="#" class="font-weight-bold text-dark text-hover-primary">
                            4 New items submitted
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                            Marketing Manager
                        </span>
                    </div>
                </div>
            </div>
            <!--end::Section-->
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 325px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 127px;"></div>
        </div>
    </div> --}}


</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        })

        var search = document.getElementById("#search");
        var searchResult = document.getElementById("#search_result");
        /* if (search.value != "") {
            searchResult.classList.add("quick-search-has-result");

        } */
        console.log(search)
    </script>
@endpush
