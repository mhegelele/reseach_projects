@extends('layout.new')
@section('content')
 <section id="contentSection">
    <div class="row wow fadeInDown">

      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>NIMR- {{ Auth::user()->name }} Progress Research Project</span></h2>
            <div class="">
@foreach($pproje as $f)
<div class="citation">
  <a href='{{url("project/$f->id")}}'> {{$f->title}} {{$f->theme}}</a></strong><br>
</div>
@endforeach
<div>{{$pproje->links()}}</div>


              
            </div>
          </div>
          
          
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
        
        
          <div class="single_sidebar">
           <h2><span>Research Projects</span></h2>
                 <ul class="centers">
                  @foreach($ppending as $s)
                  <li class="centers"><a href="{{url('progress_project')}}">Progress Research Project
                  <span class="badge"> {{$s->progress}}</span></a></li>@endforeach
                     @foreach($papproved as $s)
                   <li class="centers"><a href="{{url('uploaded-project')}}">Complete Research Project <span class="badge" style="background color=#2F76A5;"> {{$s->approved}}</span></a></li>
                   @endforeach
           </ul>
          </div>
          
          <div>
     
    
  </section>
  @endsection