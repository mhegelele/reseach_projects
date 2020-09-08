@extends('layout.new')
@section('content')
 <section id="contentSection">
    <div class="row wow fadeInDown">
<div class="line" style=" margin-left: 1%">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{url('manage')}}" >Manage</a>
&nbsp;&nbsp; /&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Report</a></h5>
  </div>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Research Project Report FOR {{$id}}</span></h2>
            <div class="">
  

<table class="table table-striped table-hover">

     @foreach($ppendings as $s)
    <tr>
      <td>{{$s->title}}</td>
    </tr>
     @endforeach
     <tr>
       <td>
         <a href="{{ url('/manage/centrePDF', $id) }}" style="color:red;margin-left:80%;  "><span class="fa fa-file-pdf-o">
      &nbsp;&nbsp;&nbsp;&nbsp;DOWNLOAD PDF</span></a>
       </td>
     </tr>
</table>


             
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