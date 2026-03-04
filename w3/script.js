const THEME_KEY = "themePreference";
const WISHLIST_KEY = "wishlistItems";

function getWishlistItems() {
  const rawData = sessionStorage.getItem(WISHLIST_KEY);
  if (!rawData) return [];

  try {
    const parsed = JSON.parse(rawData);
    return Array.isArray(parsed) ? parsed : [];
  } catch (error) {
    return [];
  }
}

function saveWishlistItems(items) {
  sessionStorage.setItem(WISHLIST_KEY, JSON.stringify(items));
}

function updateWishlistBadge() {
  const badge = document.getElementById("wishlistBadge");
  if (!badge) return;
  badge.textContent = getWishlistItems().length;
}

function renderWishlist() {
  const listElement = document.getElementById("wishlistItems");
  const emptyText = document.getElementById("wishlistEmptyText");
  if (!listElement || !emptyText) return;

  const items = getWishlistItems();
  listElement.innerHTML = "";

  if (items.length === 0) {
    emptyText.classList.remove("d-none");
    return;
  }

  emptyText.classList.add("d-none");

  items.forEach((itemName, index) => {
    const itemElement = document.createElement("li");
    itemElement.className = "list-group-item d-flex justify-content-between align-items-center";
    itemElement.innerHTML = `
      <span>${itemName}</span>
      <button class="btn btn-sm btn-outline-danger btn-remove-wishlist" type="button" data-index="${index}">
        Hapus
      </button>
    `;
    listElement.appendChild(itemElement);
  });
}

function applyTheme(theme) {
  const isDark = theme === "dark";
  const toggleButton = document.getElementById("themeToggleBtn");
  document.body.classList.toggle("dark-mode", isDark);

  if (toggleButton) {
    toggleButton.innerHTML = isDark
      ? '<i class="bi bi-sun-fill"></i> Light Mode'
      : '<i class="bi bi-moon-stars-fill"></i> Dark Mode';
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem(THEME_KEY) || "light";
  applyTheme(savedTheme);
  updateWishlistBadge();

  const themeToggleBtn = document.getElementById("themeToggleBtn");
  if (themeToggleBtn) {
    themeToggleBtn.addEventListener("click", () => {
      const nextTheme = document.body.classList.contains("dark-mode") ? "light" : "dark";
      localStorage.setItem(THEME_KEY, nextTheme);
      applyTheme(nextTheme);
    });
  }

  const productSection = document.querySelector(".product-section");
  if (productSection) {
    productSection.addEventListener("click", (event) => {
      const stockButton = event.target.closest(".btn-stock-action");
      const wishlistButton = event.target.closest(".btn-wishlist");
      if (!stockButton && !wishlistButton) return;

      const card = event.target.closest(".card[data-item-name][data-stock]");
      if (!card) return;

      const itemName = card.dataset.itemName;

      if (stockButton) {
        const currentStock = Number.parseInt(card.dataset.stock || "0", 10);
        if (currentStock <= 0) {
          alert(`Stok ${itemName} sudah habis.`);
          return;
        }

        const newStock = currentStock - 1;
        card.dataset.stock = String(newStock);

        const stockLabel = card.querySelector(".stock-count");
        if (stockLabel) {
          stockLabel.textContent = String(newStock);
        }

        alert(`Berhasil menyewa ${itemName}. Sisa stok: ${newStock}.`);
        return;
      }

      if (wishlistButton) {
        const items = getWishlistItems();
        items.push(itemName);
        saveWishlistItems(items);
        updateWishlistBadge();
        alert(`${itemName} ditambahkan ke wishlist.`);
      }
    });
  }

  const wishlistModal = document.getElementById("wishlistModal");
  if (wishlistModal) {
    wishlistModal.addEventListener("show.bs.modal", renderWishlist);
  }

  const wishlistItems = document.getElementById("wishlistItems");
  if (wishlistItems) {
    wishlistItems.addEventListener("click", (event) => {
      const removeButton = event.target.closest(".btn-remove-wishlist");
      if (!removeButton) return;

      const removeIndex = Number.parseInt(removeButton.dataset.index || "-1", 10);
      const items = getWishlistItems();
      if (removeIndex < 0 || removeIndex >= items.length) return;

      const removedItem = items.splice(removeIndex, 1)[0];
      saveWishlistItems(items);
      updateWishlistBadge();
      renderWishlist();
      alert(`${removedItem} dihapus dari wishlist.`);
    });
  }
});
