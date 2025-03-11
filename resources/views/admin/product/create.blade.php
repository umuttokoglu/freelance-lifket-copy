@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', 'Ürün Ekle')

@section('adminBreadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.category.index') }}">
            {{ 'Ürün Ekle' }}
        </a>
    </li>

    <li class="breadcrumb-item">
        {{ 'Ürün Ekle' }}
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
                        <h4>{{ 'Ürün Ekle' }}</h4>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <form class="row g-3" method="post" action="{{ route('admin.products.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12">
                        <label for="category_id" class="form-label">{{ 'Alt Kategori' }}</label>
                        <select id="category_id" name="category_id" placeholder="Alt Kategori Seç..." autocomplete="off"
                                class="form-control">
                            <option value="">Alt Kategori Seç...</option>

                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" @selected(old('category_id') == $subCategory->id)>
                                    {{ $subCategory->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ 'Ürün Görseli' }}</label>
                        <input type="file" class="form-control" id="image" name="image">

                        @error('image')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="title" class="form-label">{{ 'Ürün Adı' }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                               placeholder="{{ 'Ürün için başlık' }}">

                        @error('title')
                        <small class="text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword4"
                               class="form-label">{{ 'Ürün Açıklama (TR)' }}</label>

                        <div class="row m-1">
                            <div id="description_tr"
                                 data-placeholder="{{ 'Ürün için Türkçe açıklama giriniz...' }}">
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
                               class="form-label">{{ 'Ürün Açıklama (EN)' }}</label>

                        <div class="row m-1">
                            <div id="description_en"
                                 data-placeholder="{{ 'Ürün için İngilizce açıklama giriniz...' }}">
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
                                class="btn btn-primary">{{ 'Ürünü Kaydet' }}</button>
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
