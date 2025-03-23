@extends('layout.admin.index')

@section('adminPageTitle', $product->title . ' Ürününe Özellik Ekle')

@section('adminBreadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.category.index') }}">Ürün Ekle</a>
    </li>
    <li class="breadcrumb-item active">Özellik Ekle</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 layout-spacing">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">{{ $product->title }} Ürününe Özellik Ekle</h4>
                        <button type="button" id="add-feature" class="btn btn-secondary btn-sm">
                            + Yeni Bir Özellik Ekle
                        </button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.feature.store', ['product' => $product]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <!-- Özellikler Alanı -->
                            <div id="features-wrapper">
                                <div class="form-group">
                                    <label for="feature-0">Özellik</label>
                                    <input type="text" name="features[]" class="form-control mt-1" id="feature-0" placeholder="Özellik girin">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Özellikleri Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script>
        document.getElementById('add-feature').addEventListener('click', function () {
            var wrapper = document.getElementById('features-wrapper');
            var index = wrapper.getElementsByClassName('form-group').length;
            var newField = document.createElement('div');
            newField.classList.add('form-group');
            newField.innerHTML = '<label for="feature-' + index + '" class="mt-3">Özellik ' + (index + 1) + '</label>' +
                '<input type="text" name="features[]" class="form-control mt-1" id="feature-' + index + '" placeholder="Özellik girin">';
            wrapper.appendChild(newField);
        });
    </script>
@endsection
