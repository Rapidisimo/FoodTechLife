class BurgerMenu {
    
    constructor() {
        this.openButton = document.querySelector('.top-nav-open');
        this.closeButton = document.querySelector('.top-nav-close');
        this.topMenuContainer = document.querySelector('.top-menu-container');
        this.media = window.matchMedia('(width < 40em)');
        this.main = document.querySelector('main');
        this.html = document.querySelector('html');
        this.events();
        this.setupTopNav(this.media);
    }

    events() {
        if (this.openButton && this.closeButton && this.topMenuContainer) {
            this.openButton.addEventListener('click', (e) => this.openMenu(e));
            this.closeButton.addEventListener('click', (e) => this.closeMenu(e));
        } else {
            console.error('BurgerMenu: Required elements not found in the DOM.');
        }
        this.media.addEventListener('change', (e) => this.setupTopNav(e));
    }

    // methods
    openMenu(e) {
        this.openButton.setAttribute('aria-expanded', 'true');
        this.topMenuContainer.removeAttribute('inert');
        this.topMenuContainer.removeAttribute('style');
        this.main.setAttribute('inert', '');
        this.closeButton.focus();
    }

    closeMenu(e) {
        this.openButton.setAttribute('aria-expanded', 'false');
        this.topMenuContainer.setAttribute('inert', '');
        this.main.removeAttribute('inert');
        this.openButton.focus();
        setTimeout(() => {  
            this.topMenuContainer.style.transition ='none';
        }, 500);
    }
    // Change in viewport size
    setupTopNav(e) {
        if(e.matches) {
            this.topMenuContainer.setAttribute('inert', '');
            this.topMenuContainer.style.transition = 'none';
        }else {
            this.topMenuContainer.removeAttribute('inert');
        }
    }

}

export default BurgerMenu;