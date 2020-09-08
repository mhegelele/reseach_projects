@extends('layout.new')
@section('content')
 
 
  <section id="contentSection">
    <div class="row">
       <div class="line" style=" margin-left: 1%">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;  @if(Auth::user()->level === 'admin')<a href="{{ url('manage')}}"> Manage</a>&nbsp;&nbsp;/&nbsp;&nbsp;@endif<a href="" style="color:#2F76A5;">Projects</a></h5>
  </div>
      <div class="col-lg-8 col-md-8 col-sm-8 wow fadeInDown">
       
   <div class="single_sidebar wow fadeInDown" style="margin-bottom: 2px;">
<h2 style="text-transform: uppercase;"> <span>RESEARCH PROJECT </span></h2>
</div>

<br>
<div class="citation">
  <h5 class="title">Project Title:</h5>
  
   {{$pubs->title}}</strong>
</div>
<div class="citation"><br>
    <h5 class="title">Research Theme:</h5>
  {{$pubs->theme}}</strong><br>
</div>
<div class="citation">
    <h5 class="title">Methodology:</h5>
      {{$pubs->methodology}}</strong>
</div>
<div class="citation">
   <h5 class="title">Background:</h5>
   
  {{$pubs->background}}</strong>
</div>

<div class="citation">
       <h5 class="title">Main Objective:</h5>
  {{$pubs->objective}}</strong>
</div>
<div class="citation">
   <table class="table table-striped">
   <tr><td>
      <h5 class="title">Specific Objectives:</h5>
      </td>     
       <td>
         @foreach ($pub2 as $key => $item)
  *{{$item->name_objective}}<br>
 @endforeach</td></tr>
  
 </table>
</div>

 <div class="letter-box wow fadeInDown">
      <h3 class="title">Other Research Project Infomation</h3>
    <table class="table ">
      
      <tr>
        <td><h5>Instituions:</h5></td>
 
<td>
   @foreach ($pub as $key => $item)
   {{ ++$key }}:
        {{$item->inst_name}}<br>
       @endforeach</td>      
      </tr>

            <tr>
        <td><h5>Publications:</h5></td>
 
<td>
   @foreach ($pub3 as $key => $item)
   {{ ++$key }}:
        {{$item->publication}}<br>
       @endforeach</td>      
      </tr>
        <tr>
        <td><h5>Centre:</h5></td>
        <td>NIMR- {{$pubs->centre}}</td>
  
      </tr>
      <tr>
        <td><h5>Budget:</h5></td>
        <td>TSH- {{$pubs->budget}}</td>
  
      </tr>
       <tr>
        <td><h5>Duration:</h5></td>
        <td>{{$pubs->duration}}</td>
  
      </tr>
          <tr>
        <td><h5>Date of Report:</h5></td>
        <td>{{$pubs->date_of_report}}</td>
  
      </tr>
     <!--      <tr>
        <td><h5>Created At:</h5></td>
        <td>{{$pubs->created_at}}</td>
  
      </tr> -->
    </table>
  
</div>



<div class="citation">
       <h5 class="title">Summary:</h5>
  {{$pubs->summary}}</strong>
</div><br>
</div>
    
        <div class="col-lg-4 col-md-4 col-sm-4 wow fadeInDown">
        <aside class="right_content">
        
       <div class="single_sidebar">

           <h2><span>  @foreach ($c as $item)
            {{$item->Alice}}@endforeach Quatery Report</span></h2>
                 <ul class="centers">
                                                      </ul>
          </div>
    
        @foreach ($pub4 as $item)
     <div class="citation">        {{$item->name_progress}}</div>@endforeach
   {{$pub4->links()}}
        </div>
    
      </div>
  </section>
  @endsection