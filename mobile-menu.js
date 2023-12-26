document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        /**
         * Mobile Menu
         * @param selector
         */
        function dynamicCurrentMenuClass(selector) {

            let FileName = window.location.href.split("/").reverse()[0];

            selector.querySelectorAll("li").forEach(function (child) {
                let anchor = child.querySelector("a");
                if (anchor.getAttribute('href') === FileName) {
                    anchor.classList.add("current");
                }
            });
            // if any li has .current elmnt add class
            selector.querySelectorAll("li").forEach(function (child) {
                if (child.querySelector(".current")) {
                    child.classList.add("current");
                }
            });
            // if no file name return
            if ("" == FileName) {
                selector.querySelectorAll("li").forEach(function (child) {
                    child.classList.add("current");
                })
            }
        }

        let main_menu_list = document.querySelector('.main-menu__list');
        let mobile_menu_list = document.querySelector('.mobile-nav__container .main-menu__list');

        if (main_menu_list) {
            dynamicCurrentMenuClass(main_menu_list);
        }

        let mainMenu = document.querySelector('.main-menu');
        const mobileNavContainer = document.querySelector('.mobile-nav__container');

        if (mainMenu && mobileNavContainer) {
            mainMenu.classList.add('flex-col')
            mobileNavContainer.innerHTML = mainMenu.innerHTML;
        }

        if (mobile_menu_list) {
            console.log('haha')
            let dropdownAnchor = document.querySelectorAll('.mobile-nav__container .main-menu__list .dropdown > a');
            dropdownAnchor.forEach(function (anchor) {
                let toggleBtn = document.createElement("BUTTON");
                toggleBtn.classList.add('bg-secondary', 'text-white')
                toggleBtn.setAttribute("aria-label", "dropdown toggler");
                toggleBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>';
                anchor.append(toggleBtn);

                anchor.querySelectorAll('button').forEach(function (button) {
                    button.addEventListener('click', e => {
                        e.preventDefault();
                        button.classList.toggle("expanded");
                        button.parentElement.classList.toggle("expanded");


                        if (typeof slidetoggle !== 'undefined') {
                            let dropdown_menu = button.parentElement.parentElement.querySelector('ul');
                            slidetoggle.toggle(dropdown_menu, {
                                miliseconds: 300,
                                transitionFunction: 'ease-in-out',
                                onAnimationStart: () => {

                                },
                                onAnimationEnd: () => {

                                },
                            },);
                        }
                    })
                });
            });
        }


        /**
         * Toggle Mobile Menu
         * @type {NodeListOf<Element>}
         */
        let mobile_menu_togglers = document.querySelectorAll('.mobile-nav__toggler');
        let mobile_menu = document.querySelector('.mobile-nav__wrapper');
        if (mobile_menu_togglers && mobile_menu) {
            mobile_menu_togglers.forEach(function (toggler) {
                toggler.addEventListener('click', event => {
                    mobile_menu.classList.toggle('expanded')
                });
            })
        }
    }
}
