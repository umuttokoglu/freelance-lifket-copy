@extends('layout.admin.index')

@section('adminPageTitle', $product->title . ' Ürün Özelliklerini Güncelle')

@section('adminBreadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.category.index') }}">Ürün Ekle</a>
    </li>
    <li class="breadcrumb-item active">Özellik Güncelle</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 layout-spacing">
                <div class="card">
                    <!-- Kart başlığı: Başlık ve dinamik özellik ekleme butonu -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">{{ $product->title }} Ürün Özelliklerini Güncelle</h4>
                        <button type="button" id="add-feature" class="btn btn-secondary btn-sm">
                            + Yeni Bir Özellik Ekle
                        </button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.feature.update', ['product' => $product]) }}"
                              method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Mevcut Özellikler -->
                            <div id="features-wrapper">
                                @foreach($product->features as $feature)
                                    <div class="form-group feature-item">
                                        <!-- Mevcut özelliğin ID'sini saklamak için hidden input -->
                                        <input type="hidden" name="existing_features_ids[]" value="{{ $feature->id }}">
                                        <label for="feature-{{ $feature->id }}" class="mt-3">Özellik</label>
                                        <div class="input-group">
                                            <input type="text" name="existing_features[{{ $feature->id }}]"
                                                   class="form-control mt-1" id="feature-{{ $feature->id }}"
                                                   placeholder="Özellik girin" value="{{ $feature->feature }}">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger remove-feature">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-minus-circle">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Yeni eklenen özellikler buraya eklenecek -->
                            <div id="new-features-wrapper"></div>

                            <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('adminPageJs')
    <script>
        // Yeni özellik eklemek için buton işlevi
        document.getElementById('add-feature').addEventListener('click', function () {
            var newFeaturesWrapper = document.getElementById('new-features-wrapper');
            var index = newFeaturesWrapper.getElementsByClassName('feature-item').length;
            var newField = document.createElement('div');
            newField.classList.add('form-group', 'feature-item');
            newField.innerHTML =
                '<label for="new-feature-' + index + '" class="mt-3">Özellik</label>' +
                '<div class="input-group">' +
                '<input type="text" name="new_features[]" class="form-control 1" id="new-feature-' + index + '" placeholder="Özellik girin">' +
                '<div class="input-group-append">' +
                '<button type="button" class="btn btn-danger remove-feature"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"stroke-width="2" stroke-linecap="round" stroke-linejoin="round"class="feather feather-minus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="8" y1="12" x2="16" y2="12"></line></svg></button>' +
                '</div>' +
                '</div>';
            newFeaturesWrapper.appendChild(newField);
        });

        // Özellik silme işlemi için event delegation kullanımı
        document.addEventListener('click', function (e) {
            if (e.target.closest('.remove-feature')) {
                var featureItem = e.target.closest('.feature-item');
                if (featureItem) {
                    featureItem.remove();
                }
            }
        });
    </script>
@endsection
