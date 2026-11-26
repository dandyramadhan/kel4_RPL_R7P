document.addEventListener('DOMContentLoaded', () => {
    const toastEl = document.getElementById('rt-toast');
    let toastTimer = null;

    function showToast(message) {
        if (!toastEl || !message) return;
        toastEl.textContent = message;
        toastEl.classList.add('is-visible');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => {
            toastEl.classList.remove('is-visible');
        }, 2800);
    }

    // Mobile sidebar drawer
    const sidebar = document.getElementById('appSidebar');
    const backdrop = document.getElementById('sidebarBackdrop');
    const menuBtn = document.getElementById('mobileMenuBtn');

    function closeSidebar() {
        sidebar?.classList.remove('is-open');
        backdrop?.classList.remove('is-open');
    }

    menuBtn?.addEventListener('click', () => {
        sidebar?.classList.toggle('is-open');
        backdrop?.classList.toggle('is-open');
    });

    backdrop?.addEventListener('click', closeSidebar);

    // Demo/placeholder action buttons (untuk fitur modal/detail pada tahap berikutnya)
    document.querySelectorAll('[data-toast]').forEach((btn) => {
        btn.addEventListener('click', () => {
            showToast(btn.getAttribute('data-toast'));
        });
    });

    // Filter & Search pada Koleksi Buku
    const koleksiSearch = document.getElementById('koleksiSearch');
    const koleksiCategory = document.getElementById('koleksiCategory');
    const koleksiStatus = document.getElementById('koleksiStatus');
    const koleksiGrid = document.getElementById('koleksiGrid');
    const koleksiCount = document.getElementById('koleksiCount');
    const koleksiEmpty = document.getElementById('koleksiEmpty');

    function filterKoleksi() {
        if (!koleksiGrid) return;
        const query = (koleksiSearch?.value || '').trim().toLowerCase();
        const cat = koleksiCategory?.value || 'all';
        const status = koleksiStatus?.value || 'all';

        const cards = Array.from(koleksiGrid.querySelectorAll('.book-card'));
        let visibleCount = 0;

        cards.forEach((card) => {
            const title = (card.dataset.title || '').toLowerCase();
            const author = (card.dataset.author || '').toLowerCase();
            const cardCat = card.dataset.category || '';
            const cardStatus = card.dataset.status || '';

            const matchQuery = !query || title.includes(query) || author.includes(query);
            const matchCat = cat === 'all' || cardCat === cat;
            const matchStatus = status === 'all' || cardStatus === status;

            const isMatch = matchQuery && matchCat && matchStatus;
            card.classList.toggle('is-hidden', !isMatch);
            if (isMatch) visibleCount += 1;
        });

        if (koleksiCount) {
            koleksiCount.textContent = visibleCount === cards.length
                ? 'Menampilkan koleksi buku'
                : `Menampilkan ${visibleCount} dari ${cards.length} buku`;
        }
        if (koleksiEmpty) {
            koleksiEmpty.classList.toggle('is-hidden', visibleCount > 0);
        }
    }

    koleksiSearch?.addEventListener('input', filterKoleksi);
    koleksiCategory?.addEventListener('change', filterKoleksi);
    koleksiStatus?.addEventListener('change', filterKoleksi);

    // Toggle & Preview Update Progres pada halaman Sedang Dibaca
    document.querySelectorAll('.js-open-progress').forEach((btn) => {
        btn.addEventListener('click', () => {
            const currentCard = btn.closest('.reading-item-card');
            if (!currentCard) return;

            document.querySelectorAll('.reading-item-card').forEach((card) => {
                const isTarget = card === currentCard;
                card.classList.toggle('is-expanded', isTarget);
                card.querySelector('.reading-inline-editor')?.classList.toggle('is-hidden', !isTarget);
                card.querySelector('.reading-collapsed-actions')?.classList.toggle('is-hidden', isTarget);
            });
        });
    });

    document.querySelectorAll('.js-save-progress').forEach((btn) => {
        btn.addEventListener('click', () => {
            const card = btn.closest('.reading-item-card');
            const input = card?.querySelector('.page-number-input');
            const maxPages = Number(input?.getAttribute('max') || 0);
            let value = Number(input?.value || 0);

            if (Number.isNaN(value) || value < 0) value = 0;
            if (maxPages > 0 && value > maxPages) value = maxPages;
            if (input) input.value = String(value);

            const percent = maxPages > 0 ? Math.min(100, Math.round((value / maxPages) * 100)) : 0;
            const counter = card?.querySelector('.js-page-counter');
            const bar = card?.querySelector('.progress-fill');

            if (counter) counter.textContent = `${value} / ${maxPages}`;
            if (bar) bar.style.width = `${percent}%`;

            showToast(`Preview progres diperbarui: ${value} / ${maxPages} halaman (${percent}%).`);
        });
    });

    // Filter & Search pada Riwayat Membaca
    const riwayatSearch = document.getElementById('riwayatSearch');
    const riwayatCategory = document.getElementById('riwayatCategory');
    const riwayatBody = document.getElementById('riwayatTableBody');
    const riwayatEmpty = document.getElementById('riwayatEmpty');

    function filterRiwayat() {
        if (!riwayatBody) return;
        const query = (riwayatSearch?.value || '').trim().toLowerCase();
        const cat = riwayatCategory?.value || 'all';
        const rows = Array.from(riwayatBody.querySelectorAll('tr'));
        let visibleCount = 0;

        rows.forEach((row) => {
            const title = (row.dataset.title || '').toLowerCase();
            const author = (row.dataset.author || '').toLowerCase();
            const rowCat = row.dataset.category || '';

            const matchQuery = !query || title.includes(query) || author.includes(query);
            const matchCat = cat === 'all' || rowCat === cat;
            const isMatch = matchQuery && matchCat;

            row.classList.toggle('is-hidden', !isMatch);
            if (isMatch) visibleCount += 1;
        });

        if (riwayatEmpty) {
            riwayatEmpty.classList.toggle('is-hidden', visibleCount > 0);
        }
    }

    riwayatSearch?.addEventListener('input', filterRiwayat);
    riwayatCategory?.addEventListener('change', filterRiwayat);
});
