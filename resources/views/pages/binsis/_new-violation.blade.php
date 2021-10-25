<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                Pelanggaran Santri <i class="mr-2 d-flex"></i>
                <small class=""> Dalam pengembangan, hubungi bila terjadi masalah! </small>
            </h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>
                Back
            </a>
            <div class="btn-group">
                <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-sm"></i>
                    Selesai
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form class="form" id="kt_form">

            {{-- @if ($errors->any())
                <div class="form-group mb-8">
                    <x-metronic.validation-errors />
                </div>
            @elseif (session()->has('message'))
                <x-metronic.notice-style-message :type="session('message')['type']"
                    :message="session('message')['message']" />
            @endif --}}

            @csrf
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <div class="my-5">
                        <div class="form-group row">
                            <label class="col-3">Cari santri</label>
                            <div class="col-9">
                                <div class="typeahead">
                                    <input class="form-control" id="kt_typeahead_4" type="text"
                                        placeholder="Oscar winners" />
                                </div>
                                <div class="form-text text-muted">Custom templates give you full control over
                                    how suggestions get rendered</div>

                                {{-- <div class="form-group row">
                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Custom Templates</label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                       
                                    </div>
                                </div> --}}

                                {{-- <livewire:search-student-livewire /> --}}

                            </div>
                        </div>
                    </div>
                    {{-- <div class="separator separator-dashed my-10"></div>
                    <div class="my-5">
                        <h3 class=" text-dark font-weight-bold mb-10">Pelanggaran:</h3>
                        <div class="form-group row">
                            <label class="col-3">Jenis Pelanggaran</label>
                            <div class="col-9">
                                <select class="form-control form-control-solid">
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="my-52">
                        <h3 class=" text-dark font-weight-bold mb-10">Security:</h3>
                        <div class="form-group row">
                            <label class="col-3">Login verification</label>
                            <div class="col-9">
                                <button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Setup login
                                    verification</button>
                                <div class="form-text text-muted mt-3">
                                    After you log in, you will be asked for additional information to confirm your
                                    identity and protect your account from being compromised.
                                    <a href="#">Learn more</a>.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Password reset verification</label>
                            <div class="col-9">
                                <div class="checkbox-inline">
                                    <label class="checkbox mb-2">
                                        <input type="checkbox" />
                                        <span></span>
                                        Require personal information to reset your password
                                    </label>
                                </div>
                                <div class="form-text text-muted">
                                    For extra security, this requires you to confirm your email or phone number when you
                                    reset your password.
                                    <a href="#" class="font-weight-bold">Learn more</a>.
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-10">
                            <label class="col-3"></label>
                            <div class="col-9">
                                <button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate
                                    your account ?</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-2"></div>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>

@push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"> </script> --}}
    <script src="{{ asset('js/pages/crud/forms/widgets/typeahead.js?v=7.2.8') }}"></script>

    <script type="text/javascript">
        /* var bestPictures = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '/api/search/',
            remote: {
                url: '/api/search/%QUERY',
                wildcard: '%QUERY'
            }
        });

        $('#kt_typeahead_4').typeahead({
            limit: 10,
            source: bestPictures,
            templates: {
                empty: [
                    '<div class="empty-message" style="padding: 10px 15px; text-align: center;">',
                    "unable to find any Best Picture winners that match the current query",
                    "</div>",
                ].join("\n"),
                suggestion: Handlebars.compile(
                    "<div><strong>@{{ name }}</strong> – @{{ id }}</div>"
                ),
            },
        }); */
        /* var dataset = [{
            "year": "2012",
            "value": "Argo",
            "tokens": [
                "Argo"
            ]
        }]
        var route = '{{ route('find-student') }}';

        (function() {
            var timeout;

            $('#kt_typeahead_4').typeahead({
                limit: 10,
                source: function(query, process) {
                    if (timeout) {
                        clearTimeout(timeout);
                    }

                    timeout = setTimeout(function() {
                        return $.get(route, {
                            query: query
                        }, function(data) {
                            return process(data);
                        });
                    }, 500);

                },
                templates: {
                    empty: [
                        '<div class="empty-message">',
                        'unable to find any Best Picture winners that match the current query',
                        '</div>'
                    ].join('\n'),
                    suggestion: Handlebars.compile(
                        '<div><strong>@{{ name }}</strong> – @{{ year }}</div>')
                }
            });
        })(); */



        /* var bestPictures = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '{{ route('find-student') }}', // https://twitter.github.io/typeahead.js/data/films/post_1960.json
            remote: {
                url: 'https://twitter.github.io/typeahead.js/data/films/queries/%QUERY.json',
                wildcard: '%QUERY'
            }
        });


        $('#kt_typeahead_4').typeahead(null, {

            source: bestPictures,
            templates: {
                empty: [
                    '<div class="empty-message" style="padding: 10px 15px; text-align: center;">',
                    'unable to find any Best Picture winners that match the current query',
                    '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile(
                    '<div><strong>@{{ value }}</strong> – @{{ year }}</div>')
            }
        }); */
    </script>
@endpush
