@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', __('admin/category.create.title'))

@section('adminBreadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.category.index') }}">
            {{ __('admin/category.index.title') }}
        </a>
    </li>

    <li class="breadcrumb-item">
        {{ __('admin/category.create.title') }}
    </li>
@endsection

@section('adminPageCss')
    <link href="{{ asset('assets/admin/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/admin/plugins/css/dark/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/admin/plugins/css/light/editors/quill/quill.snow.css') }}">
@endsection

@section('content')
    <div id="flLoginForm" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('admin/category.create.title') }}</h4>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form class="row g-3" method="post" action="{{ route('admin.category.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    @if($isSubCategory)
                        <input type="hidden" name="is_sub_category" value="{{ $isSubCategory }}">

                        <div class="col-md-12">
                            <label class="form-label">{{ __('admin/category.create.form.parent_id.label') }}</label>
                            <input type="text" class="form-control" id="parent_id" name="parent_id">

                            @error('parent_id')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    @endif

                    <div class="col-md-6">
                        <label class="form-label">{{ __('admin/category.create.form.image') }}</label>
                        <input type="file" class="form-control" id="image" name="image">

                        @error('image')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="title" class="form-label">{{ __('admin/category.create.form.title.label') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                               placeholder="{{ __('admin/category.create.form.title.placeholder') }}">

                        @error('title')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4"
                               class="form-label">{{ __('admin/category.create.form.description_tr.label') }}</label>

                        <div class="row m-1">
                            <div id="description_tr"
                                 data-placeholder="{{ __('admin/category.create.form.description_tr.placeholder') }}">
                                {{ strip_tags(old('description_tr')) }}
                            </div>

                            <textarea id="hidden_description_tr" name="description_tr" class="d-none">
                                {{ strip_tags(old('description_tr')) }}
                            </textarea>
                        </div>

                        @error('description_tr')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="inputAddress"
                               class="form-label">{{ __('admin/category.create.form.description_en.label') }}</label>

                        <div class="row m-1">
                            <div id="description_en"
                                 data-placeholder="{{ __('admin/category.create.form.description_en.placeholder') }}">
                                {{ strip_tags(old('description_en')) }}
                            </div>

                            <textarea id="hidden_description_en" name="description_en" class="d-none">
                                {{ strip_tags(old('description_en')) }}
                            </textarea>
                        </div>

                        @error('description_en')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit"
                                class="btn btn-primary">{{ __('admin/category.create.button.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>

    <script src="{{ asset('assets/admin/plugins/src/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/src/editors/quill/custom-quill.js') }}"></script>
@endsection
