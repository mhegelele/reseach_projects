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
            <h2><span>Research Project Report</span></h2>
            <div class="">

  <div><select class="form-control" type="text" name="centre" value="{{old('centre')}}" onChange="window.location.href=this.value">
        <option selected="true" disabled="disabled">Search Research Project Report by Centre</option>  
                @foreach($proje as $c)
        <option value="{{url('/manage/reportbycentre/'.$c->centre)}}"> NIMR {{$c->centre}}</option>
        @endforeach
       </select><br></div>
  

<table class="table table-striped table-hover">
    <tr><th colspan="2"><center><b>RESEARCH PROJECT DATABASE REPORT</b></center></th></tr>
     <tr> <th colspan="2"><center>REPORTS SHOW OVERALL  SUMMARY OF RESEARCH PROJECT UPLOADED IN THE DATABASE</center></th></tr> <tr>
       <td>
         TOTAL NUMBER OF RESEARCH PROJECT
       </td><td>@foreach($research as $s) <div style="margin-left:79%;">{{$s->totalproject}}</div>   @endforeach
</td>
     </tr>
     @foreach($project as $s)
	<tr>
   <td colspan="2"> {{$s->title}}</td> 
  </tr>
    @endforeach
    <tr>
      <td> {{$project->links()}}</td><td><a href="{{ route('pdfviews',['download'=>'pdf']) }}" style="color:red;margin-left:30%;  "><span class="fa fa-file-pdf-o">
      &nbsp;&nbsp;&nbsp;&nbsp;DOWNLOAD PDF</span></a></td>
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