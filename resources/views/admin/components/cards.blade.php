@stack('style')
<div class="card">
    <div class="card-header test">
        {{{$title}}}
    </div>
    <div class="card-body test">
        {{ $slot }}
    </div>
    @stack('style')

</div>