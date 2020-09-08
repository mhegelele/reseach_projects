@extends('layout.new')
@section('content')
 
 
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 wow fadeInDown">
   <div class="single_sidebar wow fadeInDown" style="margin-bottom: 2px;">
<h2 style="text-transform: uppercase;"> <span>PROGRESS RESEARCH PROJECTS </span></h2>
 <div class="col-md-10 col-md-offset-1">
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissable fade in">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong> {{session('success')}}</strong>
      </div>
    @endif
  </div>
</div>
<br>
 
<form method="POST" action="{{url('uploaded-project')}}">
    {{csrf_field()}}
<div>
  <h5 class="title">Project Title:</h5>
  <textarea rows="5" cols="20" class="form-control" name="title">{{$pubs->title}}</textarea>
   </strong>
</div>
<div><br>
    <h5 class="title">Research Theme:</h5>
 <textarea rows="5" cols="20" class="form-control" name="theme">  {{$pubs->theme}}</textarea><br>
</div>
<div >
    <h5 class="title">Methodology:</h5>
    <textarea rows="5" cols="20" class="form-control" name="methodology">  {{$pubs->methodology}}</textarea>
     </strong>
</div>
<div >
   <h5 class="title">Background:</h5>

    <textarea rows="5" cols="20" class="form-control" name="background">{{$pubs->background}}</textarea>
  </strong>
</div>

    <div >
      <h5 class="title">Investigators</h5>
            <div style="margin-left: 18%; ">
              <table class="table">
      @foreach($pub4 as $au)
    
   
<tr> 
  <td><a href="{{url('/uploaded-project/investigators/'.$au->i_id)}}">
    {{$au->fname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$au->lname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$au->sname}} 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$au->role}}</a></td>
  
      </td>      
    @endforeach
    </table>
</div>
<br>  
     <div class="inca">
  <div class="form-group row">
  <div class="col-md-2">
      <label for="author"></label>
      <div class="col-md-1 pull-right">
        <a href="#" class=" fa fa-plus" id="appenda" title="Add field" style="color:#2F76A5"></a>
                              </div>
  </div>
      <div class="col-md-2">
     
      <input class="form-control" type="text" name="fname[]"  placeholder="First name" id="author">
      </div>
      <div class="col-md-2">
      <input class="form-control" type="text" name="lname[]"  placeholder="Middle name">
      </div>
      <div class="col-md-2">
        <input class="form-control" type="text" name="sname[]"  placeholder="Surname">
      </div>
      <div class="col-md-4">
        <select class="form-control" type="text" name="role[]" >
        <option value="" selected disabled>Choose Investigator</option>
        <option value="Principal Investigator">Principal Investigator</option>
        <option value="Co Investigators">Co Investigators</option>
        </select>
      </div>
  
  </div>
  
        </div>
       



  </div>
<br>

<div class="letter-box">
       <h5 class="title">Main Objective:</h5>
         <textarea rows="5" cols="20" class="form-control" name="objective">{{$pubs->objective}}</textarea>
  </strong>
</div>

 <div class="letter-box">
      <h5 class="title">Specific Objectives:</h5>
         <div class="col-md-1 pull-right">
         <a href="#" class="remove_this fa fa-plus" id="append" name="append" title="Add Specific Objective" style="color:#2F76A5"></a>
             </div>
       @foreach ($pub2 as $key => $item)
 <div><a href="{{url('/uploaded-project/objective/'.$item->o_id)}}">{{$item->name_objective}}</a>&nbsp;&nbsp;<a href="{{url('/deleteobjective/'.$item->o_id)}}"><span class="fa fa-minus" title="Delete Specific Objective" style="color:red"></span></a>
</div><br>
    @endforeach
 
  <div class="inc">
       <textarea  class="form-control" type="text" name="name_objective[]" placeholder="Specific Objective" ></textarea>   
        </div>

  </div>


   <div class="letter-box wow fadeInDown">
      <h3 class="title">Other Research Project Infomation</h3>
    <table class="table wow fadeInDown">
      
      <tr>
        <td><h5>Instituions:  </h5><div class="col-md-1 pull-right">
         <a href="#" class=" fa fa-plus" id="appendi" name="append" title="Add field" style="color:#2F76A5"></a>
             </div>
        </td>
 
