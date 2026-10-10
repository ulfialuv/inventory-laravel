
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk | Inventory Management</title>
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
        .layout{display:grid;grid-template-columns: minmax(0,1.5fr) minmax(230px,.8fr);gap:20px;align-items:start}
        .panel{background:white;border:1px solid #eeebf4;border-radius:16px;overflow:hidden}
        .panel-head{padding:22px 24px;border-bottom:1px solid #f0edf5}
        h2{font-size:16px;font-weight:800;letter-spacing:-.3px}
        .panel-head p{font-size:11px;color:#9991a7;margin-top:5px}
        .product-hero{padding:25px;display:flex;align-items:center;gap:17px;background:linear-gradient(120deg,#fbf9ff,#f2edff)}
        .product-icon{width:68px;height:68px;flex-shrink:0;display:grid;place-items:center;border-radius:18px;background:#e6dcff;color:#7656b8;font-size:30px}
        .product-name{font-size:21px;font-weight:800;letter-spacing:-.7px;overflow-wrap:anywhere}
        .product-id{font-size:11px;color:#9288a5;margin-top:5px}
        .category{display:inline-block;margin-top:10px;background:#e7defb;color:#7556b8;border-radius:7px;padding:5px 10px;font-size:10px;font-weight:700}
        .details{padding:8px 24px 18px}
        .detail-row{display:grid;grid-template-columns:165px minmax(0,1fr);gap:15px;padding:17px 0;border-bottom:1px solid #f0edf5}
        .detail-row:last-child{border-bottom:0}
        .label{font-size:12px;color:#938ba0;font-weight:600}
        .value{font-size:12px;color:#3e354c;font-weight:600;overflow-wrap:anywhere}
        .description{font-weight:400;line-height:1.8}
        .side-panel{padding:22px}
        .metric{padding:19px;border-radius:13px;margin-top:15px}
        .metric.price{background:#f0eaff}
        .metric.stock{background:#e7f7ef}
        .metric-label{font-size:11px;font-weight:600;color:#837795}
        .metric-value{font-size:24px;font-weight:800;letter-spacing:-.7px;margin-top:7px;overflow-wrap:anywhere}
        .price .metric-value{color:#7454b6}
        .stock .metric-value{color:#27865d}
        .metric-note{font-size:10px;color:#8b829a;margin-top:4px}
        .actions{display:grid;gap:9px;margin-top:23px}
        .btn{display:flex;align-items:center;justify-content:center;gap:8px;padding:12px 15px;border-radius:9px;font-family:inherit;font-size:12px;font-weight:700;border:0;cursor:pointer;transition:.2s}
        .primary{background:#8062c7;color:white;box-shadow:0 4px 10px #8062c72b}
        .primary:hover{background:#6d50b3}
        .secondary{background:#f0ebfb;color:#7556b8}
        .secondary:hover{background:#e5dcf8}
        .timestamp{font-size:11px;color:#9991a7;margin-top:20px;padding-top:17px;border-top:1px solid #f0edf5;line-height:2}
        @media(max-width:950px){.sidebar{width:200px}.main{margin-left:200px;padding:23px}.layout{grid-template-columns:1fr}}
        @media(max-width:650px){.sidebar{width:65px;padding:24px 8px}.brand{padding:0 5px 35px}.brand-text,.section-label,.nav-text{display:none}.nav{justify-content:center;padding:13px 5px}.nav span:first-child{font-size:20px}.main{margin-left:65px;padding:17px 12px}.profile{padding:7px}.profile div:last-child{display:none}h1{font-size:21px}.product-hero{padding:18px}.product-name{font-size:17px}.details{padding:5px 18px 12px}.detail-row{grid-template-columns:1fr;gap:5px}.panel-head,.side-panel{padding:18px}}
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
                <h1>Detail Produk</h1>
                <p class="subtitle">Informasi lengkap produk dalam inventaris.</p>
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
                    <p>Rincian data produk yang tersimpan.</p>
                </div>

                <div class="product-hero">
                    <div class="product-icon">▤</div>
                    <div>
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-id">ID Produk: #{{ $product->id }}</div>
                        <span class="category">{{ $product->category->name }}</span>
                    </div>
                </div>

                <div class="details">
                    <div class="detail-row">
                        <div class="label">ID Produk</div>
                        <div class="value">#{{ $product->id }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="label">Nama Produk</div>
                        <div class="value">{{ $product->name }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="label">Kategori</div>
                        <div class="value">{{ $product->category->name }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="label">Deskripsi</div>
                        <div class="value description">
                            {{ $product->description ?: 'Belum ada deskripsi untuk produk ini.' }}
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="label">Jumlah Stok</div>
                        <div class="value">{{ $product->stock }} unit</div>
                    </div>

                    <div class="detail-row">
                        <div class="label">Tanggal Ditambahkan</div>
                        <div class="value">{{ $product->created_at->format('d M Y, H:i') }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="label">Terakhir Diperbarui</div>
                        <div class="value">{{ $product->updated_at->format('d M Y, H:i') }}</div>
                    </div>
                </div>
            </section>

            <aside class="panel side-panel">
                <h2>Ringkasan Produk</h2>
                <p class="subtitle">Harga dan ketersediaan stok.</p>

                <div class="metric price">
                    <div class="metric-label">HARGA PRODUK</div>
                    <div class="metric-value">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                    <div class="metric-note">Harga per unit produk</div>
                </div>

                <div class="metric stock">
                    <div class="metric-label">STOK TERSEDIA</div>
                    <div class="metric-value">{{ $product->stock }} unit</div>
                    <div class="metric-note">
                        {{ $product->stock <= 5 ? 'Stok perlu diperhatikan' : 'Stok tersedia' }}
                    </div>
                </div>

                <div class="actions">
                    <a href="{{ route('products.edit', $product) }}" class="btn primary">
                        ✎ Edit Produk
                    </a>
                    <a href="{{ route('products.index') }}" class="btn secondary">
                        ← Kembali ke Daftar
                    </a>
                </div>

                <div class="timestamp">
                    Dibuat: {{ $product->created_at->format('d/m/Y H:i') }}<br>
                    Diperbarui: {{ $product->updated_at->format('d/m/Y H:i') }}
                </div>
            </aside>
        </div>
    </main>
</body>
</html>
