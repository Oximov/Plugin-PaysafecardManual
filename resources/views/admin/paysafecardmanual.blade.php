<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> @lang('paysafecardmanual::messages.info')
 </div>

@if(! use_site_money())
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        @lang('paysafecardmanual::messages.site_money', ['url' => route('shop.admin.settings')])
    </div>
@endif
