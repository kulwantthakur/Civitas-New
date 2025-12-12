<div class="container-fluid p-0">
    <section class="cookie-bar">
        <div class="close-cookies">
            <a href="javascript:;" class="cookies-close"><i class="fa fa-times"></i></a>
        </div>
        <div class="container">
            <div class="d-flex justify-content-center align-items-center flex-column py-3">
                <div class="cookie-para">
                    {!! trans('words.cookies', [
                    'cookiesUrl' => route('footer.protection') . '#cookies-settings',
                    'settingsUrl' => route('footer.protection') . '#cookies-settings',
                    'cookiesText' => __('words.cookies_text'),
                    'settingsText' => __('words.settings_text'),
                    ]) !!}
                </div>
                <div class="my-3"></div>
                <div class="d-flex justify-content-around align-items-center w-100">
                    @include('modal.cookieModal')
                    <a href="javascript:void(0);" class="cookies-close cookie-btn">{!! trans('words.cookies_no') !!}</a>
                    <a href="javascript:(0);" class="cookies-accept cookie-btn">TOUT ACCEPTER</a>
                </div>
            </div>
        </div>
    </section>
</div>


