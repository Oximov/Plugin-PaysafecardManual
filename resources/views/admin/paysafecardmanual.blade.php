<div class="alert alert-info">
    <i class="bi bi-info-circle-fill"></i> @lang('paysafecardmanual::messages.info')
 </div>

@if(! use_site_money())
    <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle"></i>
        @lang('paysafecardmanual::messages.site_money', ['url' => route('shop.admin.settings')])
    </div>
@endif
