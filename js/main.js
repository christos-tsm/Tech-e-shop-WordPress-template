(function ($) {
    $(document).ready(function () {
        /**
         * Sliders
         */
        $(".home-intro__slides").slick({
            prevArrow: $("#home-intro-slider-prev"),
            nextArrow: $("#home-intro-slider-next"),
        });

        $(".latest-posts").slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $("#posts-slider-prev"),
            nextArrow: $("#posts-slider-next"),
        });

        $(".products-slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $("#products-slider-prev"),
            nextArrow: $("#products-slider-next"),
        });

        /**
         * Navigation Scroll
         */
        function navigationScroll() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                $(".site-header__container").css("transform", "translateY(-40px)");
                /**
                 * Fix category menu position on scroll to match the translateY from topbar
                 */
                $(".categories-menu__container").css("top", "0");
            } else {
                $(".site-header__container").css("transform", "translateY(0px)");
                /**
                 * Fix category menu position on scroll to match the translateY from topbar
                 */
                $(".categories-menu__container").css("top", "40px");
            }
        }

        $(window).on("scroll", navigationScroll);

        /**
         *  Navigation Categories Menu
         */
        $("#products-burger").on("click", () => {
            /**
             *  Open navigation menu
             */
            $(".categories-menu__container").addClass("categories-menu__container--active");
            /**
             * Trigger site overlay
             */
            $(".site-overlay").addClass("site-overlay--active");
        });

        $("#products-burger-close").on("click", () => {
            /**
             *  Close menu
             */
            $(".categories-menu__container").removeClass("categories-menu__container--active");
            /**
             * Trigger site overlay close
             */
            $(".site-overlay").removeClass("site-overlay--active");
            /**
             * Make sure to close previusly opened subcategory div
             * Remove active class from subcategory links
             */
            $(".categories-menu__list-item").find(".categories-menu__sub-category").removeClass("categories-menu__sub-category--active");
            $(".categories-menu__list-item").removeClass("categories-menu__list-item--active");
        });

        /**
         * Close menu on site-overlay click
         */
        $(".site-overlay").on("click", function () {
            /**
             *  Close menu
             */
            $(".categories-menu__container").removeClass("categories-menu__container--active");
            /**
             * Reset overlay
             */
            $(".site-overlay").removeClass("site-overlay--active");
            /**
             * Make sure to close previusly opened subcategory div
             * Remove active class from subcategory links
             */
            $(".categories-menu__list-item").find(".categories-menu__sub-category").removeClass("categories-menu__sub-category--active");
            $(".categories-menu__list-item").removeClass("categories-menu__list-item--active");
        });

        /**
         * Navigation menu logic
         * Make sure to remove active class from subcategory divs when hovering in no-children link
         */
        $(".categories-menu__list-item").on("mouseover", function () {
            /**
             * Rremove active class from subcategory divs
             */
            $(".categories-menu__list-item").find(".categories-menu__sub-category").removeClass("categories-menu__sub-category--active");
            /**
             * Rremove active class from parent link
             */
            $(".categories-menu__list-item").removeClass("categories-menu__list-item--active");
            /**
             * Add active class on subcategory div
             */
            $(this).find(".categories-menu__sub-category").addClass("categories-menu__sub-category--active");
            /**
             * Add active class on current subcategory parent link
             */
            $(this).addClass("categories-menu__list-item--active");
        });

        /**
         * Open video handler - home-intro.php
         */
        $("#play-video").on("click", function () {
            /**
             * Open video
             */
            $(".video__container").addClass("video--active");
            /**
             * Prevent body scroll when video is openned
             */
            $("body").css("overflow", "hidden");
        });

        $(".video__container").on("click", function () {
            /**
             * Stop video from playing
             */
            $(".video__container iframe").attr("src", $("iframe").attr("src"));
            /**
             * Close video
             */
            $(this).removeClass("video--active");
            /**
             * Reset body scroll
             */
            $("body").css("overflow", "visible");
        });
    });
})(jQuery);
