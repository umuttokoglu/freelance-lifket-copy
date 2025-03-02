@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', __('admin/category.index.title'))

@section('adminBreadcrumb')
    <li class="breadcrumb-item">
        {{ __('admin/category.index.title') }}
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
                        <h4>{{ __('admin/category.index.table.title') }}</h4>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-light-success mt-3">{{ __('admin/category.index.button.add') }}</a>
                        <a href="{{ route('admin.category.create', ['sub_cat' => 1]) }}" class="btn btn-light-secondary mt-3">{{ __('admin/category.index.button.sub_cat_add') }}</a>
                    </div>
                </div>

                @include('shared.admin.session_message')
            </div>


            <div class="widget-content widget-content-area">
                @if($categories->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">{{ __('admin/category.index.table.th.image') }}</th>
                                <th scope="col">{{ __('admin/category.index.table.th.title') }}</th>
                                <th class="text-center"
                                    scope="col">{{ __('admin/category.index.table.th.sub_category_count.name') }}</th>
                                <th scope="col">{{ __('admin/category.index.table.th.created_by') }}</th>
                                <th scope="col">{{ __('admin/category.index.table.th.created_at') }}</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">
                                        <img src="/{{ $category->image }}" width="150" alt="">
                                    </td>
                                    <td>
                                        <p>{{ $category->title }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-light-{{ $category->children_count ? 'success' : 'danger' }}"
                                              title="{{ $category->children_count ? __('admin/category.index.table.th.sub_category_count.title.sub_cat') : __('admin/category.index.table.th.sub_category_count.title.no_asub_cat') }}">
                                            {{ __('admin/category.index.table.td.sub_category_count', ['sub_cat_count' => $category->children_count]) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $category->user->name }}
                                    </td>
                                    <td>
                                        {{ Carbon::parse($category->created_at)->translatedFormat('d F Y H:i') }}
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
                                            <a href="{{ route('admin.category.edit', $category) }}" class="action-btn btn-edit bs-tooltip me-2"
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

                                            <form id="category-delete-form"
                                                  action="{{ route('admin.category.destroy', ['category' => $category]) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                            <a href="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
                                               class="action-btn btn-delete bs-tooltip"
                                               data-toggle="tooltip" data-placement="top" title="{{ __('admin/category.index.table.th.actions.delete') }}"
                                               onclick="event.preventDefault(); document.getElementById('category-delete-form').submit();">
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