<td>
   @foreach ($pub as $key => $item)
  <a href="{{url('/uploaded-project/institution/'.$item->id)}}"> {{$item->inst_name}}</a> &nbsp;&nbsp;<a href="{{url('/deleteinstitution/'.$item->id)}}"><span class="fa fa-minus" title="Delete Instituion" style="color:red"></span></a>
    

      </div><br>
       @endforeach</td>      
      </tr>
      <tr>
        <td></td>
        <td colspan="3">       <div class="inci">
          <input class="form-control" placeholder="Instituion" type="text" name="inst_name[]" id="volume" >
        </div></td>
      </tr>

            <tr>
        <td><h5>Publications:</h5>
     <div class="col-md-1 pull-right">
         <a href="#" class=" fa fa-plus" id="append2" name="append2" title="Add field" style="color:#2F76A5"></a>
             </div>

        </td>

 
<td>
   @foreach ($pub3 as $key => $item)
 <a href="{{url('/uploaded-project/publication/'.$item->id)}}">         {{$item->publication}} &nbsp;&nbsp;<a href="{{url('/deletepublication/'.$item->id)}}"><span class="fa fa-minus" title="Delete Publication" style="color:red"></span></a><br>
       @endforeach</td>      
      </tr>
      <tr> <td colspan="3">       <div class="inc2">
         <input class="form-control" placeholder="Publication (if applicable)" type="text" name="publication[]" id="volume" >
          
        </div></td></tr>
            <tr>
        <td><h5>Sponsor(s):</h5>
          <div class="col-md-1 pull-right">
         <a href="#" class=" fa fa-plus" id="append1" name="append1" title="Add field" style="color:#2F76A5"></a>
             </div>
        </td>

 
<td>
   @foreach ($pub6 as $key => $item)
   <a href="{{url('/uploaded-project/sponsor/'.$item->s_id)}}">
         {{$item->sponsor}}</a>&nbsp;&nbsp;<a href="{{url('/deletesponsor/'.$item->s_id)}}"><span class="fa fa-minus" title="Delete Sponsor" style="color:red"></span></a><br>
       @endforeach</td>      
      </tr>
      <tr> <td colspan="3"> 
            <div class="inc1">
            <input type="text" placeholder="Sponsor" name="sponsor[]" class="form-control" >
        </div></td></tr>
        <tr>
        <td><h5>NIMR- Centre:</h5></td>
        <td><input type="text" name="centre" value=" {{$pubs->centre}}" class="form-control" placeholder="Budget">
         </td>
  
      </tr>
      <tr>
        <td><h5>Budget:</h5></td>
        <td><input type="text" name="budget" value="{{$pubs->budget}}" class="form-control" placeholder="Budget">
          </td>

      </tr>
       <tr>
        <td><h5>Duration:</h5></td>
        <td><input type="text" name="duration" value="{{$pubs->duration}}" class="form-control" placeholder="Duration">
          </td>
  
      </tr>
          <tr>
        <td><h5>Date of Report:</h5></td>
        <td><input type="text" name="date_of_report" value="{{$pubs->date_of_report}}" class="form-control" placeholder="Date of Report">
        </td>
  
      </tr>
          <tr>
        <td><h5>Created At:</h5></td>
        <td>{{$pubs->created_at}}</td>
  
      </tr>
    </table>
  
</div>

<div class="citation">
       <h5 class="title">Summary:</h5>
  <textarea rows="5" cols="20" class="form-control" name="summary">{{$pubs->summary}}</textarea>
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
        <div class="col-md-1 pull-right">
         <a href="#" class=" fa fa-plus" id="appendu" name="appendu" title="Add field" style="color:#2F76A5"></a>
             </div>
    
      @foreach ($pub5 as $item)
 <a href="{{url('/uploaded-project/progress/'.$item->q_id)}}"><div class="citation">{{$item->name_progress}} <a href="{{url('/deleteprogress/'.$item->q_id)}}"><span class="fa fa-minus" title="Delete Progress" style="color:red"></span></a></div></a> 

@endforeach
 {{$pub5->links()}}
<br>

<div>
  <textarea  class="form-control" rows="5" cols="20" type="text" name="name_progress[]" placeholder="Quatery Progress" ></textarea><br> 
</div>
<div class="incu">
 
</div>

 <div class="col-md-4">
  <table class="table striped">
    <tr>
      <td><input type="hidden" name="id" value=" {{$pubs->pro_id}}">
             <input type="submit" class="btn  btn-primary btn-block "  value="Update"/>
                 </form>
           </td>
             <td>
             <form method="POST" action="{{url('delete-project')}}">
                  {{csrf_field()}}
              <input type="hidden" name="id" value=" {{$pubs->pro_id}}">
               <input type="submit" class="btn  btn-danger btn-block"  value="Delete" {{session()->has('success')? 'disabled':''}}/>
               </form>
             </td>
    </tr>
  </table>


            
      </div>

        </div>
      </div>
  </section>
  @endsection