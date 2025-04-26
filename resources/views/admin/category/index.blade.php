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

                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-end">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            {{ __('admin/category.index.button.add') }}
                        </a>
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
                                <th class="text-center" scope="col">{{ '#' }}</th>
                                <th class="text-center" scope="col">{{ __('admin/category.index.table.th.image') }}</th>
                                <th scope="col">{{ __('admin/category.index.table.th.title') }}</th>
                                <th class="text-center"
                                    scope="col">{{ __('admin/category.index.table.th.sub_category_count.name') }}</th>
                                <th scope="col">{{ __('admin/category.index.table.th.created_by') }}</th>
                                <th scope="col">{{ __('admin/category.index.table.th.created_at') }}</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody id="categories-table-body">
                            @foreach($categories as $category)
                                <tr data-id="{{ $category->id }}" class="sortable-row">
                                    <td>
                                        <input
                                            type="number"
                                            min="1"
                                            class="form-control form-control-sm order-input text-center"
                                            data-id="{{ $category->id }}"
                                            value="{{ $category->sort_order }}"
                                            style="max-width: 4rem; margin: 0 auto;"
                                        >
                                    </td>
                                    <td class="text-center">
                                        <img src="/{{ $category->image }}" width="150" alt="">
                                    </td>
                                    <td>
                                        <p>{{ \Illuminate\Support\Str::limit($category->title_tr, 30) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.sub-category.index') }}"
                                           class="badge badge-light-{{ $category->children_count ? 'success' : 'danger' }}"
                                           title="{{ $category->children_count ? __('admin/category.index.table.th.sub_category_count.title.sub_cat') : __('admin/category.index.table.th.sub_category_count.title.no_asub_cat') }}">
                                            {{ __('admin/category.index.table.td.sub_category_count', ['sub_cat_count' => $category->children_count]) }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $category->user->name }}
                                    </td>
                                    <td>
                                        {{ Carbon::parse($category->created_at)->translatedFormat('d F Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a href="{{ route('admin.category.edit', $category) }}"
                                               class="action-btn btn-edit bs-tooltip me-2"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ __('admin/category.index.table.th.actions.update') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit-2">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </a>

                                            <form id="category-delete-form-{{ $category->id }}"
                                                  action="{{ route('admin.category.destroy', ['category' => $category]) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                            <a href="{{ route('admin.category.destroy', ['category' => $category->id]) }}"
                                               class="action-btn btn-delete bs-tooltip"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ __('admin/category.index.table.th.actions.delete') }}"
                                               onclick="event.preventDefault();
                                                         if (confirm('Bu kategoriyi silmek, bu kategoriye ait tüm alt kategoriler ve ürünleri siler. Devam etmek istediğinize emin misiniz?')) {
                                                             document
                                                               .getElementById('category-delete-form-{{ $category->id }}')
                                                               .submit();
                                                         }">
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

                    <div class="text-center mt-3">
                        {{ $categories->links() }}
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

@section('adminPageCs')
    <style>
        /* Spin düğmelerini gizleyelim (isteğe bağlı) */
        .order-input::-webkit-inner-spin-button,
        .order-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hover ve focus efekte renk katarız */
        .order-input {
            border-radius: .25rem;
            transition: border-color .3s, box-shadow .3s;
        }

        .order-input:focus {
            border-color: #80bdff;
            box-shadow: 0 0 .2rem rgba(0,123,255,.25);
            outline: none;
        }
    </style>
@endsection

@section('adminPageJs')
    <script>
        $(function(){
            $('.order-input').on('change', function(){
                const $inp     = $(this);
                const id       = $inp.data('id');
                const newOrder = parseInt($inp.val(), 10);

                if (isNaN(newOrder) || newOrder < 1) {
                    alert('Lütfen 1 veya daha büyük bir sayı girin.');
                    $inp.val($inp.prop('defaultValue'));
                    return;
                }

                $.ajax({
                    url: '{{ route('admin.category.reorder') }}',
                    method: 'POST',
                    data: {
                        id:    id,
                        order: newOrder,
                        _token: '{{ csrf_token() }}'
                    },
                    success() {
                        // Basitçe sayfayı yenilemek en garantisi:
                        location.reload();
                    },
                    error() {
                        alert('Sıralama güncellenirken bir hata oluştu.');
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>
@endsection
