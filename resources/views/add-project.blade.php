@extends('layout.new')
@section('content')
<header class="section2 background-dark">
  <div class="line text-center">        
    <h1 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">Research Project Uploading Panel</h1>
  
  </div>
</header>
  <section id="contentSection">
    <div class="row  wow fadeInDown">
 <div class="col-lg-12 col-md-12 col-sm-12">
@if (count($errors) > 0)
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
@endif
<div class="form">
<form action="{{url('add-project')}}" method="POST">
  <div class="form-group row">
      <label for="publication-title" class="col-md-2">Project Title *</label>
      <div class="col-md-10">
       <textarea  class="form-control" type="text" name="title" id="publication-title"></textarea>
      </div>
  </div>
  <div class="form-group row">
          <input type="hidden" name="centre" value=" {{ Auth::user()->name }}">
      <label for="publication-citation" class="col-md-2">Research Theme *</label>
      <div class="col-md-10">
       <textarea  class="form-control" type="text" name="theme" id="publication-citation"></textarea>
      </div>
  </div>

  <div class="form-group row">
  <div class="col-md-2">
      <label for="author">Investigator</label>
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
      <br>
  </div>
  <div class="form-group row">
    <div class="col-md-2"></div>
 
        <div class="inca">
          
        </div>
 
         </div>

        
<div class="form-group row">
  <div class="col-md-3">
      <label for="author">Participating Institutions/Centres</label>
      <div class="col-md-1 pull-right">
         <a href="#" class=" fa fa-plus" id="appendi" name="append" title="Add field" style="color:#2F76A5"></a>
             </div>
  </div>
     
      <div class="col-md-9">
      <input class="form-control" type="text" name="inst_name[]"  placeholder="Institutions/Centres">
      </div>
     
     

  </div>

  <div class="form-group row">
    <div class="col-md-3"></div>
     <div class="col-md-9">
        <div class="inci">
          
        </div>
      </div>
         </div>
<div class="form-group row">
      <label for="publication-citation" class="col-md-2">Background * </label>
      <div class="col-md-10">
       <textarea  class="form-control" type="text" name="background" id="publication-citation" placeholder="(max 400 words)" required></textarea>
      </div>
  </div>
<div class="form-group row">
      <label for="publication-citation" class="col-md-2">Main Objectives *</label>
      <div class="col-md-10">
       <textarea  class="form-control" type="text" name="objective" id="publication-citation" required> </textarea>
      </div>
  </div>
  <div class="form-group row">
      <div class="col-md-3">
      <label for="publication-citation" >Specific Objectives</label>
           <div class="col-md-1 pull-right">
         <a href="#" class="remove_this fa fa-plus" id="append" name="append" title="Add field" style="color:#2F76A5"></a>
             </div>
           </div>
      <div class="col-md-9">
       <textarea  class="form-control" type="text" name="name_objective[]" id="publication-citation" ></textarea>
      </div>
  </div>
  <div class="form-group row">
    <div class="col-md-3"></div>
     <div class="col-md-9">
        <div class="inc">
          
        </div>
      </div>
         </div>
  
  <div class="form-group row">
      <label for="publication-citation" class="col-md-2">Methodology </label>
      <div class="col-md-10">
       <textarea  class="form-control" type="text" name="methodology" id="publication-citation" placeholder="(max 400 words)" required></textarea>
      </div>
  </div>
    <div class="form-group row">
      <label for="year" class="col-md-2">Project Information</label>
       <label for="publication-citation" class="col-md-2">Date of Report </label>
      
     <div class="col-md-3">
     <input type="date" placeholder="Duration (exact years)" id="birthday" name="date_of_report" class="form-control" required>
    
      </div>

      <div class="col-md-2">
       <input class="form-control" placeholder="Total Budget" type="text" name="budget" id="volume" >
      </div>
    
      <div class="col-md-3">

     <input class="form-control" placeholder="Duration (exact years)" type="text" name="duration" id="issue" >
      </div>

     
  </div> 
  <div class="form-group row">
    <div class="col-md-2">
    <label for="year">Sponsor(s)</label>
      <div class="col-md-1 pull-right">
         <a href="#" class=" fa fa-plus" id="append1" name="append1" title="Add field" style="color:#2F76A5"></a>
             </div>
           </div>
     <div class="col-md-3">
     <input type="text" placeholder="Sponsor" id="birthday" name="sponsor[]" class="form-control" required>
    
      </div>
  <div class="col-md-2">
  <label for="year">Publication(s)</label>
      <div class="col-md-1 pull-right">
         <a href="#" class=" fa fa-plus" id="append2" name="append2" title="Add field" style="color:#2F76A5"></a>
             </div>
           </div>
      <div class="col-md-5"> 
       <input class="form-control" placeholder="Publication (if applicable)" type="text" name="publication[]" id="volume" >
      </div>
    
  </div>


  <div class="form-group row">
    <div class="col-md-2">
  
           </div>
     <div class="col-md-3">
     <div class="inc1">
          
        </div>
    
      </div>
  <div class="col-md-2">
  </div>
      <div class="col-md-5"> 
    <div class="inc2">
          
        </div>
      </div>
    
  </div>

  <div class="form-group row">
      <label for="publication-citation" class="col-md-2">Closeout summary</label>
      <div class="col-md-10">
       <textarea  class="form-control" type="text" name="summary" id="publication-citation" 
        placeholder="Closeout summary with key findings (max 500 words)(if capable)"  required> </textarea>
      </div>
  </div>

  <div class="col-md-6"></div>
   <div class="col-md-6">
         {{ csrf_field() }}
             <input type="submit" class="btn  btn-primary btn-block btn-signin"  value="ADD RESEARCH PROJECT"/>
      </div>
  </div> 
  </form>  
    </div>
  </section>
    @endsection