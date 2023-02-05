@props(['data', 'title', 'route', 'boxtype'])
<div class="small-box bg-{{ $boxtype }}">
    <div class="inner">
      <h3>
        {{ number_format ($data , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}
      </h3>
      <p>{{ $title }}</p>
    </div>
    <div class="icon">
      <i class="ion ion-cash"></i>
    </div>
    <a href="{{ $route }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>