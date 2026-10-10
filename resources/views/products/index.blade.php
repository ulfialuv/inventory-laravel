
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font: 13px 'Plus Jakarta Sans', sans-serif; background: #f6f5fa; color: #28243a; }
        a { text-decoration: none; color: inherit; }
        button, input, select { font: inherit; }
        button, a { -webkit-tap-highlight-color: transparent; }

        /* Sidebar */
        .sidebar { position: fixed; inset: 0 auto 0 0; width: 235px; padding: 28px 18px; display: flex; flex-direction: column; background: #211b30; color: #c7bfd8; }
        .brand { display: flex; align-items: center; gap: 12px; padding: 0 8px 35px; color: white; font-size: 14px; font-weight: 800; }
        .brand-icon { width: 38px; height: 38px; display: grid; place-items: center; border-radius: 12px; background: #a994ec; color: #251d39; font-size: 20px; }
        .brand small { display: block; margin-top: 3px; color: #a69bbd; font-size: 10px; font-weight: 500; }
        .section-label { margin: 0 10px 12px; color: #847997; font-size: 10px; font-weight: 700; letter-spacing: 1.5px; }
        .nav { display: flex; align-items: center; gap: 12px; margin-bottom: 6px; padding: 12px 13px; border-radius: 10px; color: #bcb3cf; font-weight: 600; transition: .2s; }
        .nav:hover, .nav.active { background: #44355f; color: white; }
        .nav.active { box-shadow: inset 3px 0 #b5a0ff; }
        .ico { width: 20px; text-align: center; font-size: 17px; }
        .side-bottom { margin-top: auto; padding: 15px; border: 1px solid #443653; border-radius: 13px; background: #302641; color: #b9afca; font-size: 11px; line-height: 1.8; }
        .side-bottom strong { display: block; margin-bottom: 3px; color: white; font-size: 12px; }

        /* Layout dan header */
        .main { max-width: 1700px; margin-left: 235px; padding: 30px 34px; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 30px; }
        .eyebrow { margin-bottom: 7px; color: #9077ce; font-size: 10px; font-weight: 800; letter-spacing: 1.5px; }
        h1 { color: #29223a; font-size: 27px; font-weight: 800; letter-spacing: -1px; }
        .subtitle { margin-top: 6px; color: #918a9f; font-size: 12px; }
        .profile { display: flex; align-items: center; gap: 10px; padding: 9px 13px; border: 1px solid #eeebf4; border-radius: 12px; background: white; }
        .avatar { width: 34px; height: 34px; display: grid; place-items: center; border-radius: 10px; background: #e9e1fb; color: #7658b7; font-weight: 800; }
        .profile strong, .profile small { display: block; }
        .profile strong { font-size: 12px; }
        .profile small { margin-top: 3px; color: #9991a7; font-size: 10px; }

        /* Statistik */
        .stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 17px; margin-bottom: 25px; }
        .stat { position: relative; overflow: hidden; padding: 21px; border: 1px solid #eeebf4; border-radius: 15px; background: white; }
        .stat-top { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .stat-label { color: #8d869b; font-size: 12px; font-weight: 600; }
        .stat-icon { width: 39px; height: 39px; display: grid; place-items: center; border-radius: 12px; font-size: 18px; }
        .purple { background: #eee8ff; color: #8061c8; }
        .blue { background: #e6efff; color: #527bd1; }
        .green { background: #e2f7ed; color: #31966c; }
        .stat-number { margin-top: 17px; color: #302741; font-size: 30px; font-weight: 800; }
        .stat-note { margin-top: 5px; color: #9991a7; font-size: 11px; }
        .stat::after { position: absolute; right: -28px; bottom: -38px; width: 70px; height: 70px; border-radius: 50%; background: #f5f0ff; content: ""; }

        /* Konten, tombol, dan filter */
        .content { overflow: hidden; border: 1px solid #eeebf4; border-radius: 16px; background: white; }
        .content-head { display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 22px 23px; }
        h2 { font-size: 16px; font-weight: 800; }
        .content-head p { margin-top: 5px; color: #9991a7; font-size: 11px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 6px; padding: 9px 12px; border: 0; border-radius: 8px; font-size: 11px; font-weight: 700; white-space: nowrap; cursor: pointer; transition: .2s; }
        .btn-main { background: #8062c7; color: white; box-shadow: 0 4px 10px #8062c72b; }
        .btn-main:hover { background: #6d50b3; }
        .btn-light { background: #f0ebfb; color: #7556b8; }
        .btn-light:hover { background: #e5dcf8; }
        .btn-delete { background: #fff0f1; color: #d35e72; }
        .btn-delete:hover { background: #ffe0e5; }
        .filter-area { padding: 0 23px 19px; }
        .filter { display: flex; flex-wrap: wrap; gap: 9px; }
        .search-box { position: relative; flex: 1; min-width: 170px; }
        .search-box input { width: 100%; padding-left: 35px; }
        .search-icon { position: absolute; top: 9px; left: 13px; color: #9991a7; }
        input, select { min-width: 0; padding: 10px 12px; border: 1px solid #eae6f1; border-radius: 9px; outline: none; background: #fcfbfe; color: #5c536b; font-size: 11px; }
        input:focus, select:focus { border-color: #aa96e6; box-shadow: 0 0 0 3px #eee8ff; }
        .success { margin: 0 23px 18px; padding: 12px 14px; border-radius: 9px; background: #e8f8ef; color: #268653; font-size: 12px; font-weight: 600; }

        /* Tabel produk */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; white-space: nowrap; }
        thead { background: #faf9fc; }
        th { padding: 13px 20px; color: #928aa1; text-align: left; font-size: 10px; font-weight: 800; letter-spacing: .7px; }
        td { padding: 14px 20px; border-top: 1px solid #f1eef6; color: #6d657c; font-size: 12px; }
        tbody tr:hover { background: #fcfbff; }
        .product-cell { display: flex; align-items: center; gap: 11px; }
        .product-icon { width: 37px; height: 37px; flex-shrink: 0; display: grid; place-items: center; border-radius: 10px; background: #f0ebfb; color: #8062c7; font-size: 16px; }
        .product-name { color: #393047; font-size: 12px; font-weight: 700; }
        .product-id { margin-top: 4px; color: #a39bac; font-size: 10px; }
        .category { display: inline-block; padding: 6px 9px; border-radius: 7px; background: #f4f1fa; color: #786b91; font-size: 10px; font-weight: 700; }
        .price { color: #393047; font-weight: 700; }
        .stock { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 700; }
        .dot { width: 7px; height: 7px; border-radius: 50%; background: #36b37e; }
        .stock.low { color: #d45b70; }
        .stock.low .dot { background: #e46d80; }
        .actions { display: flex; align-items: center; gap: 5px; }
        .actions .btn { padding: 8px 10px; }
        .actions form { margin: 0; }
        .empty { padding: 40px 20px !important; color: #9a92a7 !important; text-align: center; }

        /* Pagination ringkas */
        .pagination { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 14px 20px; border-top: 1px solid #f1eef6; }
        .page-info { color: #918a9f; font-size: 11px; }
        .page-links { display: flex; align-items: center; gap: 4px; }
        .page-links a, .page-links span { min-width: 30px; height: 30px; display: inline-flex; align-items: center; justify-content: center; padding: 0 9px; border: 1px solid #eae6f1; border-radius: 7px; background: white; color: #7556b8; font-size: 11px; }
        .page-links a:hover { background: #f0ebfb; }
        .page-links span[aria-current="page"] { border-color: #8062c7; background: #8062c7; color: white; }
        .page-links span[aria-disabled="true"] { color: #c5bfd0; background: #faf9fc; }
        .page-links svg { width: 14px; height: 14px; }

        @media (max-width: 1100px) {
            .sidebar { width: 200px; }
            .main { margin-left: 200px; padding: 24px; }
            .stats { gap: 10px; }
            .stat { padding: 16px; }
            th, td { padding-right: 14px; padding-left: 14px; }
        }
        @media (max-width: 760px) {
            .sidebar { width: 66px; padding: 24px 8px; }
            .brand { padding: 0 5px 35px; }
            .brand-text, .section-label, .nav-text, .side-bottom { display: none; }
            .brand-icon { width: 42px; height: 42px; }
            .nav { justify-content: center; padding: 13px 5px; }
            .nav .ico { font-size: 20px; }
            .main { margin-left: 66px; padding: 18px 13px; }
            .topbar { align-items: flex-start; }
            .profile { padding: 7px; }
            .profile > div:last-child { display: none; }
            h1 { font-size: 21px; }
            .stats { grid-template-columns: 1fr; }
            .stat-number { font-size: 25px; }
            .content-head { align-items: flex-start; }
            .filter { display: grid; grid-template-columns: 1fr 1fr; }
            .search-box { grid-column: 1 / -1; }
            .filter .btn { width: 100%; }
            .pagination { align-items: flex-start; flex-direction: column; }
            .page-links { flex-wrap: wrap; }
        }
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
            <span class="ico">▤</span><span class="nav-text">Data Produk</span>
        </a>
        <a href="{{ route('products.create') }}" class="nav">
            <span class="ico">＋</span><span class="nav-text">Tambah Produk</span>
        </a>

        <div class="side-bottom">
            <strong>Inventory System</strong>
            Kelola data produk dan stok dalam satu tempat.
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <div class="eyebrow">WORKSPACE / INVENTARIS</div>
                <h1>Dashboard</h1>
                <p class="subtitle">Pantau dan kelola inventaris produk Anda.</p>
            </div>
            <div class="profile">
                <div class="avatar">A</div>
                <div><strong>Administrator</strong><small>Pengelola sistem</small></div>
            </div>
        </header>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <section class="stats">
            <div class="stat">
                <div class="stat-top"><span class="stat-label">Total Produk</span><span class="stat-icon purple">▤</span></div>
                <div class="stat-number">{{ $products->total() }}</div>
                <div class="stat-note">Jumlah seluruh data produk</div>
            </div>
            <div class="stat">
                <div class="stat-top"><span class="stat-label">Kategori Produk</span><span class="stat-icon blue">▦</span></div>
                <div class="stat-number">{{ $categories->count() }}</div>
                <div class="stat-note">Kategori yang tersedia</div>
            </div>
            <div class="stat">
                <div class="stat-top"><span class="stat-label">Produk di Halaman Ini</span><span class="stat-icon green">✓</span></div>
                <div class="stat-number">{{ $products->count() }}</div>
                <div class="stat-note">Data yang sedang ditampilkan</div>
            </div>
        </section>

        <section class="content">
            <div class="content-head">
                <div><h2>Data Produk</h2><p>Daftar produk yang tersimpan dalam sistem.</p></div>
                <a href="{{ route('products.create') }}" class="btn btn-main">＋ Tambah Produk</a>
            </div>

            <div class="filter-area">
                <form action="{{ route('products.index') }}" method="GET" class="filter">
                    <div class="search-box">
                        <span class="search-icon">⌕</span>
                        <input type="text" name="search" placeholder="Cari nama produk..." value="{{ request('search') }}">
                    </div>
                    <select name="category_id">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <select name="sort">
                        <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="name" {{ $sort == 'name' ? 'selected' : '' }}>Nama A–Z</option>
                        <option value="price" {{ $sort == 'price' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="stock" {{ $sort == 'stock' ? 'selected' : '' }}>Stok Terendah</option>
                    </select>
                    <button type="submit" class="btn btn-main">Terapkan</button>
                    <a href="{{ route('products.index') }}" class="btn btn-light">Reset</a>
                </form>
            </div>

            <div class="table-wrap">
                <table>
                    <thead><tr><th>PRODUK</th><th>KATEGORI</th><th>HARGA</th><th>STOK</th><th>AKSI</th></tr></thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <div class="product-cell">
                                        <div class="product-icon">▤</div>
                                        <div><div class="product-name">{{ $product->name }}</div><div class="product-id">ID: {{ $product->id }}</div></div>
                                    </div>
                                </td>
                                <td><span class="category">{{ $product->category->name ?? 'Tanpa Kategori' }}</span></td>
                                <td class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td><span class="stock {{ $product->stock <= 5 ? 'low' : '' }}"><span class="dot"></span>{{ $product->stock }} unit</span></td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-light">Detail</a>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-light">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="empty">Tidak ada produk yang ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                <div class="page-info">
                    Menampilkan {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
                </div>
                <div class="page-links">
                    {{ $products->onEachSide(1)->links('pagination::simple-tailwind') }}
                </div>
            </div>
        </section>
    </main>
</body>
</html>
