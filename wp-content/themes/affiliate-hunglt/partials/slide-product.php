<div class="container slide-product-270">
    <section class="regular slider">
        <div>
            <img src="http://placehold.it/350x300?text=1">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=2">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=3">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=4">
        </div>
        <div>
            <img src="http://placehold.it/350x300?text=5">
        </div>
        <!-- <div>
            <img src="http://placehold.it/350x300?text=6">
        </div> -->
    </section>
</div>
<script type="text/javascript">
    $(document).on('ready', function() {
        if (window.innerWidth < 991) {
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        } else {
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 3
            });
        }
    });
</script>