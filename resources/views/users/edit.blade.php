@extends('layout.new')
@section('content')
 <section id="contentSection">
    <div class="row wow fadeInDown">
<div class="line" style=" margin-left: 1%">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{url('manage')}}" >Manage</a>
&nbsp;&nbsp; /&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Users</a></h5>
  </div>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Manage Research Project Users</span></h2>
            <div class="">
 <div class="col-md-10 col-md-offset-1">
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissable fade in">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong> {{session('success')}}</strong>
      </div>
    @endif
  </div>

  
<div class="citation">
<table class="table">
    <tr><td colspan="6">@if (count($errors) > 0)
    <div class="alert alert-danger">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
    </div>
@endif
@if(session()->has('success'))
<div class="alert alert-success alert-dismissable fade in">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>{{session('success')}}</strong> 
</div>
@endif</td></tr>
 
    <form method="POST" action="{{url('manage/updateuser')}}">
    {{csrf_field()}}
   
<tr> <td colspan="2">
  <input type="text" name="username" value=" {{$pubs->username}}" class="form-control" placeholder="Username">

  </td></tr>
  <tr>
    <td>
        <input type="text" name="level" value=" {{$pubs->level}}" class="form-control" placeholder="Role">
    </td>
  </tr>
      <tr> <td><input type="hidden" name="id" value=" {{$pubs->id}}">
             <input type="submit" class="btn  btn-primary btn-block "  value="Update"/></td>
             </form>
              </tr>


    </table>

</div>



              
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