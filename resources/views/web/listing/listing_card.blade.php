<style>
    .mylist{border: 1px solid #CCC; padding: 13px; text-align: center;}
</style>
<div class="mylist">
    <div class="img-holder">
        <img src="{{ $logo }}">
    </div>
    <div class="pdetail">
        <h5><a href="{{ url($slugroot) }}/{{ $slug }}"  class="text-primary">{{ $name }}</a></h5>
        <p>Investment required</p>
        <p>Rs. {{ $anualsale_start }}{{ $anualsale_unit }} - Rs. {{ $anualsale_end }}{{ $anualsale_unit }}</p>        
        <p class="text-success">{{$phone}}</p>
    </div>
</div>