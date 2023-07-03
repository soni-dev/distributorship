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
        <p>{{$investment_amt}} {{$investment_unit}}</p>   
        <p>Space required</p>
        <p>{{$space}} Sq. Ft. </p>        
        <p class="text-success">{{$phone}}</p>
    </div>
</div>