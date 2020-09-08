@extends('layout.new')
@section('content')
 <section id="contentSection">
    <div class="row wow fadeInDown">
<div class="line" style=" margin-left: 1%">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Manage</a></h5>
  </div>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>ALL NIMR  Complete Research Project</span></h2>
            <div class="">

@foreach($proje as $f)
  <a href="manage/projects/{{$f->pro_id}}"> 
<div class="citation">
{{$f->title}} {{$f->theme}}</strong><br>
</div></a>
@endforeach

<div>{{$proje->links()}}</div>


              
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
                  <li class="centers"><a href="{{url('manage/progress')}}">Progress Research Project
                  <span class="badge"> {{$s->progress}}</span></a></li>@endforeach
                     @foreach($papproved as $s)
                   <li class="centers"><a href="{{url('manage')}}">Complete Research Project <span class="badge" style="background color=#2F76A5;"> {{$s->approved}}</span></a></li>
                   @endforeach
                      <li class="centers"><a href="{{url('manage/users')}}">
                      Users</a></li>
                   <li class="centers"><a href="{{url('manage/report')}}">Report</a></li>
           </ul>
          </div>
          
          <div>
     
    
  </section>
  @endsection