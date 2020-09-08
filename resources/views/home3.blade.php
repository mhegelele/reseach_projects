@extends('layout.new')
@section('content')
 
 
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 wow fadeInDown">
   <div class="single_sidebar wow fadeInDown" style="margin-bottom: 2px;">
<h2 style="text-transform: uppercase;"> <span>RESEARCH PROJECTS </span></h2>
</div>

<form action="{{url('home/search')}}" method="post">

         <div class="input-group">
           {{ csrf_field() }}
             <input type="text" class="form-control" name="search_text"
                 placeholder="Search Research Projects"> <span class="input-group-btn">
                 <button type="submit" class="btn btn-default">
                     <span class="glyphicon glyphicon-search"></span>
                 </button>
             </span>
         </div>
     </form>


 @foreach($data as $f)
  <a href='{{url("home/projects/$f->pro_id")}}'>
<div class="citation">
 {{$f->theme}}</strong><br>
</div>
</a>
@endforeach

<div>{{$data->links()}}</div>

      </div>
        <div class="col-lg-4 col-md-4 col-sm-4 wow fadeInDown">
        <aside class="right_content">
        
                <div class="single_sidebar">
           <h2><span>Centres</span></h2>
                 <ul class="centers">
                           @foreach($c as $centre) 
          <li class="centers"><a href='{{url("home/centre/$centre->centre")}}'>NIMR - {{$centre->centre}}
 <span class="badge">{{$centre->cent}}</span></a></li>
     @endforeach
                            </ul>
          </div>
          
          <div>     
     
        </div>
  </section>
  @endsection