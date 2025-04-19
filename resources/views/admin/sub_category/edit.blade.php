@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', $subCategory->title . ' Alt Kategorisini Düzenle')

@section('adminBreadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.sub-category.index') }}">
            {{ 'Alt Kategoriler' }}
        </a>
    </li>

    <li class="breadcrumb-item">
        {{ $subCategory->title . ' Alt Kategorisini Düzenle' }}
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
                        <h4>{{ $subCategory->title . ' Alt Kategorisini Düzenle' }}</h4>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form class="row g-3" method="post" action="{{ route('admin.sub-category.update', $subCategory) }}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="col-md-12">
                        <label for="parent_id" class="form-label">{{ __('admin/category.create.form.parent_id.label') }}</label>
                        <select id="parent_id" name="parent_id" placeholder="Ana Kategori Seç..." autocomplete="off"
                                class="form-control">
                            <option value="">Ana Kategori Seç...</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('parent_id', $subCategory->parent_id) == $category->id)>
                                    {{ $category->title_tr }}
                                </option>
                            @endforeach
                        </select>

                        @error('parent_id')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <img src="/{{ $subCategory->image }}" alt="{{ $subCategory->title }}" class="w-100">
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="form-label">{{ 'Alt Kategori Görseli' }}</label>
                            <input type="file" class="form-control" id="image" name="image">

                            @error('image')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror

                            <label for="title_tr" class="form-label mt-4">{{ 'Alt Kategori Adı (TR)' }}</label>
                            <input type="text" class="form-control" id="title_tr" name="title_tr" value="{{ old('title_tr', $subCategory->title_tr) }}"
                                   placeholder="{{ 'Alt Kategori İçin Türkçe Başlık' }}">

                            @error('title_tr')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror

                            <label for="title_en" class="form-label mt-4">{{ 'Alt Kategori Adı (EN)' }}</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $subCategory->title_en) }}"
                                   placeholder="{{ 'Alt Kategori İçin Türkçe Başlık' }}">

                            @error('title_en')
                            <small class="text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4"
                               class="form-label">{{ 'Alt Kategori İçin Açıklama (TR)' }}</label>

                        <div class="row m-1">
                            <div id="description_tr"
                                 data-placeholder="{{ 'Alt Kategori için Türkçe açıklama gir...' }}">
                                {!! old('description_tr', $subCategory->description_tr) !!}
                            </div>

                            <textarea id="hidden_description_tr" name="description_tr" class="d-none">
                                {!! old('description_tr', $subCategory->description_tr) !!}
                            </textarea>
                        </div>

                        @error('description_tr')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="inputAddress"
                               class="form-label">{{ 'Alt Kategori İçin Açıklama (EN)' }}</label>

                        <div class="row m-1">
                            <div id="description_en"
                                 data-placeholder="{{ 'Alt Kategori için İngilizce açıklama gir...' }}">
                                {!! old('description_en', $subCategory->description_en) !!}
                            </div>

                            <textarea id="hidden_description_en" name="description_en" class="d-none">
                                {!! old('description_en', $subCategory->description_en) !!}
                            </textarea>
                        </div>

                        @error('description_en')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit"
                                class="btn btn-primary">{{ 'Alt Kategoriyi Güncelle' }}</button>
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
