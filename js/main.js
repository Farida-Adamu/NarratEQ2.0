/* ==========================================
   NarratEQ 2.0 — Interactions
   ========================================== */

document.addEventListener('DOMContentLoaded', () => {

  /* --- Mobile Navigation --- */
  const hamburger = document.querySelector('.nav-hamburger');
  const mobileNav = document.querySelector('.mobile-nav-overlay');

  if (hamburger && mobileNav) {
    hamburger.addEventListener('click', () => {
      const isOpen = mobileNav.classList.toggle('open');
      hamburger.setAttribute('aria-expanded', isOpen);

      // Animate hamburger icon
      const spans = hamburger.querySelectorAll('span');
      if (isOpen) {
        spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        spans[1].style.opacity = '0';
        spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
        document.body.style.overflow = 'hidden';
      } else {
        spans[0].style.transform = 'none';
        spans[1].style.opacity = '1';
        spans[2].style.transform = 'none';
        document.body.style.overflow = '';
      }
    });

    // Close mobile nav on link click
    mobileNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileNav.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        const spans = hamburger.querySelectorAll('span');
        spans[0].style.transform = 'none';
        spans[1].style.opacity = '1';
        spans[2].style.transform = 'none';
        document.body.style.overflow = '';
      });
    });
  }

  /* --- Sidebar Filter Interactions --- */
  const sectorFilters = document.querySelectorAll('.filter-item[data-sector]');

  sectorFilters.forEach(item => {
    item.addEventListener('click', () => {
      // Remove active from all sector filters
      sectorFilters.forEach(f => f.classList.remove('active'));
      // Set clicked as active
      item.classList.add('active');

      const sector = item.dataset.sector;
      filterCards(sector);
    });
  });

  function filterCards(sector) {
    const cards = document.querySelectorAll('.stat-card, .insight-card');

    cards.forEach(card => {
      if (sector === 'all') {
        card.style.display = '';
      } else {
        const cardSector = card.dataset.sector;
        card.style.display = (cardSector === sector) ? '' : 'none';
      }
    });
  }

  /* --- Content Type Filter --- */
  const typeFilters = document.querySelectorAll('.filter-item[data-type]');

  typeFilters.forEach(item => {
    item.addEventListener('click', () => {
      item.classList.toggle('active');
    });
  });

  /* --- View Toggle (Cards / Table) --- */
  const viewButtons = document.querySelectorAll('.view-toggle button');

  viewButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      viewButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  /* --- Sidebar Mobile Toggle --- */
  const sidebarToggle = document.querySelector('.sidebar-toggle');
  const sidebar = document.querySelector('.sidebar');

  if (sidebarToggle && sidebar) {
    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('open');
      const isOpen = sidebar.classList.contains('open');
      sidebarToggle.textContent = isOpen ? 'Hide Filters' : 'Show Filters';
    });
  }

  /* --- Search Input --- */
  const searchInput = document.querySelector('.sidebar-search input');

  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const query = e.target.value.toLowerCase().trim();
      const cards = document.querySelectorAll('.stat-card, .insight-card');

      cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        card.style.display = text.includes(query) ? '' : 'none';
      });
    });
  }

});
