@use('Illuminate\Support\Carbon')

@extends('layout.admin.index')

@section('adminPageTitle', 'Ürünler')

@section('adminBreadcrumb')
    <li class="breadcrumb-item">
        {{ 'Ürünler' }}
    </li>
@endsection

@section('adminPageCss')
    <link href="{{ asset('assets/admin/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="../src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/components/modal.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row mb-4">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h4>{{ 'Ürünler' }}</h4>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <a href="{{ route('admin.products.create') }}"
                           class="btn btn-light-success mt-3">{{ 'Yeni Ürün Ekle' }}</a>
                    </div>
                </div>

                @include('shared.admin.session_message')
            </div>


            <div class="widget-content widget-content-area">
                @if($products->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{ 'Ürün Adı' }}</th>
                                <th class="text-center" scope="col">{{ 'Alt Kategori Adı' }}</th>
                                <th class="text-center" scope="col">{{ 'Görseller' }}</th>
                                <th scope="col">{{ __('admin/category.index.table.th.created_at') }}</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <p>{{ $product->title }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $product->category->title }}</p>
                                    </td>
                                    <td class="text-center">
                                       <span class="badge badge-success image-count" data-product-id="{{ $product->id }}" style="cursor:pointer;">
                                            {{ $product->images_count }} Adet Görsel
                                        </span>
                                    </td>
                                    <td>
                                        {{ Carbon::parse($product->created_at)->translatedFormat('d F Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a href="{{ route('admin.similar-products.edit', ['similar_product' => $product]) }}"
                                               class="action-btn btn-view bs-tooltip me-2"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ 'Benzer Ürün Seç' }}"
                                               target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-copy">
                                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                    <path
                                                        d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                                </svg>
                                            </a>

                                            <a href="{{ route('admin.products.edit', $product) }}"
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

                                            <form id="product-delete-form-{{ $product->id }}"
                                                  action="{{ route('admin.products.destroy', ['product' => $product]) }}"
                                                  method="POST"
                                                  style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>

                                            <a href="{{ route('admin.products.destroy', ['product' => $product->id]) }}"
                                               class="action-btn btn-delete bs-tooltip"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ __('admin/category.index.table.th.actions.delete') }}"
                                               onclick="event.preventDefault(); document.getElementById('product-delete-form-{{ $product->id }}').submit();">
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

                        {{ $products->links() }}
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

                        {{ 'Kayıtlarımızda gösterilecek ürün yok. Lütfen ilk önce ürün ekleyiniz!'  }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" role="dialog" aria-labelledby="lightboxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lightboxModalLabel">Ürün Görselleri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="lightboxContent" class="d-flex flex-wrap justify-content-center">
                        <!-- Görseller burada yüklenecek -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script src="{{ asset('assets/admin/js/scrollspyNav.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('.image-count').on('click', function(){
                var productId = $(this).data('product-id');

                $.ajax({
                    url: '/admin/product/images/' + productId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var content = '';
                        // Dönen görsellerin URL'lerini kullanarak preview görüntüleri oluşturuyoruz.
                        $.each(response.images, function(i, imagePath){
                            let path = '{{ asset("' + imagePath + '") }}'
                            content += '<img src="'+ imagePath +'" class="img-thumbnail m-1" style="width: 150px; height:150px; object-fit:cover;">';
                        });
                        $('#lightboxContent').html(content);
                        $('#lightboxModal').modal('show');
                    },
                    error: function(){
                        alert('Görseller yüklenirken bir hata oluştu.');
                    }
                });
            });
        });
    </script>
@endsection
