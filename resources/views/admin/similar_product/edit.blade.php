@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', 'Benzer Ürünler')

@section('adminBreadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.products.index') }}">
            {{ 'Ürünler' }}
        </a>
    </li>

    <li class="breadcrumb-item">
        {{ $product->title . ' Ürününe Benzer Ürünler' }}
    </li>
@endsection

@section('adminPageCss')
    <link href="{{ asset('assets/admin/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row mb-4">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h4>{{ $product->title_tr . ' Ürününe Benzer Ürünler' }}</h4>
                    </div>
                </div>

                @include('shared.admin.session_message')
            </div>

            <div class="widget-content widget-content-area">
                <div class="row mb-5">
                    <div class="row col-md-6">
                        <div class="col-md-4">
                            <img src="/{{ $product->images()->first()->path }}" alt="{{ $product->title_tr }}" class="w-100">
                        </div>
                        <div class="col-md-8">
                            <p>{{ $product->title_tr }}</p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-5">
                        <form class="row g-3" method="post"
                              action="{{ route('admin.similar-products.update', ['similar_product' => $product->id]) }}">
                            @method('PUT')
                            @csrf

                            <div class="col-md-12">
                                <label for="similar_id" class="form-label">{{ 'Ürünler' }}</label>
                                <select id="similar_id" name="similar_id" placeholder="Ürün seç..." autocomplete="off"
                                        class="form-control"
                                    @disabled($products->isEmpty())>
                                    <option value="">Ürün seç...</option>

                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" @selected(old('similar_id') == $product->id)>
                                            {{ $product->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('similar_id')
                                <small class="text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @if($products->isNotEmpty())
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">{{ 'Benzer Ürünü Kaydet' }}</button>
                                </div>
                            @else
                                <p class="alert alert-light-warning">Seçilebilir başka ürün bulunmuyor.</p>
                            @endif
                        </form>
                    </div>
                </div>

                @if($similarProducts->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{ 'Benzer Ürün Adı' }}</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($similarProducts as $product)
                                <tr>
                                    <td>
                                        <p>{{ $product->title_tr }}</p>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <form id="similar-product-delete-form-{{ $product->similar_id }}"
                                                  action="{{ route('admin.similar-products.destroy', ['similar_product' => $product->similar_id, 'product_id' => $product->product_id]) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                            <a href="{{ route('admin.similar-products.destroy', ['similar_product' => $product->similar_id]) }}"
                                               class="action-btn btn-delete bs-tooltip"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ 'Benzer Ürün Sil' }}"
                                               onclick="event.preventDefault(); document.getElementById('similar-product-delete-form-{{ $product->similar_id }}').submit();">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-light-warning alert-dismissible fade show border-0 mb-4" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-x close" data-bs-dismiss="alert">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>

                        {{ 'Bu ürün için benzer ürün seçimi yapılmamış. Yukarıdan benzer ürün ekleyiniz!'  }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>
@endsection
