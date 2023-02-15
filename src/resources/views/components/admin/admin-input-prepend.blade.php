@props(['label'])
<div class="form-group">
  <div class="input-group">
    <div class="input-group-prepend" style="width:20%;">
      <span class="input-group-text" style="width:100%;">{{$label}}</span>
    </div>
    {{ $slot }}
  </div>
  <!-- /.input group -->
</div>