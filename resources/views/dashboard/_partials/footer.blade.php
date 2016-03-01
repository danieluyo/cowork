<footer class="site-footer">
    <div class="site-footer-legal">© {{ Date('Y') }} <a
                href="{{ route('dashboard.index') }}">{{ trans('strings.app_name') }}</a></div>
    <div class="site-footer-right">
        Crafted with <i class="red-600 icon md-favorite"></i> by <a href="{{ config('app.url') }}">{{ trans('strings.app_name') }}</a>
    </div>
</footer>
<!-- Core  -->
<script src="{{config('cache.static_files_root')}}/global/vendor/jquery/jquery.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/bootstrap/bootstrap.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/animsition/animsition.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/asscroll/jquery-asScroll.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/waves/waves.js"></script>
<!-- Plugins -->
<script src="{{config('cache.static_files_root')}}/global/vendor/switchery/switchery.min.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/intro-js/intro.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/screenfull/screenfull.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/slidepanel/jquery-slidePanel.js"></script>
<!-- Scripts -->
<script src="{{config('cache.static_files_root')}}/global/js/core.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/site.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/menu.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/menubar.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/gridmenu.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/sidebar.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/configs/config-colors.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/configs/config-tour.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/asscrollable.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/animsition.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/slidepanel.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/switchery.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/tabs.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/material.js"></script>
<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);

    function deleteItem(obj) {
        if (confirm('Are you sure you want to delete this item?')) {
            $(obj).parent().submit();
        }
        return false;
    }
</script>

@stack('footer')
