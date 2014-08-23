

<div class="row">
      @foreach($blocklist as $v)
          <div class="col-md-3">
            <div class="featured-box nobg border-only">
              <div class="box-content">
                <i class="{{ $v->icon }}"></i>
                <h4>{{ $v->heading }}</h4>
                <p>{{ $v->content }}</p>
              </div>
            </div>
          </div>
      @endforeach
</div>
