<footer class="page-copyright">
    <p>WEBSITE BY <a href="{{ route('dashboard.index') }}">{{ trans('strings.app_name') }}</a></p>
    <p>© {{ Date('Y') }}. All RIGHT RESERVED.</p>
    <div class="social">
        <a href="{{ config('services.twitter')['url'] }}">
            <i class="icon bd-twitter" aria-hidden="true"></i>
        </a>
        <a href="{{ config('services.facebook')['url'] }}">
            <i class="icon bd-facebook" aria-hidden="true"></i>
        </a>
    </div>
</footer>