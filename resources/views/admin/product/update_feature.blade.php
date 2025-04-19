@extends('layout.admin.index')

@section('adminPageTitle', $product->title_tr . ' Ürün Özelliklerini Güncelle')

@section('adminPageCss')
    <style>
        .feature-item {
            margin-bottom: 1rem;
        }
        .feature-item .card-footer {
            background: transparent;
            border-top: none;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    </style>
@endsection

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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">{{ $product->title_tr }} Ürün Özelliklerini Güncelle</h4>
                        <button type="button" id="add-feature" class="btn btn-secondary btn-sm">
                            + Yeni Bir Özellik Ekle
                        </button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.feature.update', $product) }}" method="POST">
                            @csrf @method('PUT')

                            <div id="features-wrapper">
                                @foreach($product->features as $feature)
                                    <div class="card feature-item">
                                        <div class="card-header">
                                            <b>{{ $loop->iteration }}. Özellik</b>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" name="existing_features_ids[]" value="{{ $feature->id }}">

                                            <div class="form-group">
                                                <label for="feature-tr-{{ $feature->id }}">Özellik (TR)</label>
                                                <input type="text"
                                                       name="existing_features_tr[{{ $feature->id }}]"
                                                       id="feature-tr-{{ $feature->id }}"
                                                       class="form-control"
                                                       value="{{ $feature->feature_tr }}">
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="feature-en-{{ $feature->id }}">Özellik (EN)</label>
                                                <input type="text"
                                                       name="existing_features_en[{{ $feature->id }}]"
                                                       id="feature-en-{{ $feature->id }}"
                                                       class="form-control"
                                                       value="{{ $feature->feature_en }}">
                                            </div>
                                        </div>

                                        <div class="card-footer text-end">
                                            <button type="button" class="btn btn-danger remove-feature">
                                                Özelliği Sil
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="new-features-wrapper"></div>

                            <button type="submit" class="btn btn-primary mt-3">Ürünün Özelliklerini Güncelle</button>
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
            let wrapper = document.getElementById('new-features-wrapper');
            let index = wrapper.querySelectorAll('.feature-item').length + {{ $product->features->count() }} + 1;

            let card = document.createElement('div');
            card.classList.add('card', 'feature-item');
            card.innerHTML = `
                  <div class="card-header">
                    <b>${index}. Özellik</b>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="new-feature-tr-${index}">Özellik (TR)</label>
                      <input type="text" name="new_features_tr[]" id="new-feature-tr-${index}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                      <label for="new-feature-en-${index}">Özellik (EN)</label>
                      <input type="text" name="new_features_en[]" id="new-feature-en-${index}" class="form-control">
                    </div>
                  </div>
                  <div class="card-footer text-end">
                    <button type="button" class="btn btn-danger remove-feature">
                      Özelliği Sil
                    </button>
                  </div>
                `;

            wrapper.appendChild(card);
        });

        document.addEventListener('click', function (e) {
            let btn = e.target.closest('.remove-feature');
            if (!btn) return;
            let item = btn.closest('.feature-item');
            if (item) item.remove();
        });
    </script>
@endsection
