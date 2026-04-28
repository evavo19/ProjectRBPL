<?php

$user_address = [
    'name'    => 'Eva Dewi Agustin',
    'phone'   => '+62 812-3456-7890',
    'address' => 'Plambongan Triwidadi Pajangan Bantul, Yogyakarta RT 03, PAJANGAN, KAB. BANTUL, DI YOGYAKARTA, ID 55751'
];

$shipping = [
    'type' => 'Reguler',
    'cost' => 8000,
    'eta'  => '17 - 20 Des',
];

$service_fee       = 1000;
$protection_fee    = 500;
$shipping_discount = -8000;
$voucher_discount  = -5000;
$coin_value        = 470;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Shopee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .app-container {
            width: 390px; height: 100vh; background: #f3f4f6;
            border-radius: 25px; box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            overflow-y: auto; overflow-x: hidden; position: relative;
            display: flex; flex-direction: column;
            margin: 0 auto; max-width: 100%; padding-bottom: 100px;
            scrollbar-width: none;
        }
        .app-container::-webkit-scrollbar { display: none; }
        .header-gradient { background: linear-gradient(180deg, #F54D2D 0%, #FF6433 100%); }
        .shopee-border { border-left: 3px solid #F54D2D; }

        #payment-modal {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.5); z-index: 200;
            align-items: flex-end; justify-content: center;
        }
        #payment-modal.show { display: flex; }
        #payment-modal-box {
            width: 390px; max-width: 100%;
            background: white; border-radius: 16px 16px 0 0;
            padding: 20px; max-height: 70vh; overflow-y: auto;
        }
        .payment-option {
            display: flex; align-items: center; gap: 12px;
            padding: 12px; border-radius: 8px; cursor: pointer;
            border: 1.5px solid #e5e7eb; margin-bottom: 8px;
            transition: border-color 0.15s, background 0.15s;
        }
        .payment-option.selected { border-color: #F54D2D; background: #fff5f3; }
        .payment-option input[type=radio] { accent-color: #F54D2D; }

        .toggle-track {
            width: 32px; height: 16px; border-radius: 999px;
            background: #d1d5db; position: relative; cursor: pointer;
            transition: background 0.2s; flex-shrink: 0;
        }
        .toggle-track.on { background: #F54D2D; }
        .toggle-thumb {
            width: 12px; height: 12px; border-radius: 50%;
            background: white; position: absolute; top: 2px; left: 2px;
            transition: left 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        .toggle-track.on .toggle-thumb { left: 18px; }
    </style>
</head>
<body class="flex justify-center">

<div id="payment-modal">
    <div id="payment-modal-box">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-sm font-bold text-gray-800 font-poppins">Pilih Metode Pembayaran</h3>
            <button onclick="closePaymentModal()"><i data-lucide="x" class="w-5 h-5 text-gray-500"></i></button>
        </div>

        <p class="text-[10px] text-gray-400 uppercase font-bold mb-2">Paylater</p>
        <label class="payment-option selected" data-value="SPayLater" data-label="SPayLater">
            <input type="radio" name="payment" value="SPayLater" checked>
            <div>
                <p class="text-xs font-bold">SPayLater</p>
                <p class="text-[10px] text-gray-500">Bayar bulan depan, cicilan 0%</p>
            </div>
        </label>

        <p class="text-[10px] text-gray-400 uppercase font-bold mt-3 mb-2">Dompet Digital</p>
        <label class="payment-option" data-value="ShopeePay" data-label="ShopeePay">
            <input type="radio" name="payment" value="ShopeePay">
            <div>
                <p class="text-xs font-bold">ShopeePay</p>
                <p class="text-[10px] text-gray-500">Saldo: Rp 125.000</p>
            </div>
        </label>
        <label class="payment-option" data-value="GoPay" data-label="GoPay">
            <input type="radio" name="payment" value="GoPay">
            <div>
                <p class="text-xs font-bold">GoPay</p>
                <p class="text-[10px] text-gray-500">Dompet digital Gojek</p>
            </div>
        </label>
        <label class="payment-option" data-value="OVO" data-label="OVO">
            <input type="radio" name="payment" value="OVO">
            <div>
                <p class="text-xs font-bold">OVO</p>
                <p class="text-[10px] text-gray-500">Saldo: Rp 50.000</p>
            </div>
        </label>

        <p class="text-[10px] text-gray-400 uppercase font-bold mt-3 mb-2">Transfer Bank</p>
        <label class="payment-option" data-value="BCA Virtual Account" data-label="BCA VA">
            <input type="radio" name="payment" value="BCA Virtual Account">
            <div>
                <p class="text-xs font-bold">BCA Virtual Account</p>
                <p class="text-[10px] text-gray-500">Transfer via ATM/M-Banking</p>
            </div>
        </label>
        <label class="payment-option" data-value="Mandiri Virtual Account" data-label="Mandiri VA">
            <input type="radio" name="payment" value="Mandiri Virtual Account">
            <div>
                <p class="text-xs font-bold">Mandiri Virtual Account</p>
                <p class="text-[10px] text-gray-500">Transfer via ATM/M-Banking</p>
            </div>
        </label>

        <p class="text-[10px] text-gray-400 uppercase font-bold mt-3 mb-2">Bayar di Tempat</p>
        <label class="payment-option" data-value="COD" data-label="Bayar di Tempat (COD)">
            <input type="radio" name="payment" value="COD">
            <div>
                <p class="text-xs font-bold">Bayar di Tempat (COD)</p>
                <p class="text-[10px] text-gray-500">Bayar saat paket tiba</p>
            </div>
        </label>

        <button onclick="confirmPaymentMethod()"
            class="w-full mt-4 header-gradient text-white py-3 rounded-lg font-bold text-sm font-poppins">
            Konfirmasi
        </button>
    </div>
</div>

<div class="app-container shadow-2xl">

    <div class="header-gradient sticky top-0 z-50">
        <div class="flex justify-between items-center px-8 pt-6 pb-2 text-white">
            <span class="text-xs font-semibold font-poppins" id="clock">09:27</span>
            <div class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                </svg>
                <div class="w-5 h-2.5 border border-white rounded-[2px] p-[1px] flex justify-start items-center">
                    <div class="bg-white h-full w-[70%] rounded-[1px]"></div>
                </div>
            </div>
        </div>
        <div class="flex items-center px-4 pb-4 pt-1 text-white gap-3">
            <button onclick="window.history.back()">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </button>
            <h1 class="text-lg font-medium font-poppins">Checkout</h1>
        </div>
    </div>

    <div class="bg-white p-4 relative mb-2">
        <div class="flex items-start gap-3">
            <i data-lucide="map-pin" class="w-5 h-5 text-[#F54D2D] mt-0.5"></i>
            <div class="flex-1">
                <h2 class="text-xs font-medium text-gray-800">Alamat Pengiriman</h2>
                <div class="mt-2 text-[11px] leading-relaxed">
                    <span class="font-bold text-gray-900"><?= $user_address['name'] ?></span>
                    <span class="text-gray-500 ml-1"><?= $user_address['phone'] ?></span>
                    <p class="text-gray-600 mt-1"><?= $user_address['address'] ?></p>
                </div>
            </div>
            <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400 mt-1"></i>
        </div>
        <div class="absolute bottom-0 left-0 w-full h-1 bg-repeat-x"
             style="background-image: linear-gradient(90deg, #f54d2d 25%, #ffffff 25%, #ffffff 50%, #4a90e2 50%, #4a90e2 75%, #ffffff 75%, #ffffff 100%); background-size: 40px 100%;"></div>
    </div>

    <div id="product-section" class="bg-white mb-2">
    </div>

    <div class="bg-blue-50/30 p-4 mb-2 border-y border-gray-100">
        <div class="flex justify-between items-center mb-3">
            <span class="text-xs font-medium text-gray-800">Opsi Pengiriman</span>
            <div class="flex items-center text-blue-600 font-medium">
                <span class="text-[11px]">Lihat Semua</span>
                <i data-lucide="chevron-right" class="w-3 h-3"></i>
            </div>
        </div>
        <div class="shopee-border pl-3">
            <div class="flex justify-between items-center">
                <span class="text-xs font-bold text-gray-900"><?= $shipping['type'] ?></span>
                <span class="text-xs font-medium">Rp<?= number_format($shipping['cost'], 0, ',', '.') ?></span>
            </div>
            <p class="text-[10px] text-teal-600 mt-1">Garansi tiba <?= $shipping['eta'] ?></p>
            <p class="text-[10px] text-gray-400 mt-1 leading-tight">Voucher s/d Rp10.000 jika pesanan belum tiba 20 Des 2025.</p>
            <div class="mt-2 flex items-center gap-1">
                <span class="text-[10px] text-teal-600 bg-teal-50 px-1 rounded">Gratis Ongkir</span>
            </div>
        </div>
    </div>

    <div class="bg-white mb-2 divide-y divide-gray-50">
        <div class="p-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i data-lucide="ticket" class="w-5 h-5 text-[#F54D2D]"></i>
                <span class="text-xs text-gray-800">Voucher Shopee</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-[10px] text-[#F54D2D] border border-[#F54D2D] px-1 rounded">-Rp.5rb</span>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
            </div>
        </div>
        <div class="p-4 flex justify-between items-center" id="coin-row">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 rounded-full bg-yellow-400 flex items-center justify-center text-[9px] font-bold text-white shadow-sm">S</div>
                <span class="text-[11px] text-gray-600">Tukarkan 47 Koin Shopee</span>
                <span class="text-[10px] text-yellow-600 font-medium">(–Rp<?= number_format($coin_value, 0, ',', '.') ?>)</span>
            </div>
            <div class="toggle-track" id="coin-toggle" onclick="toggleCoin()">
                <div class="toggle-thumb"></div>
            </div>
        </div>
    </div>

    <div class="bg-white mb-2 divide-y divide-gray-50">
        <div class="p-4 flex justify-between items-center cursor-pointer" onclick="openPaymentModal()">
            <div class="flex items-center gap-2">
                <i data-lucide="credit-card" class="w-5 h-5 text-[#F54D2D]"></i>
                <span class="text-xs text-gray-800">Metode Pembayaran</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="text-[11px] text-gray-800 font-medium" id="payment-label">SPayLater</span>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
            </div>
        </div>
        <div class="p-4 flex justify-between items-center">
            <span class="text-[11px] text-gray-500 italic">Aktifkan sekarang & dapatkan Bonus 50RB</span>
            <button class="text-[11px] text-[#F54D2D] font-bold border border-[#F54D2D] px-3 py-1 rounded">Ajukan Uang</button>
        </div>
    </div>

    <div class="bg-white p-4 mb-2">
        <h2 class="text-xs font-bold text-gray-800 mb-3">Rincian Pembayaran</h2>
        <div class="space-y-2">
            <div class="flex justify-between text-[11px] text-gray-500">
                <span>Subtotal Produk</span>
                <span id="bill-subtotal-product">Rp0</span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500">
                <span>Subtotal Pengiriman</span>
                <span id="bill-subtotal-shipping">Rp<?= number_format($shipping['cost'], 0, ',', '.') ?></span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500" id="bill-protection-row" style="display:none!important;">
                <span>Proteksi Kerusakan</span>
                <span id="bill-protection">Rp0</span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500">
                <span>Biaya Layanan</span>
                <span>Rp<?= number_format($service_fee, 0, ',', '.') ?></span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500">
                <span>Diskon Ongkir</span>
                <span class="text-[#F54D2D]" id="bill-shipping-discount">–Rp<?= number_format(abs($shipping_discount), 0, ',', '.') ?></span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500">
                <span>Voucher Diskon</span>
                <span class="text-[#F54D2D]">–Rp<?= number_format(abs($voucher_discount), 0, ',', '.') ?></span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500" id="bill-coin-row" style="display:none;">
                <span>Potongan Koin Shopee</span>
                <span class="text-[#F54D2D]">–Rp<?= number_format($coin_value, 0, ',', '.') ?></span>
            </div>
            <div class="flex justify-between text-sm font-bold text-gray-800 pt-2 border-t border-gray-50">
                <span>Total Pembayaran</span>
                <span class="text-[#F54D2D]" id="bill-total">Rp0</span>
            </div>
            <div class="flex justify-between text-[10px] text-[#F54D2D]">
                <span>Total Hemat</span>
                <span id="bill-savings">Rp0</span>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[390px] bg-white border-t border-gray-100 flex items-center justify-end z-[100] shadow-lg rounded-b-[25px] overflow-hidden">
        <div class="text-right px-2">
            <div class="text-[10px] text-gray-800">Total Pembayaran</div>
            <div class="text-[#F54D2D] font-bold text-base" id="footer-total">Rp0</div>
            <div class="text-[9px] text-[#F54D2D]" id="footer-savings">Hemat Rp0</div>
        </div>
        <a href="berhasil_pesan_pembeli.php" class="header-gradient text-white px-8 py-5 font-bold text-sm font-poppins inline-block">
            Buat Pesanan
        </a>
    </div>
</div>

<script>

const SHIPPING_COST      = <?= $shipping['cost'] ?>;
const SERVICE_FEE        = <?= $service_fee ?>;
const PROTECTION_FEE     = <?= $protection_fee ?>;
const SHIPPING_DISCOUNT  = <?= abs($shipping_discount) ?>;
const VOUCHER_DISCOUNT   = <?= abs($voucher_discount) ?>;
const COIN_VALUE         = <?= $coin_value ?>;


let checkoutItems    = [];
let protectionActive = {};  
let coinActive       = false;


function renderProducts() {
    const raw = localStorage.getItem('checkoutItems');
    if (raw) {
        try { checkoutItems = JSON.parse(raw); } catch(e) { checkoutItems = []; }
    }

    if (!checkoutItems.length) {
        checkoutItems = [{
            id: '1', shop_name: 'Jims Honey Yogyakarta',
            product_name: 'Jims Honey Isabelle Bag', variant: 'Black',
            price: 98368, original_price: 115987, quantity: 1,
            image: 'https://picsum.photos/seed/bag2/200/200'
        }];
    }

    checkoutItems.forEach(item => { protectionActive[item.id] = true; });

    const section = document.getElementById('product-section');
    let html = '';

    const shops = {};
    checkoutItems.forEach(item => {
        if (!shops[item.shop_name]) shops[item.shop_name] = [];
        shops[item.shop_name].push(item);
    });

    Object.entries(shops).forEach(([shopName, items]) => {
        html += `
        <div class="border-b border-gray-50 last:border-0">
            <div class="p-4 border-b border-gray-50 flex items-center gap-2">
                <span class="bg-[#F54D2D] text-white text-[9px] px-1 rounded font-bold uppercase">Star</span>
                <span class="text-xs font-bold">${shopName}</span>
            </div>`;

        items.forEach(item => {
            const subtotal = (item.price * item.quantity).toLocaleString('id-ID');
            html += `
            <div class="p-4 flex gap-3">
                <img src="${item.image}" class="w-20 h-20 rounded border border-gray-100 object-cover">
                <div class="flex-1">
                    <h3 class="text-xs text-gray-800 line-clamp-2">${item.product_name}</h3>
                    <p class="text-[10px] text-gray-400 mt-1">Variasi: ${item.variant} · Qty: ${item.quantity}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="text-xs font-bold text-[#F54D2D]">Rp${item.price.toLocaleString('id-ID')}</span>
                        <span class="text-[10px] text-gray-300 line-through">Rp${item.original_price.toLocaleString('id-ID')}</span>
                    </div>
                    <p class="text-[10px] text-gray-500 mt-1">Subtotal: <span class="font-medium text-gray-700">Rp${subtotal}</span></p>
                </div>
            </div>

            <!-- STEP 3: Proteksi Kerusakan per produk -->
            <div class="mx-4 p-3 bg-gray-50 rounded flex items-start gap-3 mb-4">
                <input type="checkbox" id="protection-${item.id}" checked
                    class="mt-1 accent-[#F54D2D]"
                    onchange="toggleProtection('${item.id}', this.checked)">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <span class="text-[11px] font-medium">Proteksi Kerusakan</span>
                        <span class="text-[11px]">+Rp${PROTECTION_FEE.toLocaleString('id-ID')}</span>
                    </div>
                    <p class="text-[10px] text-gray-500 mt-0.5">Melindungi produkmu dari kerusakan total selama 6 bulan.
                        <span class="text-blue-500">Pelajari</span>
                    </p>
                </div>
            </div>`;
        });

        html += `</div>`;
    });

    section.innerHTML = html;
}


function toggleProtection(itemId, isChecked) {
    protectionActive[itemId] = isChecked;
    recalculate();
}


function toggleCoin() {
    coinActive = !coinActive;
    const track = document.getElementById('coin-toggle');
    track.classList.toggle('on', coinActive);
    document.getElementById('bill-coin-row').style.display = coinActive ? 'flex' : 'none';
    recalculate();
}


function recalculate() {
    let subtotalProduct = 0;
    checkoutItems.forEach(item => {
        subtotalProduct += item.price * item.quantity;
    });

    let totalProtection = 0;
    checkoutItems.forEach(item => {
        if (protectionActive[item.id]) totalProtection += PROTECTION_FEE;
    });

    const protRow = document.getElementById('bill-protection-row');
    if (totalProtection > 0) {
        protRow.style.setProperty('display', 'flex', 'important');
        document.getElementById('bill-protection').textContent = 'Rp' + totalProtection.toLocaleString('id-ID');
    } else {
        protRow.style.setProperty('display', 'none', 'important');
    }

    let total = subtotalProduct
              + SHIPPING_COST
              + SERVICE_FEE
              + totalProtection
              - SHIPPING_DISCOUNT
              - VOUCHER_DISCOUNT;

    if (coinActive) total -= COIN_VALUE;

    let savings = SHIPPING_DISCOUNT + VOUCHER_DISCOUNT + (coinActive ? COIN_VALUE : 0);
    checkoutItems.forEach(item => {
        savings += (item.original_price - item.price) * item.quantity;
    });

    document.getElementById('bill-subtotal-product').textContent = 'Rp' + subtotalProduct.toLocaleString('id-ID');
    document.getElementById('bill-total').textContent            = 'Rp' + total.toLocaleString('id-ID');
    document.getElementById('footer-total').textContent          = 'Rp' + total.toLocaleString('id-ID');
    document.getElementById('footer-savings').textContent        = 'Hemat Rp' + savings.toLocaleString('id-ID');
    document.getElementById('bill-savings').textContent          = 'Rp' + savings.toLocaleString('id-ID');
}


function openPaymentModal() {
    document.getElementById('payment-modal').classList.add('show');
    lucide.createIcons();
}
function closePaymentModal() {
    document.getElementById('payment-modal').classList.remove('show');
}

document.addEventListener('change', function(e) {
    if (e.target.name === 'payment') {
        document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('selected'));
        e.target.closest('.payment-option').classList.add('selected');
    }
});

function confirmPaymentMethod() {
    const selected = document.querySelector('input[name="payment"]:checked');
    if (selected) {
        const label = selected.closest('.payment-option').dataset.label;
        document.getElementById('payment-label').textContent = label;
    }
    closePaymentModal();
}

document.getElementById('payment-modal').addEventListener('click', function(e) {
    if (e.target === this) closePaymentModal();
});


function updateClock() {
    const now = new Date();
    const t = String(now.getHours()).padStart(2,'0') + ':' + String(now.getMinutes()).padStart(2,'0');
    const el = document.getElementById('clock');
    if (el) el.innerText = t;
}

function initLucide() {
    if (typeof lucide !== 'undefined') lucide.createIcons();
    else setTimeout(initLucide, 100);
}

window.onload = function() {
    renderProducts(); 
    recalculate();     
    initLucide();
    updateClock();
    setInterval(updateClock, 1000);
};
</script>
</body>
</html>