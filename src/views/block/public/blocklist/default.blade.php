<div class="row">
      
      @foreach($blocklist as $v)
          <div class="col-md-3">
            <div class="featured-box nobg border-only left-separator">
              <i class="{{ $v->icon }}"></i>
              <h4>{{ $v->heading }}</h4>
              <p>{{ $v->content }}</p>
            </div>
          </div>
      @endforeach
</div>