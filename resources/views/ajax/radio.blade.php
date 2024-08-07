@foreach($data as $k => $row)
<div class="form-check">
<input name="flexRadio[]"  type="radio" value="{{$row->real_per_code}}" required> <span>  {{$row->property_type}}</span>
</div>
@endforeach
<!-- <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Default checked radio
  </label>
</div> -->