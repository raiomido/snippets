
(function () {
    let scrollPos = window.scrollY

    const primaryMenu = document.getElementById('primary-menu');

    if (primaryMenu) {

        function add_primary_bg_on_scroll() {
            primaryMenu.classList.remove('bg-transparent')
            primaryMenu.classList.add('bg-gray-100')
            primaryMenu.classList.add('xl:text-primary', 'dark:text-blue-100')
        }

        function remove_primary_bg_on_scroll() {
            primaryMenu.classList.add('bg-transparent')
            primaryMenu.classList.remove('bg-gray-100')
            primaryMenu.classList.remove('xl:text-primary', 'dark:text-blue-100')
        }

        window.addEventListener('scroll', function () {
            scrollPos = window.scrollY

            if (scrollPos > 10)
                add_primary_bg_on_scroll()
            else
                remove_primary_bg_on_scroll()
        })
    }
})();
