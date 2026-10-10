```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Inventory Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Plus Jakarta Sans', sans-serif; background: #f6f5fa; color: #28243a; }
        a { text-decoration: none; }
        .layout { display: flex; min-height: 100vh; }
        .sidebar { width: 245px; background: #211b30; color: white; padding: 30px 19px; flex-shrink: 0; }
        .brand { font-size: 21px; font-weight: 800; letter-spacing: 1px; padding: 0 12px; }
        .brand span { display: block; color: #b6a1f4; font-size: 10px; letter-spacing: 3px; margin-top: 5px; }
        .menu-title { color: #8e879d; font-size: 10px; font-weight: 700; letter-spacing: 2px; margin: 43px 12px 13px; }
        .menu { display: block; padding: 13px 14px; color: #c8c2d5; border-radius: 10px; font-size: 13px; margin-bottom: 8px; }
        .menu.active { background: #8062c7; color: white; font-weight: 700; }
        .menu:hover { background: #342b48; color: white; }
        .sidebar-note { margin-top: 55px; padding: 16px; border: 1px solid #40364f; border-radius: 12px; color: #bdb5cd; font-size: 11px; line-height: 1.8; }
        .main { flex: 1; min-width: 0; padding: 32px 38px; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 15px; margin-bottom: 35px; }
        .breadcrumb { color: #9690a5; font-size: 12px; margin-bottom: 7px; }
        h1 { font-size: 25px; margin: 0; font-weight: 800; letter-spacing: -0.7px; }
        .subtitle { color: #9690a5; font-size: 12px; margin-top: 8px; }
        .profile { display: flex; align-items: center; gap: 10px; background: white; padding: 9px 14px; border-radius: 12px; box-shadow: 0 3px 15px #30214b08; }
        .avatar { width: 35px; height: 35px; background: #eee7ff; color: #7554bd; display: grid; place-items: center; border-radius: 10px; font-weight: 800; }
        .profile strong { display: block; font-size: 12px; }
        .profile small { color: #9690a5; font-size: 10px; }
        .content { display: grid; grid-template-columns: minmax(0, 1.7fr) minmax(220px, 0.8fr); gap: 22px; align-items: start; }
        .card { background: white; border-radius: 17px; padding: 26px; box-shadow: 0 5px 25px #30214b06; }
        .card-heading { display: flex; align-items: center; gap: 12px; padding-bottom: 21px; border-bottom: 1px solid #f0edf5; margin-bottom: 24px; }
        .heading-icon { width: 43px; height: 43px; display: grid; place-items: center; background: #f0eaff; color: #8062c7; border-radius: 12px; font-size: 21px; }
        .card-heading h2 { margin: 0; font-size: 15px; }
        .card-heading p { margin: 5px 0 0; color: #9690a5; font-size: 11px; }
        .form-group { margin-bottom: 21px; }
        label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 9px; }
        .required { color: #e36b86; }
        input, select, textarea { width: 100%; border: 1px solid #e9e5f0; background: #fdfcff; padding: 12px 14px; border-radius: 9px; font: inherit; font-size: 12px; color: #28243a; outline: none; transition: .2s; }
        input:focus, select:focus, textarea:focus { border-color: #9477d6; box-shadow: 0 0 0 3px #8062c715; }
        textarea { min-height: 105px; resize: vertical; }
        .hint { display: block; color: #a09aac; font-size: 10px; margin-top: 7px; }
        .error { color: #d64f68; font-size: 11px; margin-top: 7px; }
        .alert { padding: 13px 16px; border-radius: 10px; background: #fff0f2; color: #b83e55; font-size: 12px; margin-bottom: 22px; }
        .alert ul { margin: 8px 0 0; padding-left: 20px; }
        .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .actions { display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #f0edf5; padding-top: 22px; margin-top: 7px; }
        .btn { display: inline-flex; justify-content: center; align-items: center; gap: 7px; padding: 12px 17px; border: 0; border-radius: 9px; font: inherit; font-size: 12px; font-weight: 700; cursor: pointer; }
        .btn-primary { color: white; background: #8062c7; box-shadow: 0 5px 12px #8062c72b; }
        .btn-primary:hover { background: #6e50b5; }
        .btn-secondary { color: #777085; background: #f2f0f7; }
        .side-card { background: linear-gradient(145deg, #302641, #211b30); color: white; border-radius: 17px; padding: 24px; }
        .side-icon { width: 49px; height: 49px; display: grid; place-items: center; background: #49395f; border-radius: 14px; font-size: 23px; margin-bottom: 22px; }
        .side-card h3 { margin: 0 0 10px; font-size: 16px; }
        .side-card p { color: #c2b9d0; font-size: 11px; line-height: 1.9; margin: 0; }
        .tips { margin-top: 25px; background: white; border-radius: 15px; padding: 21px; }
        .tips h3 { margin: 0 0 16px; font-size: 13px; }
        .tip { display: flex; gap: 10px; margin-bottom: 15px; font-size: 11px; color: #817a91; line-height: 1.7; }
        .tip:last-child { margin-bottom: 0; }
        .tip-mark { color: #8062c7; font-weight: 800; }
        @media (max-width: 950px) { .sidebar { width: 200px; } .main { padding: 25px 20px; } .content { grid-template-columns: 1fr; } }
        @media (max-width: 650px) { .layout { display: block; } .sidebar { width: 100%; padding: 20px; } .menu-title, .sidebar-note { display: none; } .sidebar nav { display: flex; gap: 8px; margin-top: 18px; } .menu { margin: 0; } .main { padding: 23px 15px; } .topbar { align-items: flex-start; } .profile { display: none; } .card { padding: 20px; } .two-col { grid-template-columns: 1fr; gap: 0; } .actions { flex-wrap: wrap; } }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">INVENTORY<span>MANAGEMENT SYSTEM</span></div>
        <div class="menu-title">MENU UTAMA</div>
        <nav>
            <a href="{{ route('products.index') }}" class="menu">▦ &nbsp; Data Produk</a>
            <a href="{{ route('products.create') }}" class="menu active">＋ &nbsp; Tambah Produk</a>
        </nav>
        <div class="sidebar-note">
            <strong>Inventory System</strong><br>
            Kelola data produk dan persediaan barang dengan lebih mudah.
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="breadcrumb">Inventory / Produk / Tambah Produk</div>
                <h1>Tambah Produk</h1>
                <div class="subtitle">Masukkan informasi produk baru ke dalam inventaris.</div>
            </div>
            <div class="profile">
                <div class="avatar">A</div>
                <div><strong>Administrator</strong><small>Pengelola Inventaris</small></div>
            </div>
        </header>

        <div class="content">
            <section class="card">
                <div class="card-heading">
                    <div class="heading-icon">＋</div>
                    <div>
                        <h2>Informasi Produk</h2>
                        <p>Lengkapi data pada kolom berikut.</p>
                    </div>
                </div>

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

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Produk <span class="required">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" maxlength="150" placeholder="Contoh: Keyboard Wireless" required>
                        @error('name') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori <span class="required">*</span></label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Pilih kategori produk</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi Produk</label>
                        <textarea id="description" name="description" placeholder="Tuliskan keterangan produk jika diperlukan...">{{ old('description') }}</textarea>
                        <span class="hint">Kolom ini boleh dikosongkan jika tidak ada deskripsi.</span>
                        @error('description') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="two-col">
                        <div class="form-group">
                            <label for="price">Harga Produk (Rp) <span class="required">*</span></label>
                            <input type="number" id="price" name="price" value="{{ old('price') }}" min="0.01" step="0.01" placeholder="75000" required>
                            @error('price') <div class="error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock">Jumlah Stok <span class="required">*</span></label>
                            <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0" step="1" placeholder="0" required>
                            @error('stock') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="actions">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">✓ &nbsp; Simpan Produk</button>
                    </div>
                </form>
            </section>

            <aside>
                <div class="side-card">
                    <div class="side-icon">📦</div>
                    <h3>Produk Baru</h3>
                    <p>Tambahkan informasi produk dengan benar agar data inventaris tersimpan secara terstruktur dan mudah dikelola.</p>
                </div>

                <div class="tips">
                    <h3>Petunjuk Pengisian</h3>
                    <div class="tip"><span class="tip-mark">✓</span><span>Nama produk wajib diisi dan maksimal 150 karakter.</span></div>
                    <div class="tip"><span class="tip-mark">✓</span><span>Pilih kategori yang sesuai dengan produk.</span></div>
                    <div class="tip"><span class="tip-mark">✓</span><span>Harga harus lebih besar dari Rp 0.</span></div>
                    <div class="tip"><span class="tip-mark">✓</span><span>Stok diisi dengan bilangan bulat, minimal 0.</span></div>
                </div>
            </aside>
        </div>
    </main>
</div>
</body>
</html>
```