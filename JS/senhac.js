   document.addEventListener('DOMContentLoaded', function () {
    // Elementos do carrinho
    const openCartBtn = document.getElementById("openCart");
    const closeCartBtn = document.getElementById("closeCart");
    const cartSidebar = document.getElementById("cartSidebar");
    const cartOverlay = document.getElementById("cartOverlay");

    // Abrir carrinho
    openCartBtn?.addEventListener("click", () => {
      cartSidebar.classList.add("active");
      cartOverlay.classList.add("active");
    });

    // Fechar carrinho
    closeCartBtn?.addEventListener("click", () => {
      cartSidebar.classList.remove("active");
      cartOverlay.classList.remove("active");
    });

    // Fechar carrinho ao clicar no overlay
    cartOverlay?.addEventListener("click", () => {
      cartSidebar.classList.remove("active");
      cartOverlay.classList.remove("active");
    });

    // Menu hambúrguer mobile
    const toggleButton = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu-center'); // corrigido para .menu-center

    toggleButton?.addEventListener('click', () => {
      menu?.classList.toggle('active');
    });

    // Ajustar espaçamentos para header fixo, footer fixo e barra de info
    function ajustarEspacamento() {
      const header = document.getElementById("header");
      const infoBar = document.getElementById("infoBar");
      const footer = document.getElementById("footer");
      const pageWrapper = document.getElementById("page-wrapper");

      const alturaHeader = header ? header.offsetHeight : 0;
      const alturaInfoBar = infoBar ? infoBar.offsetHeight : 0;
      const alturaFooter = footer ? footer.offsetHeight : 0;

      if (infoBar && header) {
        infoBar.style.top = alturaHeader + "px";
      }

      if (pageWrapper) {
        pageWrapper.style.paddingTop = (alturaHeader + alturaInfoBar) + "px";
        pageWrapper.style.paddingBottom = alturaFooter + "px";
      }
    }

    ajustarEspacamento();
    window.addEventListener("resize", ajustarEspacamento);
  });
