@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', 'Alt Ürün Kategorileri')

@section('adminBreadcrumb')
    <li class="breadcrumb-item">
        {{ 'Alt Ürün Kategorileri' }}
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
                        <h4>{{ 'Alt Ürün Kategorileri' }}</h4>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <a href="{{ route('admin.sub-category.create') }}" class="btn btn-light-success mt-3">{{ 'Yeni Alt Ürün Kategorisi Ekle' }}</a>
                    </div>
                </div>

                @include('shared.admin.session_message')
            </div>


            <div class="widget-content widget-content-area">
                @if($subCategories->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">{{ 'Görsel' }}</th>
                                <th scope="col">{{ 'Alt Kategori Adı' }}</th>
                                <th scope="col">{{ 'Ana Kategori' }}</th>
                                <th class="text-center"
                                    scope="col">{{ 'Ürün Sayısı' }}</th>
                                <th scope="col">{{ 'Oluşturan' }}</th>
                                <th scope="col">{{ 'Oluşturulma Tarihi' }}</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subCategories as $subCategory)
                                <tr>
                                    <td class="text-center">
                                        <img src="/{{ $subCategory->image }}" width="150" alt="">
                                    </td>
                                    <td>
                                        <p>{{ $subCategory->title }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $subCategory->parent->title }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-light-{{ $subCategory->products_count ? 'success' : 'danger' }}"
                                              title="{{ $subCategory->products_count ? __('admin/category.index.table.th.sub_category_count.title.sub_cat') : __('admin/category.index.table.th.sub_category_count.title.no_asub_cat') }}">
                                            {{ $subCategory->products_count . ' Ürün' }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $subCategory->user->name }}
                                    </td>
                                    <td>
                                        {{ Carbon::parse($subCategory->created_at)->translatedFormat('d F Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2"
                                               data-toggle="tooltip" data-placement="top" title="{{ __('admin/category.index.table.th.actions.view') }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                            {{--
                                            <a href="{{ route('admin.sub-category.edit', $subCategory) }}" class="action-btn btn-edit bs-tooltip me-2"
                                               data-toggle="tooltip" data-placement="top" title="{{ __('admin/category.index.table.th.actions.update') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit-2">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </a>
                                            --}}
                                            <form id="sub-category-delete-form-{{ $subCategory->id }}"
                                                  action="{{ route('admin.sub-category.destroy', ['sub_category' => $subCategory]) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                            <a href="{{ route('admin.sub-category.destroy', ['sub_category' => $subCategory]) }}"
                                               class="action-btn btn-delete bs-tooltip"
                                               data-toggle="tooltip" data-placement="top" title="{{ __('admin/category.index.table.th.actions.delete') }}"
                                               onclick="event.preventDefault(); document.getElementById('sub-category-delete-form-{{ $subCategory->id }}').submit();">
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

                        {{ __('admin/category.index.table.empty') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>
@endsection
