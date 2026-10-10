
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | Inventory Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Plus Jakarta Sans',sans-serif;background:#f6f5fa;color:#302942;font-size:13px;line-height:1.6}
        a{text-decoration:none}
        .sidebar{position:fixed;inset:0 auto 0 0;width:235px;background:#211b30;color:#c7bfd8;padding:28px 18px}
        .brand{display:flex;align-items:center;gap:12px;padding:0 8px 35px;color:white;font-size:14px;font-weight:800}
        .brand-icon{width:38px;height:38px;border-radius:12px;background:#a994ec;color:#251d39;display:grid;place-items:center;font-size:21px}
        .brand small{display:block;font-size:10px;font-weight:500;color:#a69bbd;margin-top:3px}
        .section-label{font-size:10px;letter-spacing:1.5px;color:#847997;font-weight:700;margin:0 10px 12px}
        .nav{display:flex;align-items:center;gap:12px;padding:12px 13px;margin-bottom:6px;border-radius:10px;font-weight:600;color:#bcb3cf}
        .nav:hover,.nav.active{background:#44355f;color:white}
        .main{margin-left:235px;padding:30px 34px;max-width:1400px}
        .topbar{display:flex;justify-content:space-between;align-items:center;gap:15px;margin-bottom:28px}
        .eyebrow{font-size:10px;font-weight:800;letter-spacing:1.5px;color:#9077ce;margin-bottom:7px}
        h1{font-size:27px;letter-spacing:-1px;font-weight:800;color:#29223a}
        .subtitle{color:#918a9f;font-size:12px;margin-top:6px}
        .profile{display:flex;align-items:center;gap:10px;background:white;border:1px solid #eeebf4;border-radius:12px;padding:9px 13px}
        .avatar{width:34px;height:34px;border-radius:10px;background:#e9e1fb;color:#7658b7;display:grid;place-items:center;font-weight:800}
        .profile strong{display:block;font-size:12px}
        .profile small{display:block;color:#9991a7;font-size:10px;margin-top:3px}
        .back{display:inline-flex;align-items:center;gap:8px;color:#7963a8;font-weight:700;font-size:12px;margin-bottom:20px}
        .back:hover{color:#50368d}
        .layout{display:grid;grid-template-columns:minmax(0,1.5fr) minmax(220px,.75fr);gap:20px;align-items:start}
        .panel{background:white;border:1px solid #eeebf4;border-radius:16px;overflow:hidden}
        .panel-head{padding:22px 24px;border-bottom:1px solid #f0edf5}
        h2{font-size:16px;font-weight:800;letter-spacing:-.3px}
        .panel-head p{font-size:11px;color:#9991a7;margin-top:5px}
        .form-body{padding:24px}
        .form-group{margin-bottom:21px}
        label{display:block;font-size:12px;font-weight:700;color:#514760;margin-bottom:8px}
        .required{color:#d65b70}
        input,select,textarea{width:100%;padding:12px 13px;border:1px solid #e7e2ef;border-radius:9px;background:#fcfbfe;font-family:inherit;font-size:12px;color:#40374e;outline:none;transition:.2s}
        input:focus,select:focus,textarea:focus{border-color:#a48be3;box-shadow:0 0 0 3px #eee8ff;background:white}
        textarea{min-height:110px;resize:vertical;line-height:1.7}
        .hint{font-size:10px;color:#a099ad;margin-top:6px}
        .error{font-size:11px;color:#d34860;margin-top:6px}
        .invalid{border-color:#e58b9a}
        .alert{padding:13px 15px;background:#fff0f1;color:#b63d54;border:1px solid #f8d8dd;border-radius:10px;margin-bottom:22px;font-size:12px}
        .alert strong{display:block;margin-bottom:5px}
        .alert ul{padding-left:18px}
        .actions{display:flex;gap:10px;flex-wrap:wrap;padding-top:5px}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:11px 16px;border:0;border-radius:9px;font-family:inherit;font-size:12px;font-weight:700;cursor:pointer;transition:.2s}
        .primary{background:#8062c7;color:white;box-shadow:0 4px 10px #8062c72b}
        .primary:hover{background:#6d50b3}
        .secondary{background:#f0ebfb;color:#7556b8}
        .secondary:hover{background:#e5dcf8}
        .side-body{padding:22px}
        .preview-icon{height:100px;border-radius:13px;background:linear-gradient(135deg,#eee7ff,#f8f5ff);display:grid;place-items:center;color:#8062c7;font-size:37px;margin-bottom:18px}
        .preview-label{font-size:10px;font-weight:800;letter-spacing:1px;color:#9a8bb7;margin-bottom:7px}
        .preview-name{font-size:18px;font-weight:800;letter-spacing:-.5px;overflow-wrap:anywhere}
        .preview-category{display:inline-block;margin-top:10px;background:#f0eaff;color:#7556b8;padding:5px 9px;border-radius:7px;font-size:10px;font-weight:700}
        .divider{border:0;border-top:1px solid #f0edf5;margin:20px 0}
        .info-row{display:flex;justify-content:space-between;gap:12px;margin-bottom:15px;font-size:11px}
        .info-row span:first-child{color:#9991a7}
        .info-row span:last-child{font-weight:700;text-align:right;overflow-wrap:anywhere}
        .note{background:#f7f4ff;border-radius:10px;padding:13px;font-size:11px;line-height:1.8;color:#796a99}
        @media(max-width:950px){.sidebar{width:200px}.main{margin-left:200px;padding:23px}.layout{grid-template-columns:1fr}}
        @media(max-width:650px){.sidebar{width:65px;padding:24px 8px}.brand{padding:0 5px 35px}.brand-text,.section-label,.nav-text{display:none}.nav{justify-content:center;padding:13px 5px}.nav span:first-child{font-size:20px}.main{margin-left:65px;padding:17px 12px}.profile{padding:7px}.profile div:last-child{display:none}h1{font-size:21px}.panel-head,.form-body,.side-body{padding:17px}.actions .btn{flex:1}}
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">▦</div>
            <div class="brand-text">INVENTORY<small>Management System</small></div>
        </div>

        <div class="section-label">MENU UTAMA</div>
        <a href="{{ route('products.index') }}" class="nav active">
            <span>▤</span><span class="nav-text">Data Produk</span>
        </a>
        <a href="{{ route('products.create') }}" class="nav">
            <span>＋</span><span class="nav-text">Tambah Produk</span>
        </a>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="eyebrow">WORKSPACE / INVENTARIS</div>
                <h1>Edit Produk</h1>
                <p class="subtitle">Perbarui informasi produk yang tersimpan.</p>
            </div>
            <div class="profile">
                <div class="avatar">A</div>
                <div>
                    <strong>Administrator</strong>
                    <small>Pengelola sistem</small>
                </div>
            </div>
        </header>

        <a href="{{ route('products.index') }}" class="back">← Kembali ke Data Produk</a>

        <div class="layout">
            <section class="panel">
                <div class="panel-head">
                    <h2>Informasi Produk</h2>
                    <p>Kolom bertanda <span class="required">*</span> wajib diisi.</p>
                </div>

                <div class="form-body">
                    @if ($errors->any())
                        <div class="alert">
                            <strong>Data belum dapat disimpan.</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nama Produk <span class="required">*</span></label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                maxlength="150"
                                value="{{ old('name', $product->name) }}"
                                placeholder="Masukkan nama produk"
                                class="@error('name') invalid @enderror"
                                required
                            >
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategori <span class="required">*</span></label>
                            <select id="category_id" name="category_id" class="@error('category_id') invalid @enderror" required>
                                <option value="">Pilih kategori produk</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea
                                id="description"
                                name="description"
                                placeholder="Tuliskan deskripsi produk (opsional)"
                                class="@error('description') invalid @enderror"
                            >{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            <div class="hint">Berikan keterangan tambahan tentang produk jika diperlukan.</div>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga Produk (Rp) <span class="required">*</span></label>
                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price', $product->price) }}"
                                min="0.01"
                                step="0.01"
                                placeholder="Contoh: 75000"
                                class="@error('price') invalid @enderror"
                                required
                            >
                            @error('price')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock">Jumlah Stok <span class="required">*</span></label>
                            <input
                                type="number"
                                id="stock"
                                name="stock"
                                value="{{ old('stock', $product->stock) }}"
                                min="0"
                                step="1"
                                placeholder="Masukkan jumlah stok"
                                class="@error('stock') invalid @enderror"
                                required
                            >
                            @error('stock')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            <div class="hint">Stok menggunakan bilangan bulat dan tidak boleh negatif.</div>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn primary">✓ Simpan Perubahan</button>
                            <a href="{{ route('products.index') }}" class="btn secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </section>

            <aside class="panel">
                <div class="side-body">
                    <div class="preview-icon">▤</div>
                    <div class="preview-label">PRODUK YANG DIEDIT</div>
                    <div class="preview-name">{{ $product->name }}</div>
                    <span class="preview-category">{{ $product->category->name }}</span>

                    <hr class="divider">

                    <div class="info-row">
                        <span>ID Produk</span>
                        <span>#{{ $product->id }}</span>
                    </div>
                    <div class="info-row">
                        <span>Harga Saat Ini</span>
                        <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="info-row">
                        <span>Stok Saat Ini</span>
                        <span>{{ $product->stock }} unit</span>
                    </div>
                    <div class="info-row">
                        <span>Diperbarui</span>
                        <span>{{ $product->updated_at->format('d/m/Y') }}</span>
                    </div>

                    <div class="note">
                        <strong>Catatan</strong><br>
                        Pastikan informasi produk sudah benar sebelum menyimpan perubahan.
                    </div>
                </div>
            </aside>
        </div>
    </main>
</body>
</html>
